-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2025 at 03:20 AM
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
-- Database: `ehealthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPhone` varchar(15) DEFAULT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `joinDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `designation`, `adminEmail`, `adminPhone`, `adminPassword`, `joinDate`) VALUES
(7, 'Kazi Nihal Uddin', 'admin', 'nihal@gmail.com', '01849578004', 'nihal', '2025-05-12'),
(8, 'MD Monirul Islam', 'admin', 'monirul@gmail.com', '01913740226', 'monirul', '2025-05-14'),
(9, 'AL Shahriar', 'admin', 'shahriar@gmail.com', '01725184444', 'sahriar', '2025-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `link` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `serial`, `p_name`, `d_name`, `date`, `time`, `link`) VALUES
(2, 1, 'Akib Rahman', ' Dr. A P M Sohrabuzzaman', '17-05-2025', '10:00 AM', 'https://meet.google.com/fake-link-001'),
(3, 2, 'Akib Rahman', ' Dr. A P M Sohrabuzzaman', '17-05-2025', '10:20 AM', 'https://meet.google.com/fake-link-002'),
(4, 3, 'Kazi Nihal Uddin', 'Dr. Mahbubor Rahman', '17-05-2025', '10:40 AM', 'https://meet.google.com/fake-link-003'),
(5, 4, 'Kazi Nihal Uddin', 'Professor. Dr. Bimal Chandra Shil', '17-05-2025', '11:00 AM', 'https://meet.google.com/abc-defg-him');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `dID` int(11) NOT NULL,
  `dName` varchar(100) NOT NULL,
  `dEmail` varchar(100) NOT NULL,
  `dPassword` varchar(255) NOT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `hospital` varchar(255) DEFAULT NULL,
  `dImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`dID`, `dName`, `dEmail`, `dPassword`, `degree`, `specialization`, `designation`, `hospital`, `dImage`) VALUES
