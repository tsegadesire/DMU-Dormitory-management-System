-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 08:41 PM
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
-- Database: `dmudorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `UserName` varchar(10) NOT NULL,
  `U_Type` varchar(20) NOT NULL,
  `Photo` varchar(36) NOT NULL,
  `password` varchar(40) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `OfficeBlockId` int(2) NOT NULL,
  `OfficeRoomNo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`UserName`, `U_Type`, `Photo`, `password`, `Status`, `OfficeBlockId`, `OfficeRoomNo`) VALUES
('Emp1', 'Maintainer', 'dmudms/Admin/uploads/ph.jpg', 'emp11', 'Active', 6, 1),
('Emp33', 'Proctor', 'uploads/image-slider-4.JPG', 'emp33', 'Active', 2, 1),
('Haile', 'Admin', 'uploads/ph.jpg', 'haile', 'Active', 2, 1),
('Yordanos', 'ProctorManager', 'uploads/people.png', 'yordanos', 'Active', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `BlockId` int(2) NOT NULL,
  `BlockName` varchar(10) NOT NULL,
  `Capacity` smallint(2) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `ReservedFor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`BlockId`, `BlockName`, `Capacity`, `Status`, `ReservedFor`) VALUES
(1, 'B', 2, 'Active', 'Male'),
(2, 'B', 2, 'Active', 'Female'),
(3, 'C', 75, 'Active', 'Male'),
(4, 'A', 45, 'Active', 'male'),
(6, 'A', 34, 'Active', 'Male'),
(11, 'B', 2, 'Active', 'Male'),
(12, 'B', 2, 'Active', 'Male'),
(13, 'D', 34, 'Active', 'Female'),
(14, 'D', 23, 'Active', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `maintain`
--

CREATE TABLE `maintain` (
  `PostId` int(11) NOT NULL,
  `StudId` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `BlockId` int(2) NOT NULL,
  `RoomId` int(2) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `PostInfo` varchar(300) NOT NULL,
  `State` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintain`
--

INSERT INTO `maintain` (`PostId`, `StudId`, `Date`, `BlockId`, `RoomId`, `Status`, `PostInfo`, `State`) VALUES
(9, 'DMU141', '2023-07-06', 13, 12, 'inacive', 'Key is Broken', ''),
(10, 'DMU141', '2023-07-07', 13, 12, 'inacive', 'Electricity', '');

-- --------------------------------------------------------

--
-- Table structure for table `proctor`
--

CREATE TABLE `proctor` (
  `Year` int(4) NOT NULL,
  `Block_Id` int(2) NOT NULL,
  `ProId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proctor`
--

INSERT INTO `proctor` (`Year`, `Block_Id`, `ProId`) VALUES
(0, 1, 'Yordanos'),
(0, 2, 'Yordanos'),
(2015, 4, 'Biruk'),
(2015, 4, 'Emp1'),
(2015, 13, 'Emp33');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `reqID` int(11) NOT NULL,
  `Studid` varchar(10) NOT NULL,
  `reqDate` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Properties` varchar(300) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`reqID`, `Studid`, `reqDate`, `Status`, `Properties`, `Color`, `Number`) VALUES
(11, 'DMU12', '2023-07-11', 'inacive', 'Suri,Tshirt,Shemiz', 'Red,White,Blue,Black', '2,21,3');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomId` int(2) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `BlockNum` int(2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomId`, `Capacity`, `BlockNum`, `status`) VALUES
(1, 11, 1, 'Active'),
(2, 2, 2, 'Active'),
(3, 3, 14, 'Active'),
(4, 1, 1, 'Active'),
(5, 2, 2, 'Active'),
(6, 3, 11, 'Active'),
(12, 12, 13, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `EmpId` varchar(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(30) NOT NULL,
  `Sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`EmpId`, `first_name`, `middleName`, `last_name`, `Email`, `phone`, `address`, `Sex`) VALUES
('Biruk', 'Biruk', 'Abebe', 'Kebede', 'birukabebe3224@gmail.com', 978465312, 'Ethiopia', 'Male'),
('Dinka', 'Dinka', 'Fayissa', 'Geremew', 'Dinka@gmail.com', 934657825, 'D/Markos', 'Male'),
('Emp1', 'Dinka', 'Tsegaye', 'COA', 'Dinka@gmail.com', 989765423, 'E/Gojam', 'Male'),
('Emp33', 'Employee', 'Emp', 'Employe', 'employe@gmail.com', 989765423, 'D/Markos', 'Male'),
('Haile', 'Hailemariam', 'Eyayu', 'Beyene', 'azeblove2932@gmail.com', 903137664, 'Ethiopia', 'Female'),
('Meklit', 'Meklit', 'Sintayehu', 'Hailu', 'meklitsintayehu34@gmail.com', 967853421, 'Ethiopia', 'Male'),
('Yordanos', 'Yordanos', 'Alemu', 'Sisay', 'yordanosalemu23@gmail.com', 967852432, 'Ethiopia', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudId` varchar(10) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `MName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `Phone` int(12) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Photo` varchar(90) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `EmergencyNo` int(13) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudId`, `FName`, `MName`, `LName`, `Phone`, `Email`, `Photo`, `Country`, `Status`, `EmergencyNo`, `Sex`, `password`) VALUES
('ABERE', 'BISRAT', 'CHALE', 'DERBEW', 909009034, 'getneta24@gmail.com', 'uploads/ph.jpg', 'Ethiopian', 'Active', 909988976, 'Male', 'DERBEWABCD1234$#'),
('DMU12', 'Hailemariam', 'Beyene', 'Eyayu', 903137664, 'ha2012@gmail.com', 'uploads/image-slider-2.JPG', 'Ethiopia', 'Active', 2147483647, 'Male', 'EyayuADCD1234'),
('DMU1232', 'Kebede', 'Alemneh', 'Getie', 989765423, 'kebede@gmail.com', 'uploads/image-slider-2.JPG', 'Ethiopian', 'Active', 2147483647, 'Male', 'GetieABCD1234'),
('DMU13', 'Dinka', 'Fayissa', 'One', 956873421, 'amit@gmai.ciif', 'uploads/image-slider-2.JPG', 'ETH', 'Active', 967853421, 'Male', 'dmudms'),
('DMU1303808', 'HME', 'Eyayu', 'Beyene', 903137664, 'eyayu2012@gmail.com', 'uploads/image-slider-2.JPG', 'Ethiopian', 'Active', 938169557, 'Male', 'dmudmss'),
('DMU1303809', 'HME', 'Eyayu', 'Beyene', 903137664, 'haile@gmail.com', 'uploads/image-slider-2.JPG', 'Ethiopian', 'Active', 938169557, 'Male', 'HME'),
('DMU132', 'Alemken', 'baye', 'haylu', 978565432, 'alemke@gmail.com', 'uploads/ph.jpg', 'sud', 'Active', 99, 'Male', 'hayluABCD$#'),
('DMU141', 'Alemnesh', 'Kassa', 'mamar', 945653422, 'alem@gmail.com', 'uploads/ph.jpg', 'ETH', 'Active', 990, 'Female', 'mamarABCD$#'),
('DMU2345', 'Alem', 'Tsegaye', 'Alamrew', 934657823, 'getn123@gmail.com', 'uploads/ph.jpg', 'USA', 'Active', 978653421, 'Female', 'dmr'),
('DMU3212', 'Alemnesh', 'Kassa', 'mamar', 945653422, 'alem@gmail.com', 'uploads/ph.jpg', 'ETH', 'Active', 990, 'Female', 'mamarABCD$#'),
('DMU3222', 'Alemken', 'baye', 'haylu', 978565432, 'alemke@gmail.com', 'uploads/ph.jpg', 'sud', 'Active', 99, 'Male', 'hayluABCD$#'),
('DMU342', 'Asamr', 'wedm', 'smu', 909090909, 'asamir@gmail.com', 'uploads/ph.jpg', 'Eartrean', 'Active', 909, 'Male', 'smuABCD$#'),
('DMU3422', 'Asamr', 'wedm', 'smu', 909090909, 'asamir@gmail.com', 'uploads/ph.jpg', 'Eartrean', 'Active', 909, 'Male', 'smuABCD$#'),
('DMU435', 'Alemnesh', 'lemma', 'dinku', 978756432, 'alemnesh@gmail.com', 'uploads/image-slider-3.JPG', 'diji', 'Active', 990, 'Female', 'dinkuABCD$#'),
('DMU4352', 'Alemnesh', 'lemma', 'dinku', 978756432, 'alemnesh@gmail.com', 'uploads/image-slider-3.JPG', 'diji', 'Active', 990, 'Female', 'dinkyABCD$#'),
('Meklit', 'Meklit', 'Sintayehu', 'Alamrew', 934657825, 'meklitSint@gmail.com', 'uploads/image-slider-3.JPG', 'Ethiopian', 'Active', 978653421, 'Female', 'AlamrewABCD1234$#'),
('Stud21', 'Student', 'Sud', 'Learner', 903137664, 'alehegn@gmail.djfg', 'uploads/DSC01751.JPG', 'Ethiopian', 'Active', 978653421, 'Male', 'LearnABCD1234#'),
('Stud23', 'Alem', 'Tsegaye', 'Alamrew', 934657823, 'getneta24@gmail.com', 'uploads/image-slider-2.JPG', 'Ethiopia', 'Active', 978653421, 'Male', 'AlamrewABCD1234$#');

-- --------------------------------------------------------

--
-- Table structure for table `studplacement`
--

CREATE TABLE `studplacement` (
  `AssignmentId` int(11) NOT NULL,
  `Stud_Id` varchar(10) NOT NULL,
  `BlockId` int(11) NOT NULL,
  `RoomNo` int(11) NOT NULL,
  `AcadamicYear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studplacement`
--

INSERT INTO `studplacement` (`AssignmentId`, `Stud_Id`, `BlockId`, `RoomNo`, `AcadamicYear`) VALUES
(1, 'DMU1303808', 1, 1, '2015'),
(31, 'DMU141', 13, 12, '2015'),
(33, 'DMU3212', 13, 12, '2015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`UserName`),
  ADD KEY `accounts_ibfk_2` (`OfficeRoomNo`),
  ADD KEY `OfficeBlockId` (`OfficeBlockId`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`BlockId`);

--
-- Indexes for table `maintain`
--
ALTER TABLE `maintain`
  ADD PRIMARY KEY (`PostId`),
  ADD KEY `BlockId` (`BlockId`),
  ADD KEY `RoomId` (`RoomId`),
  ADD KEY `StudId` (`StudId`);

--
-- Indexes for table `proctor`
--
ALTER TABLE `proctor`
  ADD PRIMARY KEY (`Block_Id`,`ProId`),
  ADD KEY `ProId` (`ProId`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`reqID`),
  ADD KEY `property_ibfk_1` (`Studid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomId`),
  ADD KEY `room_ibfk_1` (`BlockNum`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`EmpId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudId`);

--
-- Indexes for table `studplacement`
--
ALTER TABLE `studplacement`
  ADD PRIMARY KEY (`AssignmentId`),
  ADD UNIQUE KEY `StudId` (`Stud_Id`),
  ADD KEY `BlockId` (`BlockId`),
  ADD KEY `RoomNo` (`RoomNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `BlockId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `maintain`
--
ALTER TABLE `maintain`
  MODIFY `PostId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `reqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `studplacement`
--
ALTER TABLE `studplacement`
  MODIFY `AssignmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`OfficeRoomNo`) REFERENCES `room` (`RoomId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`OfficeBlockId`) REFERENCES `block` (`BlockId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_ibfk_4` FOREIGN KEY (`UserName`) REFERENCES `staff` (`EmpId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintain`
--
ALTER TABLE `maintain`
  ADD CONSTRAINT `maintain_ibfk_1` FOREIGN KEY (`BlockId`) REFERENCES `block` (`BlockId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintain_ibfk_2` FOREIGN KEY (`RoomId`) REFERENCES `room` (`RoomId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintain_ibfk_3` FOREIGN KEY (`StudId`) REFERENCES `student` (`StudId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proctor`
--
ALTER TABLE `proctor`
  ADD CONSTRAINT `proctor_ibfk_1` FOREIGN KEY (`Block_Id`) REFERENCES `block` (`BlockId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proctor_ibfk_2` FOREIGN KEY (`ProId`) REFERENCES `staff` (`EmpId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`Studid`) REFERENCES `student` (`StudId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`BlockNum`) REFERENCES `block` (`BlockId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studplacement`
--
ALTER TABLE `studplacement`
  ADD CONSTRAINT `studplacement_ibfk_1` FOREIGN KEY (`Stud_Id`) REFERENCES `student` (`StudId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studplacement_ibfk_2` FOREIGN KEY (`BlockId`) REFERENCES `block` (`BlockId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studplacement_ibfk_3` FOREIGN KEY (`RoomNo`) REFERENCES `room` (`RoomId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
