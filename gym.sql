-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 12:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities`
--

CREATE TABLE `tbl_amenities` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`id`, `heading`, `img`, `description`) VALUES
(9, 'Yoga Classes', '1654517788_dce94b851183b5f75301.jpg', 'What is the importance of yoga?\r\nYoga\'s incorporation of meditation and breathing can help improve a person\'s mental well-being. “Regular yoga practice creates mental clarity and calmness; increases body awareness; relieves chronic stress patterns; relaxes the mind; centers attention; and sharpens concentration,” says Dr.'),
(10, 'Functional Area', '1654585842_cd1e9e8c6a733bc44faa.jpg', 'this area is one that exercisers can get themselves in a sweat about. But it\'s nothing new. Functional fitness is the body\'s natural way of moving - pushing, pulling, lifting, squatting and climbing. The sole purpose is the make your body stronger, flexier, more stable and agile.'),
(12, '24 Hour Open', '1657697561_894f10d7046e13ecad48.jpg', '24-hour gyms will be beneficial for members working out during peak hours. As the gym is open for 24 hours, member traffic will be spread out. So, it makes even peak hours less crowded. On the contrary, if a person wants to avoid peak hours, then he/she can do that also because the gym remains open all the time.'),
(13, 'Personal Trainer', '1657697608_150d7fef02957afaf510.jpg', 'A personal trainer will teach you everything you need to know about exercising. They will put together the perfect routine to help you achieve your goals, demonstrate the correct posture for each exercise');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` int(11) NOT NULL,
  `bloger_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `details` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `bloger_name`, `title`, `img`, `description`, `details`, `date`) VALUES
(7, 'Jitendra Pawar', 'Internation Yoga Day', '1655890755_62370b4ca1131e5b316c.png', 'Aside from dieting, exercising is one of the most common strategies employed by those trying to shed extra pounds. It burns calories, and this plays a key role in weight loss.\r\n\r\nIn addition to helping you lose weight, exercise has been linked to many other benefits, including improved mood, stronger bones, and a reduced risk of many chronic diseases', '1. Walking\r\n\r\nWalking is one of the best exercises for weight loss — and for good reason.\r\n\r\nIt’s convenient and an easy way for beginners to start exercising without feeling overwhelmed or needing to purchase equipment. Also, it’s a lower-impact exercise, meaning it doesn’t stress your joints.\r\n\r\nAccording to Harvard Health, it’s estimated that a 155-pound (70-kg) person burns around 167 calories per 30 minutes of walking at a moderate pace of 4 mph (6.4 km/h)\r\n\r\n2. Cycling\r\n\r\nCycling is a popular exercise that improves your fitness and can help you lose weight.\r\n\r\nAlthough cycling is traditionally done outdoors, many gyms and fitness centers have stationary bikes that allow you to cycle while staying indoors.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns around 260 calories per 30 minutes of cycling on a stationary bike at a moderate pace, or 298 calories per 30 minutes on a bicycle at a moderate pace of 12–13.9 mph (19–22.4 km/h)\r\n\r\n3 Swimming\r\n\r\nSwimming is a fun way to lose weight and get in shape.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns approximately 233 calories per half hour of swimming.\r\n\r\nHow you swim appears to affect how many calories you burn. Per 30 minutes, a 155-pound (70-kg) person burns 298 calories doing backstroke, 372 calories doing breaststroke, 409 calories doing butterfly, and 372 calories treading water\r\n\r\n4 Yoga\r\n\r\nYoga is a popular way to exercise and relieve stress.\r\n\r\nWhile it’s not commonly thought of as a weight loss exercise, it burns a fair amount of calories and offers many additional health benefits that can promote weight loss.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns around 149 calories per 30 minutes of practicing yoga ', '2022-06-21 10:00:00'),
(9, 'Sai pawar', 'Fitness Camp 2022', '1655890316_fcbda34d582679baf8aa.jpg', 'Aside from dieting, exercising is one of the most common strategies employed by those trying to shed extra pounds. It burns calories, and this plays a key role in weight loss.\r\n\r\nIn addition to helping you lose weight, exercise has been linked to many other benefits, including improved mood, stronger bones, and a reduced risk of many chronic diseases', '1. Walking\r\n\r\nWalking is one of the best exercises for weight loss — and for good reason.\r\n\r\nIt’s convenient and an easy way for beginners to start exercising without feeling overwhelmed or needing to purchase equipment. Also, it’s a lower-impact exercise, meaning it doesn’t stress your joints.\r\n\r\nAccording to Harvard Health, it’s estimated that a 155-pound (70-kg) person burns around 167 calories per 30 minutes of walking at a moderate pace of 4 mph (6.4 km/h)\r\n\r\n2. Cycling\r\n\r\nCycling is a popular exercise that improves your fitness and can help you lose weight.\r\n\r\nAlthough cycling is traditionally done outdoors, many gyms and fitness centers have stationary bikes that allow you to cycle while staying indoors.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns around 260 calories per 30 minutes of cycling on a stationary bike at a moderate pace, or 298 calories per 30 minutes on a bicycle at a moderate pace of 12–13.9 mph (19–22.4 km/h)\r\n\r\n3 Swimming\r\n\r\nSwimming is a fun way to lose weight and get in shape.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns approximately 233 calories per half hour of swimming.\r\n\r\nHow you swim appears to affect how many calories you burn. Per 30 minutes, a 155-pound (70-kg) person burns 298 calories doing backstroke, 372 calories doing breaststroke, 409 calories doing butterfly, and 372 calories treading water\r\n\r\n4 Yoga\r\n\r\nYoga is a popular way to exercise and relieve stress.\r\n\r\nWhile it’s not commonly thought of as a weight loss exercise, it burns a fair amount of calories and offers many additional health benefits that can promote weight loss.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns around 149 calories per 30 minutes of practicing yoga ', '2022-06-05 08:31:00'),
(10, 'Jitendra Pawar', 'Home Workout During Lockdown', '1655890333_25979fd6bf179cb882cd.jpg', 'Aside from dieting, exercising is one of the most common strategies employed by those trying to shed extra pounds. It burns calories, and this plays a key role in weight loss.\r\n\r\nIn addition to helping you lose weight, exercise has been linked to many other benefits, including improved mood, stronger bones, and a reduced risk of many chronic diseases', '1. Walking\r\n\r\nWalking is one of the best exercises for weight loss — and for good reason.\r\n\r\nIt’s convenient and an easy way for beginners to start exercising without feeling overwhelmed or needing to purchase equipment. Also, it’s a lower-impact exercise, meaning it doesn’t stress your joints.\r\n\r\nAccording to Harvard Health, it’s estimated that a 155-pound (70-kg) person burns around 167 calories per 30 minutes of walking at a moderate pace of 4 mph (6.4 km/h)\r\n\r\n2. Cycling\r\n\r\nCycling is a popular exercise that improves your fitness and can help you lose weight.\r\n\r\nAlthough cycling is traditionally done outdoors, many gyms and fitness centers have stationary bikes that allow you to cycle while staying indoors.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns around 260 calories per 30 minutes of cycling on a stationary bike at a moderate pace, or 298 calories per 30 minutes on a bicycle at a moderate pace of 12–13.9 mph (19–22.4 km/h)\r\n\r\n3 Swimming\r\n\r\nSwimming is a fun way to lose weight and get in shape.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns approximately 233 calories per half hour of swimming.\r\n\r\nHow you swim appears to affect how many calories you burn. Per 30 minutes, a 155-pound (70-kg) person burns 298 calories doing backstroke, 372 calories doing breaststroke, 409 calories doing butterfly, and 372 calories treading water\r\n\r\n4 Yoga\r\n\r\nYoga is a popular way to exercise and relieve stress.\r\n\r\nWhile it’s not commonly thought of as a weight loss exercise, it burns a fair amount of calories and offers many additional health benefits that can promote weight loss.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns around 149 calories per 30 minutes of practicing yoga ', '2020-01-01 12:30:00'),
(14, 'Sai pawar', 'Common Exercise Mistakes', '1657705666_694e05ce88ffcd20095b.jpeg', 'Aside from dieting, exercising is one of the most common strategies employed by those trying to shed extra pounds. It burns calories, and this plays a key role in weight loss.\r\n\r\nIn addition to helping you lose weight, exercise has been linked to many other benefits, including improved mood, stronger bones, and a reduced risk of many chronic diseases\r\n', '1. Walking\r\n\r\nWalking is one of the best exercises for weight loss — and for good reason.\r\n\r\nIt’s convenient and an easy way for beginners to start exercising without feeling overwhelmed or needing to purchase equipment. Also, it’s a lower-impact exercise, meaning it doesn’t stress your joints.\r\n\r\nAccording to Harvard Health, it’s estimated that a 155-pound (70-kg) person burns around 167 calories per 30 minutes of walking at a moderate pace of 4 mph (6.4 km/h)\r\n\r\n2. Cycling\r\n\r\nCycling is a popular exercise that improves your fitness and can help you lose weight.\r\n\r\nAlthough cycling is traditionally done outdoors, many gyms and fitness centers have stationary bikes that allow you to cycle while staying indoors.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns around 260 calories per 30 minutes of cycling on a stationary bike at a moderate pace, or 298 calories per 30 minutes on a bicycle at a moderate pace of 12–13.9 mph (19–22.4 km/h)\r\n\r\n3 Swimming\r\n\r\nSwimming is a fun way to lose weight and get in shape.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns approximately 233 calories per half hour of swimming.\r\n\r\nHow you swim appears to affect how many calories you burn. Per 30 minutes, a 155-pound (70-kg) person burns 298 calories doing backstroke, 372 calories doing breaststroke, 409 calories doing butterfly, and 372 calories treading water\r\n\r\n4 Yoga\r\n\r\nYoga is a popular way to exercise and relieve stress.\r\n\r\nWhile it’s not commonly thought of as a weight loss exercise, it burns a fair amount of calories and offers many additional health benefits that can promote weight loss.\r\n\r\nHarvard Health estimates that a 155-pound (70-kg) person burns around 149 calories per 30 minutes of practicing yoga ', '2022-07-19 08:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `admin_replay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fullname`, `email`, `subject`, `message`, `admin_replay`) VALUES
(5, 'Jitendra Pawar', 'jit.p5696@gmail.com', 'Testing Email Function In Codeigniter 4', 'Testing Email Function In Codeigniter 4 Testing Email Function In Codeigniter 4 Testing Email Function In Codeigniter 4 Testing Email Function In Codeigniter 4 Testing Email Function In Codeigniter 4', 'sdcsdsdcd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `expire_date` datetime NOT NULL DEFAULT current_timestamp(),
  `current_weight` varchar(255) NOT NULL,
  `desired_weight` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `fees` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `trainer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`id`, `file`, `fullname`, `email`, `password`, `mobile`, `age`, `date`, `expire_date`, `current_weight`, `desired_weight`, `batch`, `fees`, `gender`, `trainer`) VALUES