(2, 'Dr. Lutfor Rahman', 'lutfur@gmail.com', '$2y$10$ckR7kmbUR7v8ht3sCZdsyu42j6EWCCxuCB0VLCPjr.URBnW7Phhea', 'MBBS, MS (CTS)', 'Cardiologist', 'Chief Cardiac Surgeon', 'LABAID Cardiac Hospital', '1700976017.jpg'),
(3, ' Dr. A P M Sohrabuzzaman', 'apm@gmail.com', 'apm', 'MD, FCPS', 'Cardiologist', 'Senior Consultant Cardiologist', 'LABAID Cardiac Hospital', '1700978846.jpg'),
(4, ' Professor Dr. M. Amjad Hossain', 'amjad@gmail.com', 'amjad', 'MS (Ortho), AO Fellow (Germany) ', 'Orthopedic', 'Chief Consultant & Head, Department of Orthopedic Surgery ', 'LABAID Specialized Hospital  ', '1700981398.jpg'),
(5, 'Dr. Mahbubor Rahman', 'mahbubor@gmail.com', 'mahbubor', 'MBBS (Dhaka), MCPS (Medicine), MD (Cardiology),', 'Cardiologist', 'Senior Consultant Cardiologist & Medicine Specialist', 'LABAID Cardiac Hospital ', '1700978701.jpg'),
(6, 'Dr. Foara Tasmim', 'foara@gmail.com', 'foara', 'MBBS (DMC),MS ', 'Burn & Plastic Surgery', 'Associate Professor of Plastic Surgery ', 'Dhaka Medical College & Hospital ', '1584266085.jpg'),
(7, 'Dr. Maruf Alam Chowdhury', 'maruf@gmail.com', 'maruf', 'FCPS (Surgery), FCPS (Plastic & Reconstructive Surgery) ', 'Burn & Plastic Surgery ', 'Associate Professor (Plastic Surgery) ', 'Labaid Specialized Hospital ', '1613626713.jpg'),
(8, 'Professor Dr. Mir Nazrul Islam', 'nazrul@gmail.com', 'nazrul', 'MBBS, DDS, M.Sc. ', 'Dermatology', 'Professor, Skin & STD\'S  ', 'BIRDEM & Ibrahim Medical College ', '1613039892.jpg'),
(9, 'Dr. Md. Quamrul Hassan Chowdhury', 'hassan@gmail.com', 'hassan', 'MBBS, DCD, MSc (Clinical Dermatology) ', 'Dermatology', 'Dermatologist, Laser & Hair Transplant Surgeon', 'LABAID Specialized Hospital', '1613045928.jpg'),
(10, 'Dr. Isabela Kabir', 'isabela@gmail.com', 'isabela', 'MBBS, MCPS, FCPS ', 'Dermatology', 'Consultant, Dermatology & Venereology Dept', 'LABAID Cardiac Hospital  ', '1611551203.jpg'),
(11, 'Professor (Dr.) Mian Mashhud Ahmad', 'mian@gmail.com', 'mian', 'MBBS, MD, Ph D, FRCP (Edin)', 'Gastroenterology', 'Specialist in Gastrointestinal & Liver Diseases', 'LABAID Specialized Hospital', '1700983279.jpg'),
(12, 'Professor. Dr. Bimal Chandra Shil', 'bimal@gmail.com', 'bimal', 'MBBS, FCPS (Medicine)', 'Gastroenterology', 'Ex. Professor & Head, Dept. of Gastroenterology', 'Sir Salimullah Medical College & Mitford Hospital', '1610525117.jpg'),
(13, 'Professor Dr. Md. Ashraful Islam', 'ashraful@gmail.com', 'ashraful', 'MBBS, FCPS (Medicine), MD (Gastroenterology)', 'Gastroenterology', 'Professor & Head, Dept. of Gastroenterology (Ex)', 'Dhaka Medical College & Hospital', '1700983373.jpg'),
(14, 'Professor Dr. M A Khan', 'khan@gmail.com', 'khan', 'FCPS (Hematology), FRCP (Edin) ', 'Hematology', 'Former Head & Founder', 'Dhaka Medical College & Hospital', '1700984798.jpg'),
(15, 'Dr. Tanzia Khanum Tompa', 'tanzia@gmail.com', 'tanzia', 'MBBS (DU), MD (Hematology) ', 'Hematology', 'Ex. Register, Hematology and Blood Cancer Department', 'Delta Medical College Hospital ', '1610864098.jpg'),
(16, ' Professor Dr. Md. Sirajul Islam', 'sirajul@gmail.com', 'sirajul', 'MBBS, MCPS (Medicine), FCPS (Medicine) ', 'Hematology', 'Professor & Head, Dept. of Hematology  ', 'Sir Salimullah Medical College &Mitford Hospital ', '1700984700.jpg'),
(17, 'Asst. Prof. Dr. Md. Nazmul Huda', 'huda@gmail.com', 'huda', 'MBBS (DMC), BCS (Health), FCPS (Surgery), MS (Orthopedic Surgery, NITOR)', 'Orthopedic', 'Assistant Professor, Department of Orthopedic Surgery', 'Shaheed Suhrawardy Medical College & Hospital', 'Dr.-Md.-Nazmul-Huda.jpg'),
(18, 'Dr. K M Shorfuddin Ashik', 'shorif@gmail.com', 'shorif', 'MBBS, BCS (Health), MS (Orthopedic Surgery)', 'Orthopedic', 'Junior Consultant (Orthopedic Surgery)', 'National Institute of Traumatology & Orthopedic Rehabilitation', 'Dr.-K-M-Shorfuddin-Ashik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pName` varchar(255) NOT NULL,
  `pEmail` varchar(255) NOT NULL,
  `pNumber` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `address` text NOT NULL,
  `pPassword` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `medicalHistory` text DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `pID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pName`, `pEmail`, `pNumber`, `date`, `gender`, `address`, `pPassword`, `created_at`, `medicalHistory`, `department`, `pID`) VALUES
