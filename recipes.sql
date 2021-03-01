-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 01, 2021 at 07:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user` varchar(32) NOT NULL,
  `recipeId` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user`, `recipeId`, `value`) VALUES
(86, 'user1', 36, 5),
(87, 'user1', 35, 4),
(88, 'user1', 39, 3);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `author` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` int(5) NOT NULL,
  `ingredients` text NOT NULL,
  `preparation` text NOT NULL,
  `rating` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `categories` varchar(255) NOT NULL,
  `photo` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `author`, `title`, `time`, `ingredients`, `preparation`, `rating`, `date`, `categories`, `photo`) VALUES
(35, 'admin', 'Pesto pasta', 25, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent gravida ultricies scelerisque. Morbi hendrerit, leo ut rhoncus auctor, justo arcu tincidunt neque, eu auctor nulla turpis vitae leo. Aenean rhoncus eros mi, sed finibus dolor lobortis sed. Integer sit amet sollicitudin erat. Ut condimentum augue id commodo sollicitudin. Fusce id metus a magna tristique porttitor nec a augue. Sed id augue eu justo imperdiet viverra sit amet eu nisl.', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent gravida ultricies scelerisque. Morbi hendrerit, leo ut rhoncus auctor, justo arcu tincidunt neque, eu auctor nulla turpis vitae leo. Aenean rhoncus eros mi, sed finibus dolor lobortis sed. Integer sit amet sollicitudin erat. Ut condimentum augue id commodo sollicitudin. Fusce id metus a magna tristique porttitor nec a augue. Sed id augue eu justo imperdiet viverra sit amet eu nisl.\r\n\r\nNunc condimentum ipsum nec sem eleifend, sed vehicula est posuere. Sed eget laoreet massa. Vestibulum condimentum mi enim, ac vehicula urna lacinia ut. Aenean id semper mi, id porttitor tellus. Nunc sed erat justo. Praesent ac elementum lorem, at facilisis lorem. Suspendisse ut dictum nunc. Suspendisse potenti. Mauris egestas dui eget viverra ultricies. Praesent malesuada scelerisque tortor.\r\n\r\nFusce eu nisl lorem. Duis commodo convallis nibh sit amet fermentum. Sed dictum mattis convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis fringilla nunc, sit amet viverra metus. Sed risus nunc, faucibus non eros et, consectetur sollicitudin sem. Nulla facilisi. Donec et nisi urna. Donec sit amet auctor eros. Maecenas a varius augue. Suspendisse mi neque, scelerisque in facilisis eget, congue ac libero. Etiam convallis diam a nunc bibendum, a fermentum diam faucibus. Quisque a nibh hendrerit, ultrices tortor at, sollicitudin mi. Pellentesque lectus enim, posuere vitae erat vel, pellentesque suscipit nibh.', 0, '2021-03-01 00:16:00', 'vegan, lunch, healthy', 'Image1.jpg'),
(36, 'admin', 'Pan-Fried Salmon', 45, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus justo vitae quam iaculis condimentum. Donec nec enim id odio ornare accumsan eget vitae ligula. Donec laoreet purus et neque scelerisque, in eleifend mauris imperdiet. Vivamus in leo ultricies, molestie mi sed, blandit sem. Mauris elit ex, cursus non metus non, efficitur finibus sem. Nullam sit amet nisl pulvinar, pulvinar tortor eu, fringilla mauris. Maecenas elit enim, cursus sit amet lacus sed, bibendum pretium leo. Morbi vitae imperdiet diam.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus justo vitae quam iaculis condimentum. Donec nec enim id odio ornare accumsan eget vitae ligula. Donec laoreet purus et neque scelerisque, in eleifend mauris imperdiet. Vivamus in leo ultricies, molestie mi sed, blandit sem. Mauris elit ex, cursus non metus non, efficitur finibus sem. Nullam sit amet nisl pulvinar, pulvinar tortor eu, fringilla mauris. Maecenas elit enim, cursus sit amet lacus sed, bibendum pretium leo. Morbi vitae imperdiet diam.\r\n\r\nSed finibus auctor nibh, sit amet tristique nulla cursus id. Nullam nunc nisi, dictum non luctus eu, consectetur in enim. Duis a eros nunc. Vivamus tristique nunc eu risus dictum, sit amet suscipit neque congue. Pellentesque consectetur lectus sit amet neque gravida, et aliquam mi fringilla. Integer ante nisl, mattis ultrices cursus eget, ornare tristique tortor. Duis ut feugiat arcu. Aliquam in ullamcorper erat. Integer tincidunt finibus nibh.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent gravida ultricies scelerisque. Morbi hendrerit, leo ut rhoncus auctor, justo arcu tincidunt neque, eu auctor nulla turpis vitae leo. Aenean rhoncus eros mi, sed finibus dolor lobortis sed. Integer sit amet sollicitudin erat. Ut condimentum augue id commodo sollicitudin. Fusce id metus a magna tristique porttitor nec a augue. Sed id augue eu justo imperdiet viverra sit amet eu nisl. Donec placerat consectetur massa eget convallis. Pellentesque eget dui a augue vestibulum ullamcorper vel et tellus. Proin auctor vehicula odio eu mattis. Phasellus pellentesque semper gravida. Vivamus ac lorem ut lorem cursus mollis. Fusce vel enim quis nisl molestie commodo in nec dolor. Praesent diam dui, feugiat ac velit in, ullamcorper maximus tellus. Donec accumsan ultrices enim, sit amet molestie sem ultrices a.', 0, '2021-03-01 00:18:00', 'dinner, healthy', 'Image2.jpg'),
(38, 'admin', 'Strawberry cake', 60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus justo vitae quam iaculis condimentum. Donec nec enim id odio ornare accumsan eget vitae ligula. Donec laoreet purus et neque scelerisque, in eleifend mauris imperdiet. Vivamus in leo ultricies, molestie mi sed, blandit sem. Mauris elit ex, cursus non metus non, efficitur finibus sem. Nullam sit amet nisl pulvinar, pulvinar tortor eu, fringilla mauris. Maecenas elit enim, cursus sit amet lacus sed, bibendum pretium leo. Morbi vitae imperdiet diam.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus justo vitae quam iaculis condimentum. Donec nec enim id odio ornare accumsan eget vitae ligula. Donec laoreet purus et neque scelerisque, in eleifend mauris imperdiet. Vivamus in leo ultricies, molestie mi sed, blandit sem. Mauris elit ex, cursus non metus non, efficitur finibus sem. Nullam sit amet nisl pulvinar, pulvinar tortor eu, fringilla mauris. Maecenas elit enim, cursus sit amet lacus sed, bibendum pretium leo. Morbi vitae imperdiet diam.\r\n\r\nSed finibus auctor nibh, sit amet tristique nulla cursus id. Nullam nunc nisi, dictum non luctus eu, consectetur in enim. Duis a eros nunc. Vivamus tristique nunc eu risus dictum, sit amet suscipit neque congue. Pellentesque consectetur lectus sit amet neque gravida, et aliquam mi fringilla. Integer ante nisl, mattis ultrices cursus eget, ornare tristique tortor. Duis ut feugiat arcu. Aliquam in ullamcorper erat. Integer tincidunt finibus nibh.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent gravida ultricies scelerisque. Morbi hendrerit, leo ut rhoncus auctor, justo arcu tincidunt neque, eu auctor nulla turpis vitae leo. Aenean rhoncus eros mi, sed finibus dolor lobortis sed. Integer sit amet sollicitudin erat. Ut condimentum augue id commodo sollicitudin. Fusce id metus a magna tristique porttitor nec a augue. Sed id augue eu justo imperdiet viverra sit amet eu nisl. Donec placerat consectetur massa eget convallis. Pellentesque eget dui a augue vestibulum ullamcorper vel et tellus. Proin auctor vehicula odio eu mattis. Phasellus pellentesque semper gravida. Vivamus ac lorem ut lorem cursus mollis. Fusce vel enim quis nisl molestie commodo in nec dolor. Praesent diam dui, feugiat ac velit in, ullamcorper maximus tellus. Donec accumsan ultrices enim, sit amet molestie sem ultrices a.', 0, '2021-03-01 00:28:00', 'dessert, breakfast', 'Image4.jpg'),
(39, 'admin', 'Tomato soup', 30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus justo vitae quam iaculis condimentum. Donec nec enim id odio ornare accumsan eget vitae ligula. Donec laoreet purus et neque scelerisque, in eleifend mauris imperdiet. Vivamus in leo ultricies, molestie mi sed, blandit sem. Mauris elit ex, cursus non metus non, efficitur finibus sem. Nullam sit amet nisl pulvinar, pulvinar tortor eu, fringilla mauris. Maecenas elit enim, cursus sit amet lacus sed, bibendum pretium leo. Morbi vitae imperdiet diam.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus justo vitae quam iaculis condimentum. Donec nec enim id odio ornare accumsan eget vitae ligula. Donec laoreet purus et neque scelerisque, in eleifend mauris imperdiet. Vivamus in leo ultricies, molestie mi sed, blandit sem. Mauris elit ex, cursus non metus non, efficitur finibus sem. Nullam sit amet nisl pulvinar, pulvinar tortor eu, fringilla mauris. Maecenas elit enim, cursus sit amet lacus sed, bibendum pretium leo. Morbi vitae imperdiet diam.\r\n\r\nSed finibus auctor nibh, sit amet tristique nulla cursus id. Nullam nunc nisi, dictum non luctus eu, consectetur in enim. Duis a eros nunc. Vivamus tristique nunc eu risus dictum, sit amet suscipit neque congue. Pellentesque consectetur lectus sit amet neque gravida, et aliquam mi fringilla. Integer ante nisl, mattis ultrices cursus eget, ornare tristique tortor. Duis ut feugiat arcu. Aliquam in ullamcorper erat. Integer tincidunt finibus nibh.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent gravida ultricies scelerisque. Morbi hendrerit, leo ut rhoncus auctor, justo arcu tincidunt neque, eu auctor nulla turpis vitae leo. Aenean rhoncus eros mi, sed finibus dolor lobortis sed. Integer sit amet sollicitudin erat. Ut condimentum augue id commodo sollicitudin. Fusce id metus a magna tristique porttitor nec a augue. Sed id augue eu justo imperdiet viverra sit amet eu nisl. Donec placerat consectetur massa eget convallis. Pellentesque eget dui a augue vestibulum ullamcorper vel et tellus. Proin auctor vehicula odio eu mattis. Phasellus pellentesque semper gravida. Vivamus ac lorem ut lorem cursus mollis. Fusce vel enim quis nisl molestie commodo in nec dolor. Praesent diam dui, feugiat ac velit in, ullamcorper maximus tellus. Donec accumsan ultrices enim, sit amet molestie sem ultrices a.', 0, '2021-03-01 00:30:00', 'vegan, lunch, dinner, healthy', 'Image5.jpg'),
(40, 'user', 'Pizza', 65, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus justo vitae quam iaculis condimentum. Donec nec enim id odio ornare accumsan eget vitae ligula. Donec laoreet purus et neque scelerisque, in eleifend mauris imperdiet. Vivamus in leo ultricies, molestie mi sed, blandit sem. Mauris elit ex, cursus non metus non, efficitur finibus sem. Nullam sit amet nisl pulvinar, pulvinar tortor eu, fringilla mauris. Maecenas elit enim, cursus sit amet lacus sed, bibendum pretium leo. Morbi vitae imperdiet diam.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus justo vitae quam iaculis condimentum. Donec nec enim id odio ornare accumsan eget vitae ligula. Donec laoreet purus et neque scelerisque, in eleifend mauris imperdiet. Vivamus in leo ultricies, molestie mi sed, blandit sem. Mauris elit ex, cursus non metus non, efficitur finibus sem. Nullam sit amet nisl pulvinar, pulvinar tortor eu, fringilla mauris. Maecenas elit enim, cursus sit amet lacus sed, bibendum pretium leo. Morbi vitae imperdiet diam.\r\n\r\nSed finibus auctor nibh, sit amet tristique nulla cursus id. Nullam nunc nisi, dictum non luctus eu, consectetur in enim. Duis a eros nunc. Vivamus tristique nunc eu risus dictum, sit amet suscipit neque congue. Pellentesque consectetur lectus sit amet neque gravida, et aliquam mi fringilla. Integer ante nisl, mattis ultrices cursus eget, ornare tristique tortor. Duis ut feugiat arcu. Aliquam in ullamcorper erat. Integer tincidunt finibus nibh.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent gravida ultricies scelerisque. Morbi hendrerit, leo ut rhoncus auctor, justo arcu tincidunt neque, eu auctor nulla turpis vitae leo. Aenean rhoncus eros mi, sed finibus dolor lobortis sed. Integer sit amet sollicitudin erat. Ut condimentum augue id commodo sollicitudin. Fusce id metus a magna tristique porttitor nec a augue. Sed id augue eu justo imperdiet viverra sit amet eu nisl. Donec placerat consectetur massa eget convallis. Pellentesque eget dui a augue vestibulum ullamcorper vel et tellus. Proin auctor vehicula odio eu mattis. Phasellus pellentesque semper gravida. Vivamus ac lorem ut lorem cursus mollis. Fusce vel enim quis nisl molestie commodo in nec dolor. Praesent diam dui, feugiat ac velit in, ullamcorper maximus tellus. Donec accumsan ultrices enim, sit amet molestie sem ultrices a.', 0, '2021-03-01 00:38:00', 'lunch, dinner', 'Image6.jpg'),
(46, 'user1', 'Healthy pancakes', 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id eros ullamcorper, finibus magna id, consectetur justo. Duis commodo risus eget tortor vestibulum iaculis. Suspendisse suscipit tempus volutpat. Nam eu lectus est. Nam bibendum placerat erat ac auctor. Nullam iaculis felis ligula, vitae vehicula tellus auctor in. Curabitur a augue sem. Integer tempus blandit cursus. Nunc magna felis, fringilla sit amet sagittis non, cursus non lectus. Nunc porta ultrices scelerisque.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id eros ullamcorper, finibus magna id, consectetur justo. Duis commodo risus eget tortor vestibulum iaculis. Suspendisse suscipit tempus volutpat. Nam eu lectus est. Nam bibendum placerat erat ac auctor. Nullam iaculis felis ligula, vitae vehicula tellus auctor in. Curabitur a augue sem. Integer tempus blandit cursus. Nunc magna felis, fringilla sit amet sagittis non, cursus non lectus. Nunc porta ultrices scelerisque.\r\n\r\nSuspendisse potenti. Vivamus eget tempor tellus. Maecenas venenatis erat vitae porta blandit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce ac fermentum metus. Vestibulum tincidunt ultrices tincidunt. Aenean vitae placerat justo, aliquam porta ligula. Proin non eros non elit hendrerit placerat eget condimentum leo. Cras molestie dictum felis sit amet fringilla. Etiam vitae fringilla nisl. Curabitur lacus purus, semper nec augue eu, vestibulum feugiat odio. Cras in est sed lacus gravida semper.', 0, '2021-03-01 19:26:00', 'dessert, breakfast, healthy', 'Image3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$9UUwNQDuamKh1amrThqUvuFSXoWQZpyLZhfDZTgy1H3BKbbzm2z5i', 1),
(9, 'user1', '$2y$10$19xYgSH166M4NJKt7Cp/FOAw6Sl8JeON094fRLzoCAec0AdzvJXQi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`user`),
  ADD KEY `FOREIGNRecipe` (`recipeId`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`recipeId`) REFERENCES `recipe` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
