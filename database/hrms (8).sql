-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 08:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowance`
--

CREATE TABLE `allowance` (
  `id` int(11) NOT NULL,
  `allowances` varchar(255) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowance`
--

INSERT INTO `allowance` (`id`, `allowances`, `value`, `code`, `created`) VALUES
(3, 'project', 67000, '00331', '2022-04-15'),
(4, 'project', 67000, '00331', '2022-04-15'),
(25, 'Medical', 800, '13130', '2022-04-23'),
(26, 'transport', 17, '13130', '2022-04-23'),
(27, 'testing', 10, '13130', '2022-04-23'),
(28, 'project', 1000, '13130', '2022-04-23'),
(29, 'others', 300, '13130', '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appraisal`
--

CREATE TABLE `appraisal` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) DEFAULT NULL,
  `appraisal` varchar(255) DEFAULT NULL,
  `app_code` varchar(255) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `score` varchar(20) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appraisal`
--

INSERT INTO `appraisal` (`id`, `emp_id`, `appraisal`, `app_code`, `month`, `year`, `score`, `created`) VALUES
(1, 'EMP-1790664334', 'Communication Skills', '41344', 4, 2022, '2', '2022-04-13'),
(2, 'EMP-1790664334', 'Ability to negotiate', '41344', 4, 2022, '2', '2022-04-13'),
(3, 'EMP-1790664334', 'Team work Level', '41344', 4, 2022, '3', '2022-04-13'),
(4, 'EMP-1790664334', 'Work under pressure', '41344', 4, 2022, '2', '2022-04-13'),
(5, 'EMP-1790664334', 'Approach', '41344', 4, 2022, '3', '2022-04-13'),
(6, 'EMP-1790664334', 'Perseverance', '41344', 4, 2022, '3', '2022-04-13'),
(7, 'EMP-1790664334', 'Tolerance', '41344', 4, 2022, '2', '2022-04-13'),
(8, 'EMP-1790664334', 'Emotional Control', '41344', 4, 2022, '2', '2022-04-13'),
(9, 'EMP-1790664334', 'Punctuality', '41344', 4, 2022, '1', '2022-04-13'),
(10, 'EMP-1790664334', 'Relevance', '41344', 4, 2022, '3', '2022-04-13'),
(11, 'EMP-202073319', 'Communication Skills', '20315', 4, 2022, '4', '2022-04-14'),
(12, 'EMP-202073319', 'Ability to negotiate', '20315', 4, 2022, '5', '2022-04-14'),
(13, 'EMP-202073319', 'Team work Level', '20315', 4, 2022, '4', '2022-04-14'),
(14, 'EMP-202073319', 'Work under pressure', '20315', 4, 2022, '2', '2022-04-14'),
(15, 'EMP-202073319', 'Approach', '20315', 4, 2022, '3', '2022-04-14'),
(16, 'EMP-202073319', 'Perseverance', '20315', 4, 2022, '2', '2022-04-14'),
(17, 'EMP-202073319', 'Tolerance', '20315', 4, 2022, '2', '2022-04-14'),
(18, 'EMP-202073319', 'Emotional Control', '20315', 4, 2022, '3', '2022-04-14'),
(19, 'EMP-202073319', 'Punctuality', '20315', 4, 2022, '4', '2022-04-14'),
(20, 'EMP-202073319', 'Relevance', '20315', 4, 2022, '4', '2022-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text,
  `chat_from` varchar(255) DEFAULT NULL,
  `chat_to` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_assign`
--

CREATE TABLE `company_assign` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_assign`
--

INSERT INTO `company_assign` (`id`, `company_id`, `employee_id`, `created`, `created_by`) VALUES
(1, 1, 2, '2022-04-25', 1),
(2, 1, 3, '2022-04-25', 1),
(3, 1, 4, '2022-04-25', 1),
(4, 2, 1, '2022-04-25', 1),
(5, 2, 2, '2022-04-25', 1),
(6, 2, 3, '2022-04-25', 1),
(7, 2, 4, '2022-04-25', 1),
(8, 3, 1, '2022-04-25', 1),
(9, 3, 2, '2022-04-25', 1),
(10, 3, 3, '2022-04-25', 1),
(11, 3, 4, '2022-04-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` text,
  `created` date DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`id`, `company_name`, `address`, `created`, `fname`, `lname`, `email`, `phone`) VALUES
