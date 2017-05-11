-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 01:24 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_winya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `admin_photo` varchar(255) NOT NULL,
  `permission` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1->success,0->failure'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `password`, `branch_id`, `admin_photo`, `permission`, `status`) VALUES
(1, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', 0, 'profile/IMG_20170116_140740.jpg', 1, 1),
(2, 'hari', 'e10adc3949ba59abbe56e057f20f883e', 1, 'gsa', 2, 1),
(3, 'test', 'e10adc3949ba59abbe56e057f20f883e', 4, 'gsa', 2, 1),
(15, 'gfdd', 'e10adc3949ba59abbe56e057f20f883e', 4, 'profile/4.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `applied_at` datetime NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `college_name` varchar(255) DEFAULT NULL,
  `college_photo` varchar(255) NOT NULL,
  `college_details` text,
  `founded_year` varchar(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `intake` varchar(255) NOT NULL,
  `college_address` text,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `country_id`, `college_name`, `college_photo`, `college_details`, `founded_year`, `type`, `intake`, `college_address`, `status`) VALUES
(1, 3, 'MFH International Institute', 'download.jpg', 'MFH is an international education group in Wellington New Zealand and SFO, USA, dedicated to offering unique pathways to its students around the world. MFH is accredited and funded by New Zealand government. MFH was established in 2002 by a team of professionals committed to quality education. We are passionate about providing a nurturing environment for students with the purpose of fostering academic excellence. We have built an excellent reputation as a provider of quality teaching & student support services. ', '2002', 'private', 'jan,feb,apr,may\r\n', 'Wellington Campus:\r\n\r\nLevels 3,4&6 Grand Central Tower\r\n76 - 86 Manners Street\r\nWellington CBD 6011, New Zealand\r\n(Reception: Level 6)\r\n\r\nPostal address:\r\nPO Box 24248\r\nWellington 6011, New Zealand', 1),
(2, 4, 'Flinders International Study Centre (FISC), Adelaide, Bedford Park, Australia\n', 'images.jpg', 'The FISC Foundation Program gives students the opportunity to progress to a FISC Diploma or to the undergraduate degree of their choice at Flinders University (upon meeting all necessary entry requirements).', '2013', 'Private', 'feb', 'Bedford Park, Australia', 1),
(3, 4, 'University of Canberra', 'university.jpg', 'The University of Canberra (UC) is located in Australia’s national capital. Currently there are 2,500 international students fromover 100 different countries, which means UC has a rich and diverse campus culture. With the new Strategic Plan, ‘Breakthrough’, the purpose is to help students develop the strengths and skills needed to make important academic, professional and personal breakthroughs in life. UC aims to be recognised as one of Australia’s most innovative tertiary institutions; world-ranked, with regional, national and international reach by 2018.', '1967', 'Public', 'feb,jan', ' Australia', 1),
(4, 4, 'APM College of Business and Communication, ', '', 'APM College of Business & Communication is an affiliate of the Think: Education Group, a leading provider of specialised education to the marketing and communications sector. APM, establisjed in 1986, forges strong partnerships with major industry and professional associations and provides its students with a range of higher education and vocational qualifications to suit their chosen career path. \r\n', '1986', 'Private', 'Feb,june', 'Australia', 1),
(5, 4, 'RMIT University\r\n', '', 'MIT University (officially the Royal Melbourne Institute of Technology) is a global university of technology and design with teaching, learning, research and innovation programs continually updated so that its students, staff and graduates are ready to meet the challenges of the 21st century. RMIT is Australia’s largest tertiary institution and is located in the heart of Melbourne city.', '1887', 'Public', 'Feb,jul', 'Australia', 1),
(6, 4, 'Stanley College', '', 'Stanley College is a modern and innovative tertiary institution offering careers and university study pathways for domestic and international students. It provides a favourable learning environment that allows creativity and opportunities for students to achieve academic success and personal growth.', '2008', 'Private', 'jan,feb', 'Australia', 1),
(7, 3, 'Waikato Institute of Technology (Wintec)', '', 'Wintec has been serving Waikato since 1924. Everyday Wintec adds to that rich 90-year history. The milestones Waikato has reached and will continue to achieve is embedded in its rich history and celebrated around the region.', '1924', 'Public', 'Nov', 'Hamilton, New Zealand', 1),
(8, 3, 'Otago Polytechnic', '', 'Otago Polytechnic is one of New Zealand’s top providers of high quality, career-focused education. We have a long tradition of producing exceptional graduates who are productive, thoughtful and creative members of their chosen profession. Through our experience-based learning and commitment to work towards a sustainable future, our graduates are work-ready, independent and equipped to make a real difference to their communities. ', '1966', 'Public', 'Feb,Mar', 'Dunedin, New Zealand', 1),
(9, 3, 'NorthTec', '', 'NorthTec is a state-owned institute of technology, adhering to the high educational standards set by the New Zealand Government. It is the region''s largest provider of tertiary education, with campuses and learning centers in Whangarei City, Kerikeri in the Bay of Islands, learning centers in Rawene, on the shores of the Hokianga, Dargaville, Kaikohe, and on the northernmost site in Kaitaia. The programmes offered in NorthTec are highly regarded by New Zealand employers as approved by the New Zealand Qualifications Authority and aids students to obtain qualifications that are internationally recognised. ', '1978', 'Public', 'Jul,feb', 'Whangarei, New Zealand', 1),
(10, 3, 'Unitec Institute of Technology, ', '', 'Unitec has cross credit relationships with institutions globally including Malaysia and we are renowned for innovation, sustainability and practical, real world learning. This means that our graduates are sought after by employers within New Zealand and internationally.\r\n\r\n', '1976', 'Public', 'Feb,jul', 'Auckland, New Zealand', 1),
(11, 0, '', '', '', '', '', '', '', 1),
(12, 3, 'victoria university', '', '', '2000', '', '', 'newzeland', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college_image`
--

CREATE TABLE `college_image` (
  `id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(45) DEFAULT NULL,
  `flag` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `flag`, `status`) VALUES
(3, 'New Zealan', '30-11-2016-1480505110.jpg', 1),
(4, 'Australia', '30-11-2016-1480505177.jpg', 1),
(5, 'india', '30-11-2016-1480505177.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `course_id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_details` text,
  `course_image` varchar(255) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `course_fees` varchar(255) DEFAULT NULL,
  `course_time` varchar(255) DEFAULT NULL,
  `requirements` text,
  `course intake` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `college_id`, `country_id`, `course_name`, `course_details`, `course_image`, `course_type`, `course_fees`, `course_time`, `requirements`, `course intake`, `status`) VALUES
(1, 1, 3, 'Information Technology', 'nformation technology (IT) is the application of computers and internet to store,study, retrieve, transmit, and manipulate data, or information, often in the context of a business or other enterprise. IT is considered a subset of information and communications technology (ICT)', '', 'Full time,Part time', '1000000,300', '1year,2 Years', 'Australia: Year 11 (60% in relevant subjects)\nMalaysia: SPM (or forecast) - aggregate of 30 or less across 5 academic subjects\nSingapore: Singapore O Levels (or forecast) - aggregate of 30 or less across 5 academic subjects\nOr an equivalent qualification', 'aug,sep,oct', 1),
(2, 10, 3, 'Certificate in Applied Technology Audio Visual Technician', 'Audio visual technicians work in a huge range of industries including theatre, stage and screen, as well as outdoor events and concerts. Train as an audio visual technician at Unitec and you’ll get to put your skills into practice working on real film sets and stage productions throughout the year. Unitec’s audio visual technician training is practical and hands-on. You’ll learn how to repair audio visual equipment, find out how theatre systems work, and practice using digital and computer electronics. ', '', 'Part time', 'NZD 19,350', '1 year', 'All applicants must be at least 16 years of age on the date of the programme''s commencement for the semester in which they wish to enrol (or provide a completed Early Release Exemption form).\r\nFor Level 4 Certificate programmes applicants must have a minimum of 4 years secondary education, and a minimum of 12 NCEA credits at Level 1 in each of at least two subjects, OR a pass in two subjects in New Zealand School Certificate, OR Unitec Certificate in Foundation Studies: Whitinga (Level 2) in a relevant pathway, OR equivalent.', 'Jul', 1),
(3, 7, 3, 'Master of Arts Visual Arts, Design, and Music', 'The Master of Arts programme provides students with a postgraduate study which leads towards professional and higher academic practice. This one-year postgraduate programme is ideal for graduates who have completed the Bachelor of Media Arts (Honours) programme, an equivalent qualification, a Postgraduate Diploma or professional practice. ', '', 'Full time', 'NZD 19,125', '1 year', 'Corresponding Bachelor with Honours degree, or\r\nPostgraduate Diploma with a minimum of a B grade average or equivalent, or\r\nWork-related experience equivalent to a corresponding Bachelor with Honours degree. Candidates will be required to demonstrate a high order of knowledge of their principal subject of study, including analytic writing, or', 'Mar', 1),
(4, 8, 3, 'Bachelor of Nursing  Dunedin Campus', 'Registered nurses may specialise in a variety of practice areas, including medical and surgical, mental health, child health/paediatrics, aged care and primary health care. There is a worldwide demand for registered nurses and a wide range of career options, both within New Zealand and overseas. These include working for hospitals, health centres, community agencies, public health and rest homes. Otago Polytechnic nursing graduates are in high demand due to their high calibre and work-readiness and Maori and Pasifika nurses are particularly sought after.', '', 'Full time', 'NZD 20,883', '3 years', 'NCEA Level 3 including:\r\nThree subjects - at Level 3 or above, made up of:\r\n14 credits in biology OR chemistry\r\n14 credits in English OR an English language-rich subject\r\n14 credits in one other approved subject\r\nthe remaining credits may come from either achievement or unit standards, and  \r\nLiteracy - 10 credits at Level 2 or above, made up of 5 credits in reading, 5 credits in writing, and\r\nNumeracy - 10 credits at Level 1 or above, made up of specified achievement standards available through a range of subjects OR package of three numeracy unit standards.', 'feb', 1),
(5, 9, 3, 'Certificate in General Farm Skills ', 'On successful completion of this qualification, you will have sufficient skills to enable you to advance in your career, gain employment as a farm worker, and/or lead to higher vocational or full-time training or study at trade certificate level with the Primary Industry Training Organisation as an apprentice. Within the range of units offered, a graduate will have demonstrated an ability to be safe, efficient and consistent while using a specific range of agricultural equipment and processes applying learnt skills under supervision.\r\n\r\n', '', 'Full time', 'NZD 8,250\r\n', '20 weeks', 'All applicants must:\r\nbe at least 16 years old at the time the programme commences\r\nbe able to read, write, and communicate in English at a basic level\r\nbe physically able to complete the programme specific outcomes\r\nApplicants for whom English is not a first language must have and IELTS score of 5 with no band score lower than 5; or an accepted international equivalence.', 'Jun', 1),
(7, 3, 4, 'Bachelor of Applied Economics', 'About this course\r\n\r\nThe Applied Economics degree is designed to train professional economists who are ready for a wide-variety of positions in the job market. It provides students with a strong core of knowledge in economic theory and their applications in a wide-array of situations. Upon successful completion of the degree, students will develop a deeper understanding of the workings of the economy; the context in which households, individuals and firms interact in the market; and government?s intervention in the market. Students will be able to confidently analyse economic data and provide advice to various stakeholders and inform public policy. The program offers a high degree of flexibility through the ability to choose an open major from more than 50 fields across all faculties of the university. Graduates will find employment in various industries (including banking, insurance, and finance) and different levels of federal and state government institutions (such as Department of Treasury, Australian Bureau of Statistics, Australian Taxation Office, Reserve Bank and Productivity Commission).\r\n\r\n', '', 'Full time', 'AUD 65,400', '3 years', 'Normal UC admission requirements to an undergraduate course.\r\nQualifications recognised by the university.', 'Aug', 1),
(8, 7, 4, 'Master of Arts Visual Arts, Design, and Music', 'The Master of Arts programme provides students with a postgraduate study which leads towards professional and higher academic practice. This one-year postgraduate programme is ideal for graduates who have completed the Bachelor of Media Arts (Honours) programme, an equivalent qualification, a Postgraduate Diploma or professional practice. ', '', 'Part time', 'NZD 19,125', '1 year', 'Corresponding Bachelor with Honours degree, or\r\nPostgraduate Diploma with a minimum of a B grade average or equivalent, or\r\nWork-related experience equivalent to a corresponding Bachelor with Honours degree. Candidates will be required to demonstrate a high order of knowledge of their principal subject of study, including analytic writing, or', 'Mar', 1),
(9, 4, 4, 'Diploma of Marketing', 'Diploma of Marketing in APM College of Business and Communication gives students the skills and marketing training to understand the important role that marketing plays in the success of contemporary organisations. Students will be able to examine industry trends, develop integrated marketing communications concepts, understand consumer needs and identify opportunities in the marketplace.', '', 'Full time', 'AUD 18,000', '1 year', 'Successfully completed a NSW School Certificate (Year 10) or the equivalent qualification from another state, territory or country or have relevant work experience.\r\nYou must be at least 17 years of age or 21 or over if you are applying as a mature aged student.', 'Jun', 1),
(10, 5, 4, 'Bachelor of Engineering ', 'This program is at the forefront of engineering education and is designed to satisfy current industry demand. Civil and infrastructure engineers plan, design, construct, supervise, manage and maintain essential infrastructure in modern communities. They aim to be responsive to wider community needs and reflective of the values that relate to the economic, environmental and social impacts of projects. \n\n', '', 'Part time', 'AUD 35,072', '4 years', 'You must have successfully completed an Australian Year 12 or an equivalent senior secondary school qualification with a minimum average of 70%.\r\nAny other international qualifications that are equivalent to an Australian Year 12.', 'Jun', 1),
(62, 12, 3, 'Bachelor of Engineering ', '', 'courses/26-04-2017-1493193870.jpg', 'Part Time,Full Time', '100000,', '1 year,6 months', '65% in 10th,55% in 12th or 55th in diploma,60% in UG,', 'Feb,', 1),
(63, 12, 3, 'mech', '<p>&nbsp;test</p>', 'courses/26-04-2017-1493194303.jpg', 'Part Time', '777777', '3moths', 'be,', 'Mar,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_image`
--

CREATE TABLE `course_image` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `myaccount`
--

CREATE TABLE `myaccount` (
  `account_id` int(11) NOT NULL,
  `reg_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process_table`
--

CREATE TABLE `process_table` (
  `process_id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `time_line_id` int(11) DEFAULT NULL,
  `is_completed` varchar(45) DEFAULT NULL,
  `completed_date` date NOT NULL,
  `expected_date` date NOT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_table`
--

INSERT INTO `process_table` (`process_id`, `application_id`, `time_line_id`, `is_completed`, `completed_date`, `expected_date`, `status`) VALUES
(1, 1, 1, '1', '2016-12-17', '2016-12-19', 1),
(36, 1, 2, '1', '2016-12-20', '2016-12-18', 1),
(69, 1, 3, '1', '2017-01-25', '2016-12-23', 1),
(70, 12, 5, '1', '2016-12-17', '2016-12-19', 1),
(71, 12, 6, '0', '0000-00-00', '2017-05-05', 1),
(72, 12, 7, '0', '0000-00-00', '2017-05-11', 1),
(73, 3, 9, '1', '2016-12-17', '2016-12-19', 1),
(74, 3, 10, '1', '2016-12-20', '2016-12-18', 1),
(75, 3, 11, '0', '0000-00-00', '2016-12-23', 1),
(76, 1, 4, '0', '0000-00-00', '2017-02-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `name`, `email`, `password`, `phone_no`, `created_at`, `status`, `photo`) VALUES
(1, 'hari', 'hp.hari423@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9487914513', '2016-12-06 05:15:21', 1, 'applicant_img/01.jpg'),
(2, 'hariprasath', 'jhp.hari06@gmailc.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543210', '2016-12-22 09:23:23', 1, 'applicant_img/01.jpg'),
(3, 'robin', 'robin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9876511111', '2016-12-22 09:23:45', 1, 'applicant_img/01.jpg'),
(6, 'REVATHI', 'revathi@banyaninfotech.com', '00894cc576a0cfde9678de2643f42dc7', '9876543210', '2017-04-27 18:53:23', 1, 'applicant_img/01.jpg'),
(7, 'bathu', 'padmanabhan@banyaninfotech.com', 'bd6a8e7ef0ffd70ec62e09cd7f1c93b3', '9876543210', '2017-04-27 18:55:16', 1, 'applicant_img/01.jpg'),
(8, 'rameshraj', 'ramesh@banyaninfotech.com', 'e10adc3949ba59abbe56e057f20f883e', '9790686141', '2017-04-27 18:55:16', 1, 'applicant_img/1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `applicant_id` int(255) NOT NULL,
  `applicant_invoice` varchar(255) NOT NULL,
  `applicant_firstname` varchar(255) NOT NULL,
  `applicant_sec_name` varchar(255) NOT NULL,
  `applicant_eligiblity` varchar(255) NOT NULL,
  `applicant_gender` varchar(255) NOT NULL,
  `applicant_mail` varchar(255) NOT NULL,
  `applicant_phone` varchar(255) NOT NULL,
  `applicant_scndry_ph` varchar(255) NOT NULL,
  `applicant_addr1` varchar(255) NOT NULL,
  `applicant_addr2` varchar(255) NOT NULL,
  `applicant_city` varchar(255) NOT NULL,
  `applicant_state` varchar(255) NOT NULL,
  `applicant_pincode` varchar(255) NOT NULL,
  `applicant_cuntry` varchar(255) NOT NULL,
  `applicant_stdy_cuntry` varchar(255) NOT NULL,
  `applicant_univercity` varchar(255) NOT NULL,
  `applicant_course_id` varchar(255) NOT NULL,
  `applicant_type_course` varchar(255) NOT NULL,
  `applicant_course_amt` varchar(255) NOT NULL,
  `applicant_paymnt` varchar(255) NOT NULL,
  `applicat_branch_id` varchar(255) NOT NULL,
  `applicant_createdon` datetime NOT NULL,
  `applicant_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`applicant_id`, `applicant_invoice`, `applicant_firstname`, `applicant_sec_name`, `applicant_eligiblity`, `applicant_gender`, `applicant_mail`, `applicant_phone`, `applicant_scndry_ph`, `applicant_addr1`, `applicant_addr2`, `applicant_city`, `applicant_state`, `applicant_pincode`, `applicant_cuntry`, `applicant_stdy_cuntry`, `applicant_univercity`, `applicant_course_id`, `applicant_type_course`, `applicant_course_amt`, `applicant_paymnt`, `applicat_branch_id`, `applicant_createdon`, `applicant_status`) VALUES
(3, '1002', 'tj', 'tjs', '', 'Male', 'srr.raj31@gmail.com', '9790686141', '8508403931', 'test', 'test', 'cbe', 'tn', '6411', 'ind', '3', '1', '1', 'Full time', '1000000', '200000', '1', '2017-04-26 07:53:26', '1'),
(7, '1003', 'HAR', 'PRSS', '', 'Male', 'HARI@BANYANINFOTECH.COM', '9876543210', '9876543120', 'TEST', 'Ttest', 'covai', 'tn', '654321', 'cdd', '4', '1', '1', 'Full time', '1000000', '100', '1', '2017-04-26 13:13:52', '1'),
(10, '1004', 'REVATHI', 'R', '', 'Female', 'revathi@banyaninfotech.com', '9876543210', '9876543210', 'test1', 'test2', 'cbe', 'tn', '641012', 'ind', '5', '1', '1', 'Full time', '1000000', '2', '1', '2017-04-27 18:53:23', '1'),
(11, '1005', 'bathu', 'm', '', 'Male', 'padmanabhan@banyaninfotech.com', '9876543210', '9876543210', 'test1', 'test2', 'cbe', 'tn', '641012', 'ind', '3', '8', '4', 'Full time', 'NZD 20', '2', '1', '2017-04-27 18:55:16', '1'),
(12, '1006', 'rameshraj', 's', '', 'Male', 'ramesh@banyaninfotech.com', '9790686141', '8508403931', 'test1', 'test2', 'cbe', 'tn', '641010', 'ind', '4', '8', '4', 'Full time', 'NZD 20', '2000', '1', '2017-04-27 18:55:16', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balance_sheet`
--

CREATE TABLE `tbl_balance_sheet` (
  `balance_sheet_id` int(11) NOT NULL,
  `branch_id` int(255) NOT NULL,
  `amount_reason` varchar(255) NOT NULL,
  `balance_sheet_credit` varchar(255) NOT NULL DEFAULT '0',
  `balance_sheet_debit` varchar(255) NOT NULL DEFAULT '0',
  `bills` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_balance_sheet`
--

INSERT INTO `tbl_balance_sheet` (`balance_sheet_id`, `branch_id`, `amount_reason`, `balance_sheet_credit`, `balance_sheet_debit`, `bills`, `created_on`) VALUES
(2, 1, 'Amount Added by admin', '10000', '', '', '2017-04-24 15:30:27'),
(3, 1, 'dgfdg', '', '10000', '', '2017-04-24 15:33:05'),
(4, 1, 'gfjghjh', '', '1111', '', '2017-04-25 07:05:02'),
(5, 1, 'Tea expenses', '', '100', '', '2017-04-25 10:06:57'),
(6, 1, 'fhgfh', '', '111', 'bills/25-04-2017-1493108217.jpg', '2017-04-25 10:16:57'),
(11, 4, 'Amount Added by admin', '1000', '', '', '0000-00-00 00:00:00'),
(12, 1, 'travel', '', '6777', 'bills/26-04-2017-1493193084.jpg', '2017-04-26 13:21:24'),
(13, 1, 'Amount Added by admin', '10000', '', '', '2017-04-26 13:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(22) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_head` varchar(255) NOT NULL,
  `branch_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_head`, `branch_status`) VALUES
(1, 'Coimbatore', '2', 1),
(4, 'covai', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch_amount`
--

CREATE TABLE `tbl_branch_amount` (
  `branch_amt_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `branch_amt` varchar(255) NOT NULL,
  `branch_amt_created_on` datetime NOT NULL,
  `branch_amt_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch_amount`
--

INSERT INTO `tbl_branch_amount` (`branch_amt_id`, `branch_id`, `branch_amt`, `branch_amt_created_on`, `branch_amt_status`) VALUES
(1, 1, '10000', '2017-04-24 15:30:27', 1),
(12, 4, '1000', '2017-04-26 08:23:11', 1),
(13, 1, '10000', '2017-04-26 13:24:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher`
--

CREATE TABLE `tbl_voucher` (
  `id` int(11) NOT NULL,
  `amttowards` varchar(35) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `branch_idfk` varchar(45) DEFAULT NULL,
  `bills` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_voucher`
--

INSERT INTO `tbl_voucher` (`id`, `amttowards`, `date`, `reason`, `branch_idfk`, `bills`, `status`) VALUES
(1, '10000', '2017-04-24 15:33:05', 'dgfdg', '1', '', 1),
(2, '1111', '2017-04-25 07:05:02', 'gfjghjh', '1', '', 1),
(3, '100', '2017-04-25 10:06:57', 'Tea expenses', '1', '', 1),
(4, '111', '2017-04-25 10:16:57', 'fhgfh', '1', 'bills/25-04-2017-1493108217.jpg', 1),
(5, '6777', '2017-04-26 13:21:24', 'travel', '1', 'bills/26-04-2017-1493193084.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `timeline_id` int(11) NOT NULL,
  `college_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `timeline_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`timeline_id`, `college_id`, `course_id`, `country_id`, `timeline_name`, `status`) VALUES
(1, 1, 1, 3, 'Application Submitted', 1),
(2, 1, 1, 3, 'Document Sent', 1),
(3, 1, 1, 3, 'Document Verification', 1),
(4, 1, 1, 3, 'successfully Completed', 1),
(5, 8, 4, 4, 'Application Submitted', 1),
(6, 8, 4, 4, 'Document Sent', 1),
(7, 8, 4, 4, 'Document Verification', 1),
(8, 10, 2, 3, 'successfully Completed', 1),
(9, 7, 3, 3, 'Application Submitted', 1),
(10, 7, 3, 3, 'Document Sent', 1),
(11, 7, 3, 3, 'Document Verification', 1),
(12, 7, 3, 3, 'successfully Completed', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `college_image`
--
ALTER TABLE `college_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_image`
--
ALTER TABLE `course_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myaccount`
--
ALTER TABLE `myaccount`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `process_table`
--
ALTER TABLE `process_table`
  ADD PRIMARY KEY (`process_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `tbl_balance_sheet`
--
ALTER TABLE `tbl_balance_sheet`
  ADD PRIMARY KEY (`balance_sheet_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_branch_amount`
--
ALTER TABLE `tbl_branch_amount`
  ADD PRIMARY KEY (`branch_amt_id`);

--
-- Indexes for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`timeline_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `college_image`
--
ALTER TABLE `college_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `course_image`
--
ALTER TABLE `course_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `myaccount`
--
ALTER TABLE `myaccount`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `process_table`
--
ALTER TABLE `process_table`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `applicant_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_balance_sheet`
--
ALTER TABLE `tbl_balance_sheet`
  MODIFY `balance_sheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_branch_amount`
--
ALTER TABLE `tbl_branch_amount`
  MODIFY `branch_amt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `timeline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