(11, '1658384051_8d34345e224e3a875804.png', 'Sai Pawar', 'pawarsai74@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', '25', '2022-07-15 00:00:00', '2023-01-15 00:00:00', '80', '70', 'Evening', 'Paid', 'Male', 'no'),
(19, '1658384051_8d34345e224e3a875804.png', 'Jitendra Pawar', 'pawarsai74@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '1234567890', '25', '2022-07-15 00:00:00', '2023-01-15 00:00:00', '80', '70', 'Evening', 'Paid', 'Male', 'no'),
(24, '1658408302.png', 'Shubham Kothavade', 'shubhya@gmail.com', 'd122ddabb5ef66ba1cfe4999e143af9b', '7778889996', '25', '2022-07-01 00:00:00', '2023-01-01 00:00:00', '80', '70', 'Morning', 'Pending', 'Male', 'yes'),
(25, '1658471122.jpg', 'Raj Maurya', 'raj.m@gmail.com', '6af00a3a846b04ffada14d8330a7f463', '8975525397', '25', '2022-07-22 00:00:00', '2023-01-22 00:00:00', '80', '70', 'Morning', 'Pending', 'Male', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `timing` varchar(255) NOT NULL,
  `exercise` varchar(255) NOT NULL,
  `trainer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `day`, `timing`, `exercise`, `trainer`) VALUES
(14, 'Monday', '8.00 am to 10.00 am', 'Weight-Lifting', 'Jitendra Pawar'),
(16, 'Tuesday', '6.00 am to 8.00 am', 'Zumba', 'Rashmika'),
(17, 'Tuesday', '10.00 am to 12.00 pm', 'Weight-Lifting', 'Jitendra Pawar'),
(18, 'Tuesday', '6.00 pm to 8.00 pm', 'Cardio', 'Shubham'),
(19, 'Wednsday', '8.00 am to 10.00 am', 'Zumba', 'Rashmika'),
(20, 'Wednsday', '10.00 am to 12.00 pm', 'Cross-Fit', 'Sai Pawar'),
(21, 'Wednsday', '6.00 pm to 8.00 pm', 'Cardio', 'Shubham'),
(22, 'Thursday', '6.00 am to 8.00 am', 'Cardio', 'Shubham'),
(24, 'Thursday', '10.00 am to 12.00 pm', 'Weight-Lifting', 'Jitendra Pawar'),
(25, 'Thursday', '6.00 pm to 8.00 pm', 'Cross-Fit', 'Sai Pawar'),
(26, 'Friday', '6.00 am to 8.00 am', 'Weight-Lifting', 'Jitendra Pawar'),
(27, 'Friday', '8.00 am to 10.00 am', 'Cross-Fit', 'Rashmika'),
(29, 'Friday', '6.00 pm to 8.00 pm', 'Cardio', 'Shubham'),
(30, 'Saturday', '6.00 am to 8.00 am', 'Zumba', 'Rashmika'),
(31, 'Saturday', '8.00 am to 10.00 am', 'Cardio', 'Shubham'),
(32, 'Saturday', '10.00 am to 12.00 pm', 'Cross-Fit', 'Sai Pawar'),
(34, 'Monday', '10.00 am to 12.00 pm', 'Cardio', 'Shubham'),
(37, 'Monday', '6.00 am to 8.00 am', 'Zumba', 'Rashmika'),
(38, 'Saturday', '6.00 pm to 8.00 pm', 'Weight-Lifting', 'Jitendra Pawar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `open_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `name`, `email`, `mobile`, `open_time`, `closing_time`, `address`) VALUES
(11, 'Jitendra Pawar', 'jitendra@gmail.com', '1234567890', '05:00:00', '21:00:00', 'Vidya Vikas Circle, Gangapur Road, Nashik, 422003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sociallogin`
--

CREATE TABLE `tbl_sociallogin` (
  `id` int(11) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `current_weight` varchar(255) NOT NULL,
  `desired_weight` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `trainer` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expire_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sociallogin`
--

INSERT INTO `tbl_sociallogin` (`id`, `oauth_id`, `email`, `fullname`, `profile_pic`, `fees`, `mobile`, `age`, `gender`, `current_weight`, `desired_weight`, `batch`, `trainer`, `created_at`, `expire_date`, `updated_at`) VALUES
(8, '110345021272404001530', 'pawarsai74@gmail.com', 'Jitendra Pawar', 'https://lh3.googleusercontent.com/a-/AFdZucrhf_T4eiumj5fNvf8ipmgPsn8haywG_UwC9-cvdg=s96-c', 'Paid', '8975525397', '25', 'Male', '80', '70', 'Morning', 'no', '2022-07-15 18:55:01', '2022-07-15 18:55:01', '2022-07-18 15:36:52'),
(11, '110723656402169662684', 'jit.p5696@gmail.com', 'Jitendra Pawar', 'https://lh3.googleusercontent.com/a-/AFdZucpp0NT_zWDV31-Z46ONg9E1xhksbUSXqlgNnPQQ=s96-c', 'Paid', '1234567890', '22', 'Male', '80', '70', 'Morning', 'no', '2022-07-20 15:48:11', '2022-07-20 15:48:11', '2022-07-20 15:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainers`
--

CREATE TABLE `tbl_trainers` (
  `trainer_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_trainers`
--

INSERT INTO `tbl_trainers` (`trainer_id`, `fullname`, `email`, `gender`, `specialty`, `experience`, `age`, `img`) VALUES
(51, 'Rashmika', 'rash@gmail.com', 'female', 'Zumba', '3 Yrs', '25', '1656394032_652b42558fb9cf9b2eec.jpg'),
(53, 'Sai Pawar', 'sai@gmail.com', 'male', 'Cross-Fitt', '3 Yrs', '25', '1656683447_9e9cbce7993529abe576.jpg'),
(54, 'Jitendra Pawar', 'jitendra@gmail.com', 'Male', 'weight-Lifting', '3 Yrs', '25', '1657704947_ff5f8c87c97691ec42ee.png'),
(55, 'Shubham', 'shubhya@gmail.com', 'Male', 'Cardio', '3 Yrs', '25', '1658147077_fb6c91d9c2437844dae5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `profile_pic`, `fullname`, `email`, `password`, `role`) VALUES
(1, '1657796541_cf3710673a202f288d86.jpeg', 'Jitendra Pawar', 'jitendra@gmail.com', 'b8edac82c17cd289b6076dedb4756a7c', 'Owner'),
(2, '1658219450_2eaa248e276f9e15e34f.jpg', 'Sai pawar', 'pawarsai74@gmail.com', '833d76240565aeaf5c7012590dc033e9', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sociallogin`
--
ALTER TABLE `tbl_sociallogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_sociallogin`
--
ALTER TABLE `tbl_sociallogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