(1, 'Chevron', 'Abijoh Lagos', '2022-04-25', 'Ngozi', 'paul O.', 'idahjohnpaul@gmail.com', '09090344667'),
(2, 'HydroCarbon', 'abijoh', '2022-04-25', 'Adenuga', 'paul O.', 'ark@g.co', '09090344667'),
(3, 'Mr.Biggs', 'abijoh', '2022-04-25', 'Adenuga', 'paul O.', 'ark@g.co', '09090344667');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `employee` varchar(255) DEFAULT NULL,
  `complaint_type` varchar(255) DEFAULT NULL,
  `complaint_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`id`, `type`, `created`) VALUES
(1, 'Work Related', '2022-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `id` int(11) NOT NULL,
  `deductions` varchar(255) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`id`, `deductions`, `value`, `code`, `created`) VALUES
(3, 'house rent', 7000, '00331', '2022-04-15'),
(4, 'house rent', 7000, '00331', '2022-04-15'),
(21, 'Contribution', 78000, '13130', '2022-04-23'),
(22, 'lunch', 78000, '13130', '2022-04-23'),
(23, 'testing', 78000, '13130', '2022-04-23'),
(24, 'lateness', 7000, '13130', '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `hod` varchar(255) DEFAULT NULL,
  `last_update` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `hod`, `last_update`, `update_by`, `created`) VALUES
(4, 'Better', 'Mr. Buju Benson', '10-04-47 2022-04-11', 'System Admin', '2022-04-10'),
(5, 'Housing', 'Mr. Akinwole Oyenusi', '09-04-04 2022-04-11', 'System Admin', '2022-04-10'),
(6, 'Welfare', 'Mr. Akinwole Oyenusi', '09-04-54 2022-04-11', 'System Admin', '2022-04-10'),
(7, 'Nursing', 'Mr. Buju Benson', '01-04-32 2022-04-11', 'System Admin', '2022-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `emp_img` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `desg` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `qual` varchar(255) NOT NULL,
  `qualupload` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `acctno` varchar(11) NOT NULL,
  `acctname` varchar(255) NOT NULL,
  `salary_id` varchar(255) NOT NULL,
  `profile_code` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `emp_type` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `last_update` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `lastname`, `gender`, `dob`, `emp_img`, `email`, `phone`, `city`, `address`, `state`, `emp_id`, `desg`, `dept`, `qual`, `qualupload`, `bank`, `acctno`, `acctname`, `salary_id`, `profile_code`, `status`, `emp_type`, `facebook`, `instagram`, `twitter`, `role`, `last_update`, `update_by`, `created`) VALUES
(1, 'Ayomide', 'Akerele', 'Male', '2022-04-19', '625698526ac690.26239522.jpg', 'admin@admin.com', '08152397199', 'Lagos', '7, Wahab Ashafa Street, Langbasa, Ajah, Lagos.', 'Lagos', 'EMP-1315348780', 'Front Desk', 'Housing', 'Welfare', '62568fb3a393a5.84987200.jpg', 'Access Bank Plc.', '1395091169', 'Akerele Quadri Ayomide', '1', 1854059906, 1, 'internal', NULL, NULL, NULL, 'Welfare', '10-04-11 2022-04-13', 'System Admin', '2022-04-13'),
(2, 'Dapo', 'Johnson', 'Male', '2022-04-12', '62572140ab8c35.82296047.jpg', 'superadmin@gsms.com', '09032144323', 'Lagos', 'Current House Address', 'Lagos', 'EMP-1790664334', 'Front Desk', 'Planning &amp; Budget', 'Welfare', '62572140ab9975.45890662.jpg', 'Access Bank', '661592234', 'Dapo Johnson', '1', 1134242891, 1, 'internal', NULL, NULL, NULL, 'Welfare', '21-04-12 2022-04-13', 'Ayomide Akerele', '2022-04-13'),
(3, 'Joel', 'Austin', 'Male', '1999-03-13', '6257d201170453.24529633.jpg', 'joel@email.com', '09012344556', 'Lagos', '123, Webbi Avenue, GRA, Lagos.', 'Lagos', 'EMP-202073319', 'Software Engineer', 'Planning &amp; Budget', 'Welfare', '6257d201171089.51041215.jpg', 'Ecobank', '0002345679', 'Joel Austin', '1', 2033375927, 1, 'outsource', NULL, NULL, NULL, 'Welfare', '09-04-21 2022-04-14', 'Ayomide Akerele', '2022-04-14'),
(4, 'Adenuga', 'Emmanuel', 'Male', '2022-03-28', '6262ba35b9f786.06971785.jpg', 'adenugaemma1@gmail.com', '09090344667', 'lagos', 'abijo Lagos Nigeria', 'lagos', 'EMP-459202997', 'Managing Director', '6', 'Hnd', '6262ba35bb5b50.56236677.jpg', 'Access Bank', '1234567890', 'Ade Emmanuel O.', '2', 352388989, 1, 'outsource', NULL, NULL, NULL, 'Admin', '16-04-45 2022-04-22', 'Ayomide Akerele', '0000-00-00'),
(5, 'Ngozi', 'Emmanuel', 'Female', '2022-03-28', '6262fb99352262.72505952.jpg', 'ngoziemmanuel2@gmail.com', '09090344667', 'lagos', 'abijo Lagos Nigeria', 'lagos', 'EMP-512282880', 'Medical Personnel', '7', 'Ssce', '6262fb99364774.05031137.jpg', 'Access Bank', '1234567890', 'Ngozi Emmanuel O.', '2', 1842924452, 1, 'outsource', NULL, NULL, NULL, 'Admin', '21-04-45 2022-04-22', 'Ayomide Akerele', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `pay_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_id`, `employee_id`, `created`, `created_by`) VALUES
(3, 2, 2, '2022-04-21', 1),
(4, 2, 3, '2022-04-21', 1),
(5, 3, 1, '2022-04-22', 1),
(6, 3, 2, '2022-04-22', 1),
(7, 3, 3, '2022-04-22', 1),
(10, 4, 1, '2022-04-22', 1),
(11, 4, 2, '2022-04-22', 1),
(12, 5, 1, '2022-04-22', 1),
(13, 5, 2, '2022-04-22', 1),
(14, 5, 3, '2022-04-22', 1),
(16, 6, 1, '2022-04-22', 1),
(17, 6, 4, '2022-04-22', 1),
(18, 3, 4, '2022-04-22', 1),
(20, 5, 4, '2022-04-22', 1),
(21, 7, 1, '2022-04-22', 1),
(22, 7, 4, '2022-04-22', 1),
(23, 7, 5, '2022-04-22', 1),
(24, 7, 2, '2022-04-22', 1),
(25, 7, 3, '2022-04-22', 1),
(26, 8, 1, '2022-04-23', 1),
(27, 8, 3, '2022-04-23', 1),
(28, 8, 4, '2022-04-23', 1),
(30, 8, 2, '2022-04-23', 1),
(31, 8, 5, '2022-04-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_tbl`
--

