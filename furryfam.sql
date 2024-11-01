-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 04:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furryfam`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `petType` varchar(50) DEFAULT NULL,
  `appointmentDate` date DEFAULT NULL,
  `appointmentTime` time DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `vet_id`, `fullName`, `email`, `number`, `address`, `petType`, `appointmentDate`, `appointmentTime`, `message`) VALUES
(1, 0, 'Sewwandi Thamel', 'tharuujay@gmail.com', '0764669012', 'N0:58/B,4th Lane,morisland,', 'Cat', '2023-11-30', '13:18:00', 'I want meet '),
(2, 0, 'Sewwandi Thamel', 'tharuujay@gmail.com', '0764669012', 'N0:58/B,4th Lane,morisland,', 'Dog', '2023-12-09', '18:30:00', 'hjgfyify'),
(0, 0, 'Thamasha Devindi', 'vindi835@gmail', '0142536689', 'vhhjvhj', 'Cat', '2023-12-09', '06:23:00', 'zdsafas'),
(0, 0, 'ishara madhushani', 'ishara@gmail.com', '0712536689', 'Galpalama Road, Perimiyankulama, Anuradhapura', 'Cat', '2023-12-02', '08:57:00', 'text text'),
(0, 0, 'ishara madhushani', 'ishara@gmail.com', '0712356987', 'Galpalama Road, Perimiyankulama, Anuradhapura', 'Cat', '2023-11-30', '10:13:00', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'How do I take care of my pet?', 'When it comes to pet care, people often want to know how they can best provide for their furry companions. This is a very general question, but it’s one that people ask a lot. Therefore, you’ll want to provide as good of an answer as you can and explain that they should read up on the exact type of pet they’re getting ahead of time so that they know what they’re in for. \r\n\r\nAnd as for those who have already gotten the pet, explain as much as you can about researching care and how to provide for the animal’s best interests, no matter what type of pet they have. If you offer a specific type of pet care service, you can also focus on the details of care here. '),
(2, 'What should I do if my pet is injured or gets sick?', 'This is a good place to showcase your expertise in pet care. Explain that it’s always best to visit a veterinarian if your pet is sick or injured, but for minor issues, there are some DIY methods you can try first or to hold you over in the meantime. Make sure that people understand the seriousness of taking their pets to the vet when it is necessary and explain how proper pet care starts by knowing when to leave the work to someone else.'),
(11, 'sample question?', 'new answer');

-- --------------------------------------------------------

--
-- Table structure for table `lost_pets`
--

CREATE TABLE `lost_pets` (
  `id` int(11) NOT NULL,
  `petName` varchar(255) NOT NULL,
  `breed` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `lostDate` date NOT NULL,
  `lostTime` time NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `additionalInfo` text DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `ownerName` varchar(255) NOT NULL,
  `ownerTP` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost_pets`
--

