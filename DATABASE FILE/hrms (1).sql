-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 07:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `allowance`
--

INSERT INTO `allowance` (`id`, `allowances`, `value`, `code`, `created`) VALUES
(30, 'Project Materials', 6000, '00331', '2025-05-29'),
(31, 'project', 6000, '00331', '2025-05-29'),
(32, 'Wardrobe', 4000, '00331', '2025-05-29'),
(33, 'Medical', 800, '13130', '2025-05-29'),
(34, 'transport', 17000, '13130', '2025-05-29'),
(35, 'testing', 1000, '13130', '2025-05-29'),
(36, 'project', 1000, '13130', '2025-05-29'),
(37, 'others', 3000, '13130', '2025-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appraisal`
--

INSERT INTO `appraisal` (`id`, `emp_id`, `appraisal`, `app_code`, `month`, `year`, `score`, `created`) VALUES
(0, 'EMP-1790664334', 'Communication Skills', '43201', 5, 2025, '2', '2025-05-22'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `chat_from` varchar(255) DEFAULT NULL,
  `chat_to` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_assign`
--

INSERT INTO `company_assign` (`id`, `company_id`, `employee_id`, `created`, `created_by`) VALUES
(16, 5, 1, '2025-05-29', 1),
(17, 5, 2, '2025-05-29', 1),
(18, 6, 6, '2025-05-29', 1),
(19, 6, 7, '2025-05-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created` date DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`id`, `company_name`, `address`, `created`, `fname`, `lname`, `email`, `phone`, `img`) VALUES
(5, 'Vigor Hospital', 'abijoh', '2025-05-29', 'Jayson', 'Paul', 'vigor@expert.com', '09090766678', '683875e0231eb1.68111701.png'),
(6, 'Jaytech Pharmacy', 'Supplying drugs', '2025-05-29', 'Andrew', 'john', 'jaytech1@gmail.com', '09090766456', '683878555c0a03.65626184.png');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `employee` varchar(255) DEFAULT NULL,
  `complaint_type` varchar(255) DEFAULT NULL,
  `complaint_date` date DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `description`, `employee`, `complaint_type`, `complaint_date`, `status`, `attachment`, `created`) VALUES
(1, '  The laptop i use is bad  The laptop i use is bad   The laptop i use is bad  The laptop i use is bad  The laptop i use is bad v The laptop i use is bad', 'admin@admin.com', 'Technology &amp; Communication', '2025-05-29', 'Open', '68383cc69ebe22.53715625.png', '2025-05-29'),
(2, '  The laptop i use is bad  The laptop i use is bad   The laptop i use is bad  The laptop i use is bad  The laptop i use is bad v The laptop i use is bad', 'admin@admin.com', 'Technology &amp; Communication', '2025-05-29', 'Resolved', '68383e4ec62c36.23741209.png', '2025-05-29'),
(3, ' Please resolve', 'user@user.com', 'Work Related', '2025-05-29', 'Open', '683843080f5652.90635430.png', '2025-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`id`, `type`, `created`) VALUES
(1, 'Work Related', '2022-04-14'),
(2, 'Public Services Complaints', '2025-05-29'),
(3, 'Governance Complaints', '2025-05-29'),
(4, 'Social Issues', '2025-05-29'),
(5, 'Technology &amp; Communication', '2025-05-29');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`id`, `deductions`, `value`, `code`, `created`) VALUES
(26, 'house rent', 7000, '00331', '2025-05-29'),
(27, 'Contribution', 7000, '13130', '2025-05-29');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `hod`, `last_update`, `update_by`, `created`) VALUES
(4, 'Medical Services', 'sunday@gmail.com', '10-04-47 2022-04-11', 'System Admin', '2022-04-10'),
(5, 'Nursing Services', 'user@user.com', '09-04-04 2022-04-11', 'System Admin', '2022-04-10'),
(6, 'Administrative', 'admin@admin.com', '09-04-54 2022-04-11', 'System Admin', '2022-04-10'),
(7, 'Finance & Billing', 'account@gmail.com', '01-04-32 2022-04-11', 'System Admin', '2022-04-10'),
(8, 'Support Services', 'joel@email.com', '01-04-32 2022-04-11', 'System Admin', '2022-04-10');

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
  `status` int(11) NOT NULL DEFAULT 1,
  `emp_type` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `last_update` varchar(255) NOT NULL,
  `update_by` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `lastname`, `gender`, `dob`, `emp_img`, `email`, `phone`, `city`, `address`, `state`, `emp_id`, `desg`, `dept`, `qual`, `qualupload`, `bank`, `acctno`, `acctname`, `salary_id`, `profile_code`, `status`, `emp_type`, `facebook`, `instagram`, `twitter`, `role`, `last_update`, `update_by`, `created`) VALUES