CREATE TABLE `group_tbl` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_tbl`
--

INSERT INTO `group_tbl` (`id`, `group_name`, `created`) VALUES
(2, 'Environmental Group', '0000-00-00'),
(3, 'Software Devers', '2022-04-22'),
(4, 'Dex Ambassadors', '2022-04-22'),
(5, 'Projects Group', '2022-04-22'),
(6, 'Maintenance Team', '2022-04-22'),
(7, 'Project Group2', '2022-04-22'),
(8, 'Training Group', '2022-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `indicator`
--

CREATE TABLE `indicator` (
  `id` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL,
  `ind_code` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indicator`
--

INSERT INTO `indicator` (`id`, `indicator`, `ind_code`, `type`, `created`) VALUES
(1, 'Communication Skills', '34020', 'Technical', '2022-04-13'),
(2, 'Ability to negotiate', '54305', 'Technical', '2022-04-13'),
(3, 'Perseverance', '44034', 'Behavioural', '2022-04-13'),
(4, 'Tolerance', '15123', 'Behavioural', '2022-04-13'),
(5, 'Emotional Control', '31235', 'Behavioural', '2022-04-13'),
(6, 'Team work Level', '54222', 'Technical', '2022-04-13'),
(7, 'Work under pressure', '35022', 'Technical', '2022-04-13'),
(8, 'Punctuality', '45241', 'Behavioural', '2022-04-13'),
(9, 'Approach', '30004', 'Technical', '2022-04-13'),
(10, 'Relevance', '50030', 'Behavioural', '2022-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `nature` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `description` text,
  `type` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `nature`, `experience`, `age`, `close_date`, `description`, `type`, `salary`, `vacancy`, `status`, `created`) VALUES
