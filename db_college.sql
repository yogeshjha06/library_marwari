-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 08:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_friend`
--

CREATE TABLE `admin_friend` (
  `id` int(11) NOT NULL,
  `main_id` varchar(200) NOT NULL,
  `friend_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_friend`
--

INSERT INTO `admin_friend` (`id`, `main_id`, `friend_id`, `status`) VALUES
(28, 'yogesh', 'radha', 0),
(29, 'yogesh', 'sudha', 0),
(30, 'radha', 'yogesh', 0),
(31, 'radha', 'sudha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `emp_id` varchar(60) NOT NULL,
  `department` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `about` varchar(500) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `fb` varchar(200) DEFAULT NULL,
  `insta` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `emp_id`, `department`, `username`, `password`, `email`, `about`, `address`, `phone`, `twitter`, `fb`, `insta`, `linkedin`, `date`, `status`, `otp`) VALUES
(1, 'Yogesh Kumar Jha', 'MCR1221', 'MCA Sem -4', 'yogesh', 'new', 'marscorp1221@gmail.com', 'Experienced full-stack developer with nine years of experience in the industry. Seeking to leverage high proficiency in SQL, Python, JavaScript and CSS in a full-time career as a full-stack developer for Greenway Tech. ', 'Dhurwa, Sector - II, Ranchi - JH', '8969742326', 'https://twitter.com/i_Yogeshjha', 'https://www.facebook.com/yogesh.Anjali.jha', 'https://www.instagram.com/i_yogeshjha/', 'https://www.linkedin.com/in/yogesh-jha-b731b4206/', '2023-03-06', 0, 5266625),
(2, 'shiwani kumari', 'MCR123', 'BDS', 'shiwani', '123', 'shiwanijhakumari@gmail.com', 'Skilled in running multiple operatories and utilizing time efficiently while also being on call for emergency operations.\r\nStrong working knowledge of dentistry, including orthodontics, oral and maxillofacial surgery, periodontics, prosthodontics, and endodontics.\r\n', 'Hazaribag, Ranchi, Jharkhand', '7463959117', '', '', '', '', '2023-03-09', 0, NULL),
(4, 'Radha Rani', 'MCR456', 'MSC', 'radha', '123', 'radha@gmail.com', 'Science education is the teaching and learning of science to school children, college students, or adults within the general public. The field of science education includes work in science content, science process, some social science, and some teaching pedagogy.', 'Argora, Harmu Housing, Ranchi', '7458965455', '', '', '', '', '2023-03-11', 0, NULL),
(5, 'sudha kumari', 'sudha123', 'BCA', 'sudha', '1234', 'sudha@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18', 0, NULL),
(7, 'vimal', '124578', 'computer ', 'vimal', '123', 'yogewwshjha0707@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-19', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_msg`
--

CREATE TABLE `admin_msg` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_msg`
--

INSERT INTO `admin_msg` (`id`, `sender`, `reciver`, `message`, `date`, `status`) VALUES
(4, 'yogesh', 'shiwani', 'hi this is yogesh!', '2023-03-14', 0),
(5, 'shiwani', 'yogesh', 'im fine thank you!', '2023-03-14', 0),
(6, 'yogesh', 'shiwani', 'what is your name', '2023-03-14', 0),
(9, 'radha', 'yogesh', 'hi raju', '2023-03-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `month` varchar(20) NOT NULL,
  `working_days` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_of_submit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `reg`, `department`, `month`, `working_days`, `attendance`, `status`, `date_of_submit`) VALUES
(1, 'MCRMS970146', 'MCA', 'January', 20, 15, 0, '2023-03-12'),
(5, 'MCRMS970146', 'MCA', 'February', 28, 20, 0, '2023-03-13'),
(6, 'MCR123', 'BCA', 'January', 30, 30, 0, '2023-03-13'),
(7, 'mcr123', 'BCA', 'April', 23, 23, 0, '2023-03-14'),
(8, 'MCRMS970146', 'MCA', 'June', 30, 20, 0, '2023-03-14'),
(9, 'vip123', 'BCA', 'January', 10, 10, 0, '2023-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `book_db`
--

CREATE TABLE `book_db` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `qun` varchar(50) NOT NULL,
  `pic` varchar(500) DEFAULT NULL,
  `sno` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_db`
--