(1, 'Ayomide', 'Akerele', 'Male', '2022-04-19', '625698526ac690.26239522.jpg', 'admin@admin.com', '08152397199', 'Lagos', '7, Wahab Ashafa Street, Langbasa, Ajah, Lagos.', 'Lagos', 'EMP-1315348780', 'Front Desk', '6', 'Bsc', '62568fb3a393a5.84987200.jpg', 'Access Bank Plc.', '1395091169', 'Akerele Quadri Ayomide', '1', 1854059906, 1, 'internal', NULL, NULL, NULL, 'Admin', '10-04-11 2022-04-13', 'System Admin', '2022-04-13'),
(2, 'Dapo', 'Johnson', 'Male', '2022-04-12', '62572140ab8c35.82296047.jpg', 'account@gmail.com', '09032144323', 'Lagos', 'Current House Address', 'Lagos', 'EMP-1790664334', 'Front Desk', '5', 'Ond', '62572140ab9975.45890662.jpg', 'Access Bank', '661592234', 'Dapo Johnson', '1', 1134242891, 1, 'internal', NULL, NULL, NULL, 'Employee', '21-04-12 2022-04-13', 'Ayomide Akerele', '2022-04-13'),
(3, 'Joel', 'Austin', 'Male', '1999-03-13', '6257d201170453.24529633.jpg', 'joel@email.com', '09012344556', 'Lagos', '123, Webbi Avenue, GRA, Lagos.', 'Lagos', 'EMP-202073319', 'Software Engineer', '8', 'Msc', '6257d201171089.51041215.jpg', 'Ecobank', '0002345679', 'Joel Austin', '1', 2033375927, 1, 'outsource', NULL, NULL, NULL, 'Employee', '09-04-21 2022-04-14', 'Ayomide Akerele', '2022-04-14'),
(5, 'Ngozi', 'Emmanuel', 'Female', '2022-03-28', '6262fb99352262.72505952.jpg', 'ngoziemmanuel2@gmail.com', '09090344667', 'lagos', 'abijo Lagos Nigeria', 'lagos', 'EMP-512282880', 'Medical Personnel', '7', 'Bsc', '6262fb99364774.05031137.jpg', 'Access Bank', '1234567890', 'Ngozi Emmanuel O.', '2', 1842924452, 1, 'outsource', NULL, NULL, NULL, 'Employee', '21-04-45 2022-04-22', 'Ayomide Akerele', '2025-05-28'),
(6, 'Mide', 'Ayo', 'Male', '2002-02-02', '682df0b2b445e2.75164470.jpeg', 'user@user.com', '08105455712', 'Lagos', '3 Amity Rd. Fidiso ', 'Lagos', 'EMP-1485414615', 'Nurse', '5', 'Hnd', '682df036959396.25487992.jpg', 'Test Bank', '0909090909', 'Test Test', '2', 1506481920, 1, 'internal', NULL, NULL, NULL, 'Employee', '17-05-38 2025-05-21', 'Ayomide Akerele', '2025-05-28'),
(7, 'Sunday', 'Paul', 'Male', '2006-01-02', '68371c55a69263.06897028.png', 'sunday@gmail.com', '09090766543', 'Lagos', '9, Iyalaje Street Abijoh', 'Lagos', 'EMP-1770432641', 'Assistant Doctor', '4', 'Bsc', '68371c55a71280.76227670.png', 'Opay', '0909090909', 'Sunday Paul', '2', 808068791, 1, 'internal', NULL, NULL, NULL, 'Employee', '16-05-17 2025-05-28', 'Ayomide Akerele', '2025-05-28');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_id`, `employee_id`, `created`, `created_by`) VALUES
(3, 2, 2, '2022-04-21', 1),
(4, 2, 3, '2022-04-21', 1),
(10, 4, 1, '2022-04-22', 1),
(11, 4, 2, '2022-04-22', 1),
(37, 11, 1, '2025-05-29', 1),
(38, 11, 2, '2025-05-29', 1),
(39, 11, 6, '2025-05-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_tbl`
--

CREATE TABLE `group_tbl` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `group_tbl`
--

