-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Fev-2016 às 20:26
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shifttree`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `node`
--

CREATE TABLE `node` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(128) NOT NULL,
  `ID_FATHER` int(11) DEFAULT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tree`
--

CREATE TABLE `tree` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `ID_RAIZ` int(11) NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DEADLINE` datetime NOT NULL,
  `ACTIVE` tinyint(1) NOT NULL DEFAULT '1',
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `ID_FACEBOOK` bigint(20) NOT NULL,
  `USERNAME` varchar(64) NOT NULL,
  `DESCRIPTION` text,
  `EMAIL` varchar(200),
  `PROFILE_PICTURE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_node`
--

CREATE TABLE `user_node` (
  `ID_NODE` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vote`
--

CREATE TABLE `vote` (
  `ID_USER` int(11) NOT NULL,
  `ID_NODE` int(11) NOT NULL,
  `COUNTER` int(11) NOT NULL DEFAULT '0',
  `LIKES` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_FATHER` (`ID_FATHER`);

--
-- Indexes for table `tree`
--
ALTER TABLE `tree`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `ID_RAIZ` (`ID_RAIZ`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_node`
--
ALTER TABLE `user_node`
  ADD KEY `ID_NODE` (`ID_NODE`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_NODE` (`ID_NODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tree`
--
ALTER TABLE `tree`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `node`
--
ALTER TABLE `node`
  ADD CONSTRAINT `node_ibfk_1` FOREIGN KEY (`ID_FATHER`) REFERENCES `node` (`ID`);

--
-- Limitadores para a tabela `tree`
--
ALTER TABLE `tree`
  ADD CONSTRAINT `tree_ibfk_1` FOREIGN KEY (`ID_RAIZ`) REFERENCES `node` (`ID`);

--
-- Limitadores para a tabela `user_node`
--
ALTER TABLE `user_node`
  ADD CONSTRAINT `user_node_ibfk_2` FOREIGN KEY (`ID_NODE`) REFERENCES `node` (`ID`),
  ADD CONSTRAINT `user_node_ibfk_3` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID`);

--
-- Limitadores para a tabela `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`ID_NODE`) REFERENCES `node` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