(2, 'Mobile App Developer', 'Part Time', '2 to 5 years', '23 to 30 years', '2022-05-02', 'please we are in severe need oooooooooooooooooo\r\nooooooooooooooooo\r\noooooooooooooooooo', 'software dev', 3000000, 20, 0, '2022-04-10'),
(3, 'Senior Cleaner', 'Full Time', '5 to 10 years', '23 to 30 years', '2022-05-01', '                                                            apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible.                                                            ', 'misscelenio', 5000000, 39, 0, '2022-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `leave_app`
--

CREATE TABLE `leave_app` (
  `id` int(11) NOT NULL,
  `applicant` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `note` text,
  `duration` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_category`
--

CREATE TABLE `leave_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_category`
--

INSERT INTO `leave_category` (`id`, `category`, `created`) VALUES
(1, 'Study Leave', NULL),
(2, 'Sick Leave', NULL),
(3, 'Maternal Leave', '2022-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `loan_amount` float(11,2) DEFAULT NULL,
  `loan_balance` float(11,2) DEFAULT NULL,
  `monthly_pay` float(11,2) DEFAULT NULL,
  `note` text,
  `code` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `duration` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `employee_id`, `loan_amount`, `loan_balance`, `monthly_pay`, `note`, `code`, `status`, `duration`, `created`) VALUES
(3, 1, 3000.00, 3000.00, 1000.00, 'please I am in severe need', '1990514328', 1, 3, '2022-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `loan_payment`
--

CREATE TABLE `loan_payment` (
  `id` int(11) NOT NULL,
  `amount_paid` int(20) DEFAULT NULL,
  `code` int(20) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_payment`
--

INSERT INTO `loan_payment` (`id`, `amount_paid`, `code`, `emp_id`, `created`) VALUES
(1, 21000, 1990514328, NULL, '2022-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `receiver` varchar(255) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `sender_trash` int(11) NOT NULL DEFAULT '0',
  `receiver_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `subject`, `message`, `receiver`, `sender`, `created`, `sender_name`, `receiver_name`, `sender_trash`, `receiver_trash`) VALUES
(3, 'president has traveled', 'aamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsv', 'admin2@admin2.com', 'admin@admin.com', '10 April ,2022 - 23:34:44', 'admin admin', 'admin2 admin2', 1, 0),
(4, 'photo now reigning !!!', 'aamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsv', 'admin2@admin2.com', 'admin@admin.com', '11 April ,2022 - 00:48:15', 'admin admin', 'admin2 admin2', 0, 0),
(5, 'president has traveled here too !!!', 'aamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsv', 'admin@admin.com', 'admin2@admin2.com', '11 April ,2022 - 01:21:55', 'admin2 admin2', 'admin admin', 0, 1),
(6, 'president has traveled here too now !!!', 'aamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsv', 'admin@admin.com', 'john@email.com', '11 April ,2022 - 12:45:56', 'John Paul', 'admin admin', 0, 0),
(7, 'photo now reigning !!!', 'aamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsv', 'john@email.com', 'admin@admin.com', '13 April ,2022 - 08:50:27', 'admin admin', 'Paul John', 0, 0),
(8, 'Testing', 'This is the email body', 'superadmin@gsms.com', 'admin@admin.com', '14 April ,2022 - 00:16:03', 'Ayomide Akerele', 'Johnson Dapo', 0, 0),
(9, 'Testing', 'This is a message', 'joel@email.com', 'admin@admin.com', '14 April ,2022 - 13:14:36', 'Ayomide Akerele', 'Austin Joel', 0, 0),
(0, 'president has traveled', 'aamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsvaamsdgvsdgsvdgsvdgsv', 'joel@email.com', 'admin@admin.com', '21 April ,2022 - 22:26:53', 'Ayomide Akerele', 'Austin Joel', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_activity`
--

CREATE TABLE `payment_activity` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `basic` bigint(20) DEFAULT NULL,
  `total_allowance` bigint(20) DEFAULT NULL,
  `gross` bigint(20) DEFAULT NULL,
  `loan` bigint(20) DEFAULT NULL,
  `tax` bigint(20) DEFAULT NULL,
  `total_deduction` bigint(20) DEFAULT NULL,
  `grand_deduction` bigint(20) DEFAULT NULL,
  `net` bigint(20) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_activity`
--

INSERT INTO `payment_activity` (`id`, `employee_id`, `grade`, `basic`, `total_allowance`, `gross`, `loan`, `tax`, `total_deduction`, `grand_deduction`, `net`, `month`, `year`, `created`, `created_by`, `code`) VALUES
(1, '1', 'GRADE B', 78000000, 1827, 78001827, 1000, 6115122, 234000, 6350122, 71651705, 4, 2022, '2022-04-23', 'Ayomide Akerele', '1602158265'),
(2, '2', 'GRADE B', 15000000, 134000, 15134000, 0, 1175985, 14000, 1189985, 13944015, 4, 2022, '2022-04-23', 'Ayomide Akerele', '1174043982'),
(3, '3', 'GRADE A', 78000000, 1827, 78001827, 0, 6115122, 234000, 6349122, 71652705, 4, 2022, '2022-04-23', 'Ayomide Akerele', '1768786670'),
(4, '4', 'GRADE B', 15000000, 134000, 15134000, 0, 1175985, 14000, 1189985, 13944015, 4, 2022, '2022-04-23', 'Ayomide Akerele', '1536335501'),
(5, '5', 'GRADE A', 15000000, 134000, 15134000, 0, 1175985, 14000, 1189985, 13944015, 4, 2022, '2022-04-23', 'Ayomide Akerele', '357166035'),
(6, '1', 'GRADE A12', 98000000, 2127, 98002127, 1000, 7683102, 241000, 7925102, 90077025, 1, 2022, '2022-04-23', 'Ayomide Akerele', '50309805'),
(7, '2', 'GRADE B1', 15000000, 134000, 15134000, 0, 1175985, 14000, 1189985, 13944015, 1, 2022, '2022-04-23', 'Ayomide Akerele', '483202391'),
(8, '3', 'GRADE A12', 98000000, 2127, 98002127, 0, 7683102, 241000, 7924102, 90078025, 1, 2022, '2022-04-23', 'Ayomide Akerele', '138701755'),
(9, '4', 'GRADE B1', 15000000, 134000, 15134000, 0, 1175985, 14000, 1189985, 13944015, 1, 2022, '2022-04-23', 'Ayomide Akerele', '11932136'),
(10, '5', 'GRADE B1', 15000000, 134000, 15134000, 0, 1175985, 14000, 1189985, 13944015, 1, 2022, '2022-04-23', 'Ayomide Akerele', '648299877');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `deduction` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `report` text,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `manager` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `note` text,
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary_temp`
--

CREATE TABLE `salary_temp` (
  `id` int(11) NOT NULL,
  `salary_grade` varchar(255) DEFAULT NULL,
  `salary` decimal(11,2) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_temp`
--

INSERT INTO `salary_temp` (`id`, `salary_grade`, `salary`, `tax_id`, `created`, `code`) VALUES
(1, 'GRADE A12', '98000000.00', 1, '2022-04-23', '13130'),
(2, 'GRADE B1', '15000000.00', 1, '2022-04-15', '00331');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `assign_to` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax_name` varchar(255) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_name`, `value`, `created`) VALUES
(1, 'VAT', 7.8399, '2022-04-12'),
(2, 'FFTAX', 50, '2022-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `employee` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `finish_date` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `performance` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `last_update` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `employee`, `course`, `vendor`, `start_date`, `finish_date`, `cost`, `status`, `performance`, `remarks`, `last_update`, `update_by`, `created`) VALUES
(1, 'Dapo Johnson', 'Elective', 'Vijay Thapa', '2022-04-15', '2022-04-29', '10000', 'Active', 'Lobbist', 'This is training summary and reason.', '12-48-22 2022-04-14', 'Ayomide Akerele', '2022-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `training_course`
--

CREATE TABLE `training_course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `vendor` varchar(255) NOT NULL,
  `last_update` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_course`
--

INSERT INTO `training_course` (`id`, `course_name`, `cost`, `description`, `vendor`, `last_update`, `update_by`, `created`) VALUES
(1, 'Elective', '10000', 'This course is free', 'Vijay Thapa', '19:59:48 2022-04-11', 'root', '2022-04-11'),
(2, 'Selective', '12000', 'This course costs 100000.', 'Dani Krossing', '20:02:10 2022-04-11', 'root', '2022-04-11'),
(3, 'Emotional Intelligence', '40000', 'This is a course focusing on employee emotional intelligence management.', 'vijay thapa', '12:26:44 2022-04-14', 'root', '2022-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_code` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `email`, `role`, `phone`, `profile_code`, `status`, `password`, `image`, `created`) VALUES
(1, 'Ayomide', 'Akerele', 'Male', 'admin@admin.com', 'Admin', '08152397199', 1854059906, 0, '$2y$10$BUTPocFSN2FLsMdVpdN7tecIIrGhWdnKih7B2LXqmTBm4mLRJPD5S', '625698526ac690.26239522.jpg', '2022-04-13'),
(2, 'Dapo', 'Johnson', 'Male', 'superadmin@gsms.com', 'Welfare', '09032144323', 1134242891, 0, '$2y$10$YZsnKsulBNXqPda.EnrMwubk94RcguDCBuqxFf4ccgAEvQBGd3CZS', '62572140ab8c35.82296047.jpg', '2022-04-13'),
(3, 'Joel', 'Austin', 'Male', 'joel@email.com', 'Welfare', '09012344556', 2033375927, 0, '$2y$10$N4/7NVY4d6e.uDZ3XKgvF.avfWqRSNkCER/MrLRpVr8/i2uuTj/a.', '6257d201170453.24529633.jpg', '2022-04-14'),
(4, 'Adenuga', 'Emmanuel', 'Male', 'adenugaemma1@gmail.com', 'Admin', '09090344667', 352388989, 0, '$2y$10$1N9XUBglffGiclL.7LOpve1M43UW1bIqR1AxOPQ6bObG6u/SdKhoa', '6262ba35b9f786.06971785.jpg', NULL),
(5, 'Ngozi', 'Emmanuel', 'Female', 'ngoziemmanuel2@gmail.com', 'Admin', '09090344667', 1842924452, 0, '$2y$10$/fu2ZcTHklCkFBGWghOidO/LXmmpUi/tJ3ftMyv3GmBxnZ.KS.PJO', '6262fb99352262.72505952.jpg', NULL),
(7, 'Ngozi', 'paul O.', NULL, 'idahjohnpaul@gmail.com', 'company', '09090344667', 384185912, 0, '$2y$10$wRs3ka5.qnu3OJG05C0HvuOkpb6mj3nx5/TERHJ/d/MV.BIZO7JRO', '6266ddd4747e46.73754816.jpg', '2022-04-25'),
(8, 'Adenuga', 'paul O.', NULL, 'ark@g.co', 'company', '09090344667', 342893944, 0, '$2y$10$Oog/NCQRs0WY04gndrcYv.GZjlihk3uMDW1c/KEttAjrxlP8PKgo2', '6266e4a2efff64.31250655.jpg', '2022-04-25'),
(9, 'Adenuga', 'paul O.', NULL, 'ark@g.co', 'company', '09090344667', 494505560, 0, '$2y$10$U4/WAUCqkhOFdCESWaClbeIS2D4tdQXIpDitgvzdsc/nEObjsW4Xe', '6266e4ddaed881.73538878.jpg', '2022-04-25'),
(10, 'Adenuga', 'paul O.', NULL, 'ark@g.co', 'company', '09090344667', 239801592, 0, '$2y$10$iYbTI39f6A4mBHpG1xlDlutpRn9h3RzhrXocizlR.v0J2K5sESjxW', '6266e4f2e302e8.85026814.jpg', '2022-04-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowance`
--
ALTER TABLE `allowance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appraisal`
--
ALTER TABLE `appraisal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_assign`
--
ALTER TABLE `company_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_tbl`
--
ALTER TABLE `company_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_tbl`
--
ALTER TABLE `group_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_payment`
--
ALTER TABLE `loan_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_activity`
--
ALTER TABLE `payment_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_temp`
--
ALTER TABLE `salary_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowance`
--
ALTER TABLE `allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `company_assign`
--
ALTER TABLE `company_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `group_tbl`
--
ALTER TABLE `group_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan_payment`
--
ALTER TABLE `loan_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_activity`
--
ALTER TABLE `payment_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary_temp`
--
ALTER TABLE `salary_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