INSERT INTO `book_db` (`id`, `name`, `genre`, `qun`, `pic`, `sno`, `status`) VALUES
(8, 'Madhushala', 'Literature', '12', 'madhushala.jpg', '1232', 0),
(9, 'Half Girlfriend', 'Novel', '32', 'Half_Girlfriend.jpg', '31345', 0),
(11, '2 STATE', 'Fiction', '0', '2state.jpg', '222', 1),
(12, 'Encyclopedia', 'Fiction', '2', 'encyclopedia.jpg', '333', 0),
(13, 'C++', 'Computer', '5', 'cpp.jpg', '323', 0),
(14, 'Harry Potter', 'Fiction', '36', 'hp.jpg', '136', 0),
(15, 'HAMLET', 'Novel', '5', 'hamlet.jpg', '2314', 0);

-- --------------------------------------------------------

--
-- Table structure for table `community_db`
--

CREATE TABLE `community_db` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `chatt` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_db`
--

INSERT INTO `community_db` (`id`, `sender`, `chatt`, `date`, `status`) VALUES
(7, 'Yogesh Kumar Jha', 'hi im admin', '2023-03-15 13:39:06', 1),
(8, 'Raju', 'hi im not admin', '2023-03-15 09:24:53', 0),
(9, 'shiwani kumari', 'hi im shiwani', '2023-03-15 13:56:29', 1),
(10, 'Radha Rani', 'hi im radha and im also admin', '2023-03-15 18:24:18', 1),
(11, 'Yogesh Kumar Jha', 'good', '2023-03-17 22:26:11', 1),
(12, 'Radha Rani', 'hi', '2023-03-18 02:39:40', 1),
(13, 'Ramadhr Singh', 'im student ramadhir sing', '2023-03-19 19:57:29', 0),
(14, 'Yogesh Kumar Jha', 'good', '2023-03-19 19:58:17', 1),
(15, 'Ramadhr Singh', 'hi', '2023-03-19 20:04:12', 0),
(16, 'Yogesh Kumar Jha', 'hi', '2023-03-19 20:12:11', 1),
(17, 'Yogesh Kumar Jha', 'auto load', '2023-03-19 20:13:16', 1),
(18, 'Yogesh Kumar Jha', 'book is live', '2023-03-19 20:15:04', 1),
(19, 'Ramadhr Singh', 'student', '2023-03-19 20:22:51', 0),
(20, 'Yogesh Kumar Jha', 'teacher', '2023-03-19 20:23:10', 1),
(21, 'YOGESH KUMAR JHA', 'ok', '2023-03-19 23:48:21', 0),
(22, 'Yogesh Kumar Jha', 'ram', '2023-06-19 15:12:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_notice`
--