INSERT INTO `lost_pets` (`id`, `petName`, `breed`, `type`, `lostDate`, `lostTime`, `city`, `additionalInfo`, `color`, `age`, `size`, `gender`, `ownerName`, `ownerTP`, `email`, `image`) VALUES
(1, 'ozzy', 'German Shepherd', 'Dog', '2023-09-07', '08:00:00', 'colombo', ' $200 Reward for safe Return.', 'black and brown', 'Adult', 'Large', 'female', 'john', '123 2456987', 'john@gmail.com', 'images/ozzy.jpg'),
(2, 'sherry', 'Labrador Retriever', 'Dog', '2023-09-03', '10:16:00', 'negambo', ' $500 Reward for safe Return.', 'golden brown', 'Young Adult', 'Medium', 'female', 'mark', '123 4578963', 'mark@gmail.com', 'images/sherry.jpg'),
(26, 'kitty', 'persian', 'Cat', '2023-11-24', '06:58:00', 'anuradhapura', 'reward 200$ for safe return', 'white', 'Baby', 'small', 'female', 'ishara', '0172356984', 'ishara@gmail.com', 'images/cat.jpg'),
(27, 'browny', 'persian', 'Cat', '2023-11-24', '07:14:00', 'anuradhapura', 'reward 200$ for safe return', 'white', 'Adult', 'Large', 'female', 'ishara', '0715689789', 'ishara@gmail.com', 'images/misty.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_shipped` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `status` enum('Placed','Processing','Shipped','Delivered','Cancelled') NOT NULL DEFAULT 'Placed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pethealthinfo`
--

CREATE TABLE `pethealthinfo` (
  `info_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petproduct`
--

CREATE TABLE `petproduct` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petprofile`
--

CREATE TABLE `petprofile` (
  `pet_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `medical_history` text DEFAULT NULL,
  `special_needs` text DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petprofile`
--

INSERT INTO `petprofile` (`pet_id`, `name`, `breed`, `age`, `medical_history`, `special_needs`, `id`) VALUES
(2, 'asdfsd', 'sdfsd', 100, 'sdfsd', 'sdfsd', 26),
(3, 'ozzy', 'dog', 4, 'daf', 'fefewg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `pet_images`
--

CREATE TABLE `pet_images` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_images`
--

INSERT INTO `pet_images` (`id`, `filename`, `uploaded_at`) VALUES
(4, 'dog-puppy-on-garden-royalty-free-image-1586966191.jpg', '2023-09-06 17:48:42'),
(6, 'ozzy.jpg', '2023-09-07 03:50:11'),
(7, 'sherry.jpg', '2023-09-07 03:50:28'),
(60, 'cat.jpg', '2023-11-24 03:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image_path`) VALUES
(1, 'Trixie Lachsol Salmon 500ml', 4900.00, 'images/PS_1.jpeg'),
(2, 'Trixie Bone Mineral 800g', 3900.00, 'images/PS_2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `review`, `date`) VALUES
(7, 'Thamasha Devindi', 'Have good experience with this web application.\r\n', '2023-11-22 17:42:18'),
(9, 'Tharushi Sewwandi', 'Very easy to work with this web application.', '2023-11-22 18:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `shippinginfo`
--

CREATE TABLE `shippinginfo` (
  `shipping_id` int(11) NOT NULL,
  `shippingType` varchar(50) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `shipping_region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_sessions`
--

CREATE TABLE `training_sessions` (
  `session_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `session_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_sessions`
--

INSERT INTO `training_sessions` (`session_id`, `session_date`, `session_time`) VALUES
(1, '2023-11-23', '12:02:00'),
(2, '2023-11-23', '12:08:00'),
(3, '2023-11-23', '12:12:00'),
(4, '2023-11-23', '12:14:00'),
(5, '2023-11-23', '12:20:00'),
(6, '2023-11-23', '12:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL COMMENT 'Available roles: admin, petowner, veterinarian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `username`, `password`, `role`) VALUES
(2, 'tiana', 'munasinghe', 'tiana@gmail.com', '$2y$10$HqDSU7V.c9iGxCKAfiznouQlDR6aDNbI0QFRagkAoQF.BKLPaecce', 'petowner'),
(3, 'thamasha', 'devindi', 'vindi835@gmail', '$2y$10$77aJTyshY7GlWBVUV4j8h.5jwvtCF6q9LcLUkPbhXEzsBH3A/CXKa', 'petowner'),
(6, 'dimasha', 'madushani', 'dimasha@gmail.com', '$2y$10$/V26Rtcu8fao5uUjNWf2DOTlZvuVmbz3vAqX/mNsRdy1IS6thRC56', 'petowner'),
(7, 'ravindu', 'lakshan', 'ravindu@gmail.com', '$2y$10$r66lidxt9iINvmVHXySaN.5tdJE0sC4AuBUOqEYRWv1ZeWzyB14W.', 'petowner'),
(8, 'dimasha', 'madushani', 'dimasha@gmail.com', '$2y$10$7F6qSKUQybQHjSC.Gv8.g.xSpwcJsz6qxr33yIRBZO20l1r//E10i', 'petowner'),
(9, 'sewwandi', 'tharushi', 'sewwandi@gmail.com', '$2y$10$j/idBKbCgthccoh5juGz7ePT2Boa.o9Y2THHCmosOTAbFbzNwPVfy', 'petowner'),
(23, 'sdfsdfsd', 'sdfsdf', 'sdfsdf', 'sdfsdf@sdfsd.com', 'petowner'),
(26, 'asdfjlksd', 'sdlfkjsdlf', 'johncena', '$2y$10$TCdoR9YLIrxUu.qWZ8n2mORK7raBwVqqsT6zaxsDgPgpKCSdOgILO', 'veterinarian'),
(28, 'samadhi', 'kavindya', 'samadi@gmail.com', '$2y$10$KnB5QXCh3LpxQPVqdQJhWu64Fhy1qT0bgLGhYBgvpc.avCsSOcPGK', 'petowner'),
(29, 'rihan', 'munasinghe', 'rihan@gmail.com', '$2y$10$3LAIRDdknafWK9rmX92qLOw6KWBJm.F13VmzzDGSayCGIfVd922lm', 'veterinarian'),
(30, 'kavindu', 'sandeepa', 'kavindu@gmail.com', '$2y$10$WiBTSIPYUNVLP2ekUA9GCOvv4iRCqF14yPsU3J/G6VyCiTSdeF.de', 'petowner'),
(32, 'himasha', 'madushani', 'himasha@gmail.com', '$2y$10$Wl1lFLFA.O3mxZaPV.0gqurivfC7D5N5XVU8mogOHo2V.LhWgHkbC', 'veterinarian'),
(34, 'sithara', 'dilshani', 'sithu@gmail.com', '$2y$10$T0XtisUr5y0CbxqiB6YocOS12Ki1xUuKS0c8wlb0no4jDGgXXj2Ky', 'petowner'),
(36, 'tiana', 'munasinghe', 'tiana@gmail.com', '$2y$10$4NVawkyKUqqmAjNjUcZjyePWCixS0geFRyHkuJWOFWs2rbhqc34dS', 'petowner'),
(37, 'vinuki', 'vinuki', 'vinuki@gmail.com', '$2y$10$gi2SfLx10CVVorslQOO9L.GMFQoNiQhQHGR/212WaWLwIscLLDZB2', 'petowner'),
(38, 'admin', 'john', 'admin@gmail.com', '$2y$10$XIYqxyGglQNO/dTPDGLCKOPS5Tdd6qrlncoTsZkXQBtFSgZZR4PQi', 'admin'),
(39, 'john', 'smith', 'veterinarian1@gmail.com', '$2y$10$9Ysm35pGJYLmtwD2WuzXJOiEYKa.zebIcv3VejlUfGnBemzQuE4RS', 'veterinarian'),
(41, 'ishara', 'madhushani', 'ishara@gmail.com', '$2y$10$0AMnngNOAyQos05J93ny1eTIha.evKCEnB346tR0q9xQNBsNhyk6m', 'petowner');

-- --------------------------------------------------------

--
-- Table structure for table `veterinarian_availability`
--

CREATE TABLE `veterinarian_availability` (
  `vet_id` int(11) NOT NULL,
  `vet_name` varchar(255) NOT NULL,
  `availability` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `veterinarian_availability`
--

INSERT INTO `veterinarian_availability` (`vet_id`, `vet_name`, `availability`) VALUES
(1, 'Dr. Maurice Allen', 'Monday (9:00 AM - 3:00 PM), Tuesday (10:00 AM - 2:00 PM), Wednesday (8:00 AM - 4:00 PM), Thursday (1:00 PM - 4:00 PM)'),
(2, 'Dr. Chris Brown', 'Monday (9:00 AM - 12:00 PM), Tuesday (10:00 AM - 1:00 PM), Wednesday (8:00 AM - 3:00 PM), Thursday (8:00 AM - 11:00 AM)'),
(3, 'Dr. Agara Dickens', 'Monday (9:00 AM - 1:00 PM), Friday (8:00 AM - 11:00 AM)'),
(4, 'Dr. Anika Lawson', 'Monday (9:00 AM - 2:00 PM), Tuesday (10:00 AM - 2:00 PM), Friday (11:00 AM - 4:00 PM)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_pets`
--
ALTER TABLE `lost_pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id` (`id`),
  ADD KEY `shipping_id` (`shipping_id`);

--
-- Indexes for table `pethealthinfo`
--
ALTER TABLE `pethealthinfo`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `petproduct`
--
ALTER TABLE `petproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `petprofile`
--
ALTER TABLE `petprofile`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pet_images`
--
ALTER TABLE `pet_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippinginfo`
--
ALTER TABLE `shippinginfo`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `training_sessions`
--
ALTER TABLE `training_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veterinarian_availability`
--
ALTER TABLE `veterinarian_availability`
  ADD PRIMARY KEY (`vet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lost_pets`
--
ALTER TABLE `lost_pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pethealthinfo`
--
ALTER TABLE `pethealthinfo`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petproduct`
--
ALTER TABLE `petproduct`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petprofile`
--
ALTER TABLE `petprofile`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pet_images`
--
ALTER TABLE `pet_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shippinginfo`
--
ALTER TABLE `shippinginfo`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_sessions`
--
ALTER TABLE `training_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `shippinginfo` (`shipping_id`);

--
-- Constraints for table `petprofile`
--
ALTER TABLE `petprofile`
  ADD CONSTRAINT `petprofile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