('Md. Monirul Islam', '221002154@student.green.edu.bd', '01742958888', '2001-04-26', 'male', 'Mirpur 11, Dhaka', '221', '2024-12-23 09:09:15', 'Allergies', 'General Health', 4),
('Akib Rahman', 'akib@gmail.com', '01742958888', '2009-01-09', 'male', 'Bera,Pabna', '221', '2024-12-23 09:13:36', 'Other', 'General Health', 5),
('Takib Rahman', 'takib@gmail.com', '01742957777', '2013-02-20', 'male', 'Bera,Pabna', '221', '2024-12-23 09:17:03', 'Other', 'General Health', 6),
('Abir Rahman', 'abir@gmail.com', '01304126599', '2005-10-23', 'male', 'Shewrapara, Mirpur', '1234', '2024-12-23 16:31:09', 'Allergies', 'General Health', 7),
('Alice', 'alice@gmail.com', '01369874512', '2013-03-26', 'male', 'Savar,Dhaka', '1111', '2024-12-23 17:11:03', 'Hypertension', 'Skin Conditions', 8),
('Tamanna Rahman', 'tamanna@gmail.com', '01387459635', '2002-04-24', 'female', 'Savar,Dhaka', '1234', '2024-12-23 19:02:42', 'Hypertension', 'Bone & Joint Issues', 9),
('Rahim Uddin', 'rahim.uddin@example.com', '1234567890', '1990-05-15', 'male', 'Pallabi, Dhaka, Bangladesh', 'password123', '2024-12-23 20:58:29', 'None', 'Cardiology', 10),
('Karim Khan', 'karim.khan@example.com', '1234567891', '1985-07-10', 'male', 'Mirpur, Dhaka, Bangladesh', 'password123', '2024-12-23 20:58:29', 'Diabetes', 'Orthopedics', 11),
('Sajid Hossain', 'sajid.hossain@example.com', '1234567893', '1988-01-05', 'male', 'Gulshan, Dhaka, Bangladesh', 'password123', '2024-12-23 20:58:29', 'None', 'Neurology', 13),
('Nusrat Jahan', 'nusrat.jahan@example.com', '1234567894', '1995-03-25', 'female', 'Banani, Dhaka, Bangladesh', 'password123', '2024-12-23 20:58:29', 'None', 'Dermatology', 14),
('Imran Ali', 'imran.ali@example.com', '1234567895', '1992-12-30', 'male', 'Uttara, Dhaka, Bangladesh', 'password123', '2024-12-23 20:58:29', 'None', 'Cardiology', 15),
('Tariq Rahman', 'tariq.rahman@example.com', '1234567897', '1991-09-18', 'male', 'Mohammadpur, Dhaka, Bangladesh', 'password123', '2024-12-23 20:58:29', 'None', 'Oncology', 17),
('Mahiya Sultana', 'mahiya.sultana@example.com', '1234567898', '1994-04-22', 'female', 'Rampura, Dhaka, Bangladesh', 'password123', '2024-12-23 20:58:29', 'None', 'Pediatrics', 18),
('Md. Mahbubur Rahman', 'mahbubur@cse.green.edu.bd', '01325698745', '2006-02-02', 'male', 'Mirpur', '1234', '2024-12-24 13:33:44', 'Other', 'General Health', 20),
('nihal', 'nihal@gmail.com', '018', '2025-06-06', 'male', '', '123456', '2025-05-06 20:04:02', 'Hypertension', 'General Health', 21),
('kazi', 'a@gmail.com', '1', '2025-06-06', 'male', 'aa', '123', '2025-05-07 15:34:23', 'Hypertension', 'Bone & Joint Issues', 22),
('Kazi Nihal Uddin', '221002174@student.green.edu.bd', '01849578004', '2025-06-05', 'male', '', 'nihal', '2025-05-09 22:57:56', 'Hypertension', 'Brain & Nerve Issues', 23);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ac_num` int(100) NOT NULL,
  `pin` int(100) NOT NULL,
  `ammount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ac_num`, `pin`, `ammount`) VALUES
(221002152, 152, 1000000),
(221002154, 154, 500000),
(221002174, 174, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `time`, `link`) VALUES
(1, '17-05-2025', '10:00 AM', 'https://meet.google.com/abc-defg-hij'),
(2, '17-05-2025', '10:20 AM', 'https://meet.google.com/abc-defg-hik'),
(3, '17-05-2025', '10:40 AM', 'https://meet.google.com/abc-defg-hil'),
(4, '17-05-2025', '11:00 AM', 'https://meet.google.com/abc-defg-him'),
(5, '17-05-2025', '11:20 AM', 'https://meet.google.com/abc-defg-hin'),
(6, '17-05-2025', '11:40 AM', 'https://meet.google.com/abc-defg-hio'),
(7, '17-05-2025', '12:00 PM', 'https://meet.google.com/abc-defg-hip'),
(8, '17-05-2025', '12:20 PM', 'https://meet.google.com/abc-defg-hiq'),
(9, '17-05-2025', '12:40 PM', 'https://meet.google.com/abc-defg-hir'),
(10, '17-05-2025', '01:00 PM', 'https://meet.google.com/abc-defg-his'),
(11, '17-05-2025', '01:20 PM', 'https://meet.google.com/abc-defg-hit'),
(12, '17-05-2025', '01:40 PM', 'https://meet.google.com/abc-defg-hiu'),
(13, '17-05-2025', '02:00 PM', 'https://meet.google.com/abc-defg-hiv'),
(14, '17-05-2025', '02:20 PM', 'https://meet.google.com/abc-defg-hiw'),
(15, '17-05-2025', '02:40 PM', 'https://meet.google.com/abc-defg-hix'),
(16, '17-05-2025', '03:00 PM', 'https://meet.google.com/abc-defg-hiy'),
(17, '17-05-2025', '03:20 PM', 'https://meet.google.com/abc-defg-hiz'),
(18, '17-05-2025', '03:40 PM', 'https://meet.google.com/abc-defg-hja'),
(19, '17-05-2025', '04:00 PM', 'https://meet.google.com/abc-defg-hjb'),
(20, '17-05-2025', '04:20 PM', 'https://meet.google.com/abc-defg-hjc'),
(21, '17-05-2025', '04:40 PM', 'https://meet.google.com/abc-defg-hjd'),
(22, '17-05-2025', '05:00 PM', 'https://meet.google.com/abc-defg-hje'),
(23, '17-05-2025', '05:20 PM', 'https://meet.google.com/abc-defg-hjf'),
(24, '17-05-2025', '05:40 PM', 'https://meet.google.com/abc-defg-hjg'),
(25, '17-05-2025', '06:00 PM', 'https://meet.google.com/abc-defg-hjh'),
(26, '17-05-2025', '06:20 PM', 'https://meet.google.com/abc-defg-hji'),
(27, '17-05-2025', '06:40 PM', 'https://meet.google.com/abc-defg-hjj'),
(28, '17-05-2025', '07:00 PM', 'https://meet.google.com/abc-defg-hjk'),
(29, '17-05-2025', '07:20 PM', 'https://meet.google.com/abc-defg-hjl'),
(30, '17-05-2025', '07:40 PM', 'https://meet.google.com/abc-defg-hjm'),
(31, '17-05-2025', '08:00 PM', 'https://meet.google.com/abc-defg-hjn'),
(32, '17-05-2025', '08:20 PM', 'https://meet.google.com/abc-defg-hjo'),
(33, '17-05-2025', '08:40 PM', 'https://meet.google.com/abc-defg-hjp'),
(34, '17-05-2025', '09:00 PM', 'https://meet.google.com/abc-defg-hjq'),
(35, '17-05-2025', '09:20 PM', 'https://meet.google.com/abc-defg-hjr'),
(36, '17-05-2025', '09:40 PM', 'https://meet.google.com/abc-defg-hjs'),
(37, '17-05-2025', '10:00 PM', 'https://meet.google.com/abc-defg-hjt'),
(38, '18-05-2025', '10:00 AM', 'https://meet.google.com/abc-defg-hju'),
(39, '18-05-2025', '10:20 AM', 'https://meet.google.com/abc-defg-hjv'),
(40, '18-05-2025', '10:40 AM', 'https://meet.google.com/abc-defg-hjw'),
(41, '18-05-2025', '11:00 AM', 'https://meet.google.com/abc-defg-hjx'),
(42, '18-05-2025', '11:20 AM', 'https://meet.google.com/abc-defg-hjy'),
(43, '18-05-2025', '11:40 AM', 'https://meet.google.com/abc-defg-hjz'),
(44, '18-05-2025', '12:00 PM', 'https://meet.google.com/abc-defg-hka'),
(45, '18-05-2025', '12:20 PM', 'https://meet.google.com/abc-defg-hkb'),
(46, '18-05-2025', '12:40 PM', 'https://meet.google.com/abc-defg-hkc'),
(47, '18-05-2025', '01:00 PM', 'https://meet.google.com/abc-defg-hkd'),
(48, '18-05-2025', '01:20 PM', 'https://meet.google.com/abc-defg-hke'),
(49, '18-05-2025', '01:40 PM', 'https://meet.google.com/abc-defg-hkf'),
(50, '18-05-2025', '02:00 PM', 'https://meet.google.com/abc-defg-hkg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `adminEmail` (`adminEmail`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`dID`),
  ADD UNIQUE KEY `dEmail` (`dEmail`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pID`),
  ADD UNIQUE KEY `pEmail` (`pEmail`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ac_num`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `dID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ac_num` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221002175;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