CREATE TABLE `db_notice` (
  `id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `notice` varchar(4000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_notice`
--

INSERT INTO `db_notice` (`id`, `subject`, `notice`, `date`, `emp_id`, `status`) VALUES
(1, 'Youth Fest - The Young india', 'Marwari College\r\n\r\nNotice\r\n\r\nYouth festival organised\r\n\r\nIt is to be announced to all the students of K. S. School of Business Management that Gujarat University Youth Festival 2019 is going to be held on 3rd 4th and 5th September, 2019. For participation the link is available on the KSSBM website. The last date for the registration is extended up to 10th August, 2019 till 6 PM. Kindly register on the link given below. For the further information refer K.S website regularly.\r\nPDF for Rules and Regulations: Click Here.. Registration Form Link:\r\n1.For Individual Events :- Click Here.. 2. For Group Events :- Click Here..\r\nFor further query contact the following faculty:\r\n(For MBA) [Timings: 8AM to 2PM]\r\n1. Ishita Sakariya\r\n2. Ritika Dave\r\n3. Viral Thakor\r\n(For M.Sc (CA & IT)) [Timings: 12PM to 5PM] 1. Mansi Mehta\r\n2. Vrunda Gadesha \r\n3. Shreeja Shah', '2023-03-09', 'MCR1221', 0),
(11, 'MCA MED SEM EXAM', 'Notice: Marwari College Notice Youth festival organised It is to be announced to all the students of K. S. School of Business Management that Gujarat University Youth Festival 2019 is going to be held on 3rd 4th and 5th September, 2019. For participation the link is available on the KSSBM website. The last date for the registration is extended up to 10th August, 2019 till 6 PM. Kindly register on the link given below. For the further information refer K.S website regularly. PDF for Rules and Regulations: Click Here.. Registration Form Link: 1.For Individual Events :- Click Here.. 2. For Group Events :- Click Here.. For further query contact the following faculty: (For MBA) [Timings: 8AM to 2PM] 1. Ishita Sakariya 2. Ritika Dave 3. Viral Thakor (For M.Sc (CA & IT)) [Timings: 12PM to 5PM] 1. Mansi Mehta 2. Vrunda Gadesha 3. Shreeja Shah ', '2023-03-10', 'MCR1221', 0),
(15, 'Save the Soil', 'Soil conservation\r\n\r\nThe technique of managing land so that it can be used more successfully is known as soil conservation. This can take the shape of water conservation, soil erosion prevention, environmental protection, and ecosystem maintenance.\r\n\r\n', '2023-03-14', 'MCR456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dlocker`
--

CREATE TABLE `dlocker` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `reg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dlocker`
--

INSERT INTO `dlocker` (`id`, `type`, `file`, `uid`, `reg`) VALUES
(4, 'College Id', 'DOC.pdf', '12', 'MCRMS970146'),
(5, 'Voter Card', '1655821746895.jpg', '1212', 'MCRMS970146'),
(6, 'Driving Licence', 'munshi.png', '3131', 'MCRMS970146'),
(7, 'Adhar Card', 'IMG_20220105_114630.jpg', '22', 'HDSC1234');

-- --------------------------------------------------------

--
-- Table structure for table `due`
--

CREATE TABLE `due` (
  `id` int(11) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `due` varchar(100) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `due`
--

INSERT INTO `due` (`id`, `reg`, `due`, `status`) VALUES
(1, 'MCR123', '60', 0),
(2, 'MCRMS970146', '10', 0),
(3, 'vip123', '10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `message`, `status`) VALUES
(1, NULL, 'yogesh@gmail.com', NULL, NULL, 0),
(2, NULL, 'radha@gmail.com', NULL, NULL, 0),
(5, NULL, 'lib@gmail.com', NULL, NULL, 0),
(6, NULL, 'ram@gmail.com', NULL, NULL, 0),
(7, NULL, 'about@gmail.com', NULL, NULL, 0),
(8, 'Ram', 'marscorp1221@gmail.com', '7458965486', 'im a test message.', 0),
(9, 'radha', 'marscorp1221@gmail.com', '7458965486', 'im a test message.', 0),
(10, NULL, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lib_record`
--

CREATE TABLE `lib_record` (
  `id` int(11) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `date_issue` date NOT NULL,
  `date_return` date NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_no` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lib_record`
--

INSERT INTO `lib_record` (`id`, `reg`, `date_issue`, `date_return`, `book_name`, `book_no`, `status`) VALUES
(8, 'MCR123', '2023-03-10', '2023-03-12', '2 STATE', '222', 1),
(9, 'MCR123', '2023-03-06', '2023-03-11', 'Madhushala', '1232', 1),
(10, 'MCRMS970146', '2023-03-09', '2023-03-12', '2 STATE', '222', 1),
(11, 'MCRMS970146', '2023-03-09', '2023-03-11', '2 STATE', '222', 1),
(12, 'MCR123', '2023-03-09', '2023-03-12', '2 STATE', '222', 1),
(13, 'MCR123', '2023-03-07', '2023-03-13', '2 STATE', '222', 0),
(14, 'MCRMS970146', '2023-03-08', '2023-03-14', 'Madhushala', '1232', 0),
(15, 'MCR123', '2023-03-06', '2023-03-11', 'Encyclopedia', '333', 1),
(16, 'MCRMS970146', '2023-03-10', '2023-03-13', 'C++', '323', 1),
(17, 'vip123', '2023-03-16', '2023-03-17', 'harry potter', '136', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result_data`
--

CREATE TABLE `result_data` (
  `id` int(11) NOT NULL,
  `reg_id` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `semester` int(2) NOT NULL,
  `paper` varchar(100) NOT NULL,
  `fm` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `exam_name` int(1) NOT NULL,
  `result` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result_data`
--

INSERT INTO `result_data` (`id`, `reg_id`, `session`, `semester`, `paper`, `fm`, `pass`, `exam_name`, `result`, `credit`, `grade`, `date`, `status`) VALUES
(3, 'MCRMS970146', '2021-23', 1, 'MCA101', '100', '32', 1, '89', '4', 'A+', '2023-03-18', 0),
(4, 'vip123', '2021-23', 3, '23232', '100', '22', 3, '55', '4', 'P', '2023-03-18', 0),
(5, 'mcr123', '1', 1, 'MCA101', '100', '20', 1, '10', '4', 'F', '2023-03-19', 0),
(7, 'MCR123', '1', 2, 'MCA102', '100', '30', 1, '50', '4', 'Examination..', '2023-03-19', 0),
(8, 'VIP123', '1', 2, '123', '100', '20', 3, '80', '4', 'A+', '2023-03-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class_roll` int(3) DEFAULT NULL,
  `reg_id` varchar(100) NOT NULL,
  `exam_id` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(60) NOT NULL,
  `about` varchar(500) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `twitter` varchar(500) DEFAULT NULL,
  `fb` varchar(500) DEFAULT NULL,
  `insta` varchar(500) DEFAULT NULL,
  `linkedin` varchar(500) DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `otp` int(11) DEFAULT NULL,
  `father` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `name`, `class_roll`, `reg_id`, `exam_id`, `department`, `username`, `password`, `email`, `about`, `address`, `phone`, `twitter`, `fb`, `insta`, `linkedin`, `date`, `status`, `otp`, `father`) VALUES
(1, 'YOGESH KUMAR JHA', 136, 'MCRMS970146', 'MCRMS970146', 'MCA', 'yogesh', '123', 'marscorp1221@gmail.com', 'im a good student mca', 'Old ST, Dhurwa, Sector - II, Ranchi - JH', '7458965486', '', 'https://www.facebook.com/yogesh.Anjali.jha', '', '', '2023-03-12', 0, NULL, ''),
(3, 'Shiwani Kumari ', 123, 'HDSC1234', 'HDSC1234', 'BDS', 'shiwani', 'shi', 'shiwanijhakumari@gmail.com', 'Graduates upon completion of MBA after BDS receive high scopes of employment as hospital management is an emerging field of work in India. Graduates are recruited by top dental services firms and clinics which allow them to practice and look after operations at the same time.', 'Argora, Harmu Housing, Ranchi', '5238965478', '', 'https://www.facebook.com/yogesh.Anjali.jha', '', '', '2023-03-12', 0, NULL, 'Mr. Palat Jha'),
(4, 'Ramadhr Singh', 123, 'MCR123', 'MCR123', 'BCA', 'rama', '1234', 'rama@gamail.com', 'A Master of Business Administration is a postgraduate degree focused on business administration. The core courses in an MBA program cover various areas of business administration such as accounting.', 'Mecon Doranda, Ranchi', '7458245786', '', '', '', '', '2023-03-12', 0, NULL, 'Ramkishor Singh'),
(6, 'USHA JHA', 2221, 'MCR21', 'MCR21', 'MCA', 'USHAjha', '222', 'USHA@GMAIL.COM', 'Im a house wife', 'Old ST, Dhurwa, Sector - II, Ranchi - JH', '7458965486', '', '', '', '', '2023-03-17', 0, NULL, 'Shri DAMODAR JHA'),
(7, 'vipul', 123, 'VIP123', 'VVV123', 'BCA', 'vipul', '122', 'mars@gmail.com', '', '', '', '', '', '', '', '2023-03-18', 0, NULL, 'parmod');

-- --------------------------------------------------------

--
-- Table structure for table `student_friend`
--

CREATE TABLE `student_friend` (
  `id` int(11) NOT NULL,
  `main_id` varchar(50) NOT NULL,
  `friend_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_friend`
--

INSERT INTO `student_friend` (`id`, `main_id`, `friend_id`, `status`) VALUES
(4, 'shiwani', 'yogi', 0),
(5, 'yogi', 'shiwani', 0),
(6, 'yogi', 'rama', 0),
(7, 'shiwani', 'rama', 0),
(8, 'rama', 'yogi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_msg`
--

CREATE TABLE `student_msg` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `reciver` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_msg`
--

INSERT INTO `student_msg` (`id`, `sender`, `reciver`, `message`, `date`, `status`) VALUES
(1, 'rama', 'ushajha', 'hi usha student', '2023-03-19', 0),
(3, 'USHAjha', 'rama', 'hi kon ho?', '2023-03-19', 0),
(4, 'rama', 'yogi', 'ramadhir singh', '2023-03-21', 0),
(5, 'yogesh', 'shiwani', 'hi im yogeshhhhhhh', '2023-06-21', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_friend`
--
ALTER TABLE `admin_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_msg`
--
ALTER TABLE `admin_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_db`
--
ALTER TABLE `book_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_db`
--
ALTER TABLE `community_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_notice`
--
ALTER TABLE `db_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dlocker`
--
ALTER TABLE `dlocker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due`
--
ALTER TABLE `due`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_record`
--
ALTER TABLE `lib_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_data`
--
ALTER TABLE `result_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_id` (`reg_id`,`username`);

--
-- Indexes for table `student_friend`
--
ALTER TABLE `student_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_msg`
--
ALTER TABLE `student_msg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_friend`
--
ALTER TABLE `admin_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_msg`
--
ALTER TABLE `admin_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_db`
--
ALTER TABLE `book_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `community_db`
--
ALTER TABLE `community_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `db_notice`
--
ALTER TABLE `db_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dlocker`
--
ALTER TABLE `dlocker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `due`
--
ALTER TABLE `due`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lib_record`
--
ALTER TABLE `lib_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `result_data`
--
ALTER TABLE `result_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_friend`
--
ALTER TABLE `student_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_msg`
--
ALTER TABLE `student_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