INSERT INTO `group_tbl` (`id`, `group_name`, `created`) VALUES
(2, 'Environmental Group', '0000-00-00'),
(4, 'Dex Ambassadors', '2022-04-22'),
(11, 'Teaching Group', '2025-05-29');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `description` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `nature`, `experience`, `age`, `close_date`, `description`, `type`, `salary`, `vacancy`, `status`, `created`) VALUES
(2, 'Mobile App Developer', 'Part Time', '2 to 5 years', '23 to 30 years', '2022-05-02', 'please we are in severe need oooooooooooooooooo\r\nooooooooooooooooo\r\noooooooooooooooooo', 'software dev', 3000000, 20, 0, '2022-04-10'),
(3, 'Senior Cleaner', 'Full Time', '5 to 10 years', '23 to 30 years', '2022-05-01', '                                                                                                                        apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible. apply as soon as possible.                                                                                                                        ', 'Cleaner', 5000000, 39, 1, '2022-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `leave_app`
--

CREATE TABLE `leave_app` (
  `id` int(11) NOT NULL,
  `applicant` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created` date DEFAULT current_timestamp(),
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leave_app`
--

INSERT INTO `leave_app` (`id`, `applicant`, `title`, `type`, `note`, `duration`, `status`, `created`, `start_date`) VALUES
(1, 'admin@admin.com', NULL, 'Study Leave', 'I need this', '9', 'Approved', '2025-05-28', '2025-05-31'),
(2, 'user@user.com', NULL, 'Maternal Leave', 'For some reasons', '5', 'Approved', '2025-05-29', '2025-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `leave_category`
--

CREATE TABLE `leave_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `note` text DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `duration` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `paid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `employee_id`, `loan_amount`, `loan_balance`, `monthly_pay`, `note`, `code`, `status`, `duration`, `created`, `paid`) VALUES
(1, 6, 3000.00, 3000.00, 1000.00, 'Please in need', '1405579662', 3, 3, '2025-05-29', 0),
(2, 6, 10000.00, 10000.00, 10000.00, 'please', '1312337262', 3, 1, '2025-05-29', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan_payment`
--

INSERT INTO `loan_payment` (`id`, `amount_paid`, `code`, `emp_id`, `created`) VALUES
(1, 26000, 1990514328, NULL, '2022-04-18'),
(2, 2000, 491061105, 0, '2025-05-29'),
(3, 3000, 1405579662, 0, '2025-05-29'),
(4, 10000, 1312337262, 6, '2025-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `sender_trash` int(11) NOT NULL DEFAULT 0,
  `receiver_trash` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `subject`, `message`, `receiver`, `sender`, `created`, `sender_name`, `receiver_name`, `sender_trash`, `receiver_trash`) VALUES
(3, 'president has traveled', 'Good day, Here is the message', 'admin2@admin2.com', 'admin@admin.com', '10 April ,2022 - 23:34:44', 'admin admin', 'admin2 admin2', 1, 0),
(4, 'photo now reigning !!!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'admin2@admin2.com', 'admin@admin.com', '11 April ,2022 - 00:48:15', 'admin admin', 'admin2 admin2', 0, 0),
(5, 'president has traveled here too !!!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'admin@admin.com', 'admin2@admin2.com', '11 April ,2022 - 01:21:55', 'admin2 admin2', 'admin admin', 0, 1),
(6, 'president has traveled here too now !!!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'admin@admin.com', 'john@email.com', '11 April ,2022 - 12:45:56', 'John Paul', 'admin admin', 0, 0),
(7, 'photo now reigning !!!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'john@email.com', 'admin@admin.com', '13 April ,2022 - 08:50:27', 'admin admin', 'Paul John', 0, 0),
(8, 'Testing', 'greeetings, Here is the message', 'superadmin@gsms.com', 'admin@admin.com', '14 April ,2022 - 00:16:03', 'Ayomide Akerele', 'Johnson Dapo', 0, 0),
(9, 'Testing', 'This is a message', 'joel@email.com', 'admin@admin.com', '14 April ,2022 - 13:14:36', 'Ayomide Akerele', 'Austin Joel', 0, 0),
(10, 'president has traveled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'joel@email.com', 'admin@admin.com', '21 April ,2022 - 22:26:53', 'Ayomide Akerele', 'Austin Joel', 1, 0),
(11, 'Project discussion', 'Let&#039;s talk', 'superadmin@gsms.com', 'test@test.com', '22 May ,2025 - 18:37:42', 'test test', 'Johnson Dapo', 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_activity`
--

INSERT INTO `payment_activity` (`id`, `employee_id`, `grade`, `basic`, `total_allowance`, `gross`, `loan`, `tax`, `total_deduction`, `grand_deduction`, `net`, `month`, `year`, `created`, `created_by`, `code`) VALUES
(1, '1', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 1, 2025, '2025-05-29', 'Ayomide Akerele', '965250120'),
(2, '2', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 1, 2025, '2025-05-29', 'Ayomide Akerele', '1375805089'),
(3, '3', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 1, 2025, '2025-05-29', 'Ayomide Akerele', '2087344727'),
(4, '5', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 1, 2025, '2025-05-29', 'Ayomide Akerele', '1671195618'),
(5, '6', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 1, 2025, '2025-05-29', 'Ayomide Akerele', '1206152069'),
(6, '7', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 1, 2025, '2025-05-29', 'Ayomide Akerele', '880511323'),
(7, '1', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 2, 2025, '2025-05-29', 'Ayomide Akerele', '1050821884'),
(8, '2', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 2, 2025, '2025-05-29', 'Ayomide Akerele', '1773030521'),
(9, '3', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 2, 2025, '2025-05-29', 'Ayomide Akerele', '66994468'),
(10, '5', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 2, 2025, '2025-05-29', 'Ayomide Akerele', '2135060252'),
(11, '6', 'GRADE B1', 150000, 16000, 166000, 1000, 11760, 7000, 19760, 146240, 2, 2025, '2025-05-29', 'Ayomide Akerele', '836883456'),
(12, '7', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 2, 2025, '2025-05-29', 'Ayomide Akerele', '1439155346'),
(13, '1', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 3, 2025, '2025-05-29', 'Ayomide Akerele', '1240109319'),
(14, '2', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 3, 2025, '2025-05-29', 'Ayomide Akerele', '1380530140'),
(15, '3', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 3, 2025, '2025-05-29', 'Ayomide Akerele', '1789243347'),
(16, '5', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 3, 2025, '2025-05-29', 'Ayomide Akerele', '1273496897'),
(17, '6', 'GRADE B1', 150000, 16000, 166000, 1000, 11760, 7000, 19760, 146240, 3, 2025, '2025-05-29', 'Ayomide Akerele', '1893138290'),
(18, '7', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 3, 2025, '2025-05-29', 'Ayomide Akerele', '245909391'),
(19, '1', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 4, 2025, '2025-05-29', 'Ayomide Akerele', '240373017'),
(20, '2', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 4, 2025, '2025-05-29', 'Ayomide Akerele', '16871418'),
(21, '3', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 4, 2025, '2025-05-29', 'Ayomide Akerele', '1466779168'),
(22, '5', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 4, 2025, '2025-05-29', 'Ayomide Akerele', '1819191482'),
(23, '6', 'GRADE B1', 150000, 16000, 166000, 1000, 11760, 7000, 19760, 146240, 4, 2025, '2025-05-29', 'Ayomide Akerele', '359409517'),
(24, '7', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 4, 2025, '2025-05-29', 'Ayomide Akerele', '1167053211'),
(25, '1', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 5, 2025, '2025-05-29', 'Ayomide Akerele', '402423993'),
(26, '2', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 5, 2025, '2025-05-29', 'Ayomide Akerele', '389684830'),
(27, '3', 'GRADE A12', 200000, 22800, 222800, 0, 15680, 7000, 22680, 200120, 5, 2025, '2025-05-29', 'Ayomide Akerele', '141116766'),
(28, '5', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 5, 2025, '2025-05-29', 'Ayomide Akerele', '1192407657'),
(29, '6', 'GRADE B1', 150000, 16000, 166000, 10000, 11760, 7000, 28760, 137240, 5, 2025, '2025-05-29', 'Ayomide Akerele', '1661804840'),
(30, '7', 'GRADE B1', 150000, 16000, 166000, 0, 11760, 7000, 18760, 147240, 5, 2025, '2025-05-29', 'Ayomide Akerele', '1704092748');

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
  `report` text DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `note` text DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_temp`
--

INSERT INTO `salary_temp` (`id`, `salary_grade`, `salary`, `tax_id`, `created`, `code`) VALUES
(1, 'GRADE A12', 200000.00, 1, '2025-05-29', '13130'),
(2, 'GRADE B1', 150000.00, 1, '2025-05-29', '00331');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax_name` varchar(255) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `status` int(11) DEFAULT 0,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `email`, `role`, `phone`, `profile_code`, `status`, `password`, `image`, `created`) VALUES
(1, 'Ayomide', 'Akerele', 'Male', 'admin@admin.com', 'Admin', '08152397199', 1854059906, 0, '$2y$10$BUTPocFSN2FLsMdVpdN7tecIIrGhWdnKih7B2LXqmTBm4mLRJPD5S', '625698526ac690.26239522.jpg', '2022-04-13'),
(2, 'Dapo', 'Johnson', 'Male', 'account@gmail.com', 'Admin', '09032144323', 1134242891, 0, '$2y$10$YZsnKsulBNXqPda.EnrMwubk94RcguDCBuqxFf4ccgAEvQBGd3CZS', '62572140ab8c35.82296047.jpg', '2022-04-13'),
(3, 'Joel', 'Austin', 'Male', 'joel@email.com', 'Employee', '09012344556', 2033375927, 0, '$2y$10$N4/7NVY4d6e.uDZ3XKgvF.avfWqRSNkCER/MrLRpVr8/i2uuTj/a.', '6257d201170453.24529633.jpg', '2022-04-14'),
(4, 'Adenuga', 'Emmanuel', 'Male', 'adenugaemma1@gmail.com', 'Employee', '09090344667', 352388989, 0, '$2y$10$1N9XUBglffGiclL.7LOpve1M43UW1bIqR1AxOPQ6bObG6u/SdKhoa', '6262ba35b9f786.06971785.jpg', NULL),
(5, 'Ngozi', 'Emmanuel', 'Female', 'ngoziemmanuel2@gmail.com', 'Employee', '09090344667', 1842924452, 0, '$2y$10$/fu2ZcTHklCkFBGWghOidO/LXmmpUi/tJ3ftMyv3GmBxnZ.KS.PJO', '6262fb99352262.72505952.jpg', NULL),
(7, 'Ngozi', 'paul O.', NULL, 'idahjohnpaul@gmail.com', 'company', '09090344667', 384185912, 0, '$2y$10$wRs3ka5.qnu3OJG05C0HvuOkpb6mj3nx5/TERHJ/d/MV.BIZO7JRO', '6266ddd4747e46.73754816.jpg', '2022-04-25'),
(8, 'Adenuga', 'paul O.', NULL, 'ark@g.co', 'company', '09090344667', 342893944, 0, '$2y$10$Oog/NCQRs0WY04gndrcYv.GZjlihk3uMDW1c/KEttAjrxlP8PKgo2', '6266e4a2efff64.31250655.jpg', '2022-04-25'),
(11, 'Mide', 'Ayo', 'Male', 'user@user.com', 'Employee', '08105455712', 1506481920, 0, '$2y$10$kYiRpRU1XvQpXzemsxNg5OLLVX8QDBgBckoOUUzYN6gHYRgMt4mrG', '682df0b2b445e2.75164470.jpeg', '2025-05-28'),
(12, 'Sunday', 'Paul', 'Male', 'sunday@gmail.com', 'Employee', '09090766543', 808068791, 0, '$2y$10$jlG1abPfKeAukmj.dQ9XTunp4.XcbZnykdb3K.AdYocMgKqXBHgTm', '68371c55a69263.06897028.png', '2025-05-28'),
(13, 'Jayson', 'Paul', NULL, 'vigor@expert.com', 'company', '09090766678', 1855145202, 0, '$2y$10$suEjrzhcFYj0hJsJZ/AYkuoHwRRMnIg532oCjx..SeM3Np84LZ/Ei', '683875e0231eb1.68111701.png', '2025-05-29'),
(14, 'Andrew', 'john', NULL, 'jaytech1@gmail.com', 'company', '09090766456', 1679107283, 0, '$2y$10$41o5AAPXrYjpmNt4ods0HORkG4tJjCKq9gf56Nbh7o5sfnU6ImKOq', '683878555c0a03.65626184.png', '2025-05-29');

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
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
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
-- Indexes for table `leave_app`
--
ALTER TABLE `leave_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_payment`
--
ALTER TABLE `loan_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `company_assign`
--
ALTER TABLE `company_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `group_tbl`
--
ALTER TABLE `group_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leave_app`
--
ALTER TABLE `leave_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_payment`
--
ALTER TABLE `loan_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_activity`
--
ALTER TABLE `payment_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `salary_temp`
--
ALTER TABLE `salary_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
