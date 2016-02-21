-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Fev-2016 às 02:27
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
-- Estrutura da tabela `feedback_users`
--

CREATE TABLE `feedback_users` (
  `ID_USER_VOTING` bigint(20) NOT NULL,
  `ID_USER_VOTED` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `node`
--

CREATE TABLE `node` (
  `ID` int(11) NOT NULL,
  `ID_USER` bigint(20) NOT NULL,
  `ID_FATHER` int(11) DEFAULT NULL,
  `NAME` varchar(200) NOT NULL,
  `DESCRIPTION` text,
  `LIKES` int(11) DEFAULT '0',
  `DESLIKE` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `node`
--

INSERT INTO `node` (`ID`, `ID_USER`, `ID_FATHER`, `NAME`, `DESCRIPTION`, `LIKES`, `DESLIKE`) VALUES
(4, 1155278177838126, NULL, 'First', 'Tree', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `node_sons`
--

CREATE TABLE `node_sons` (
  `ID_NODE` int(11) NOT NULL,
  `ID_SON` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `ID_FACEBOOK` bigint(20) NOT NULL,
  `USERNAME` varchar(64) NOT NULL,
  `DESCRIPTION` text,
  `EMAIL` varchar(200) DEFAULT NULL,
  `PROFILE_PICTURE` varchar(200) NOT NULL,
  `LIKES` int(11) DEFAULT '0',
  `DESLIKES` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID_FACEBOOK`, `USERNAME`, `DESCRIPTION`, `EMAIL`, `PROFILE_PICTURE`, `LIKES`, `DESLIKES`) VALUES
(1155278177838126, 'TomÃ¡s Carvalho', NULL, NULL, 'https://scontent.xx.fbcdn.net/hprofile-xlp1/v/t1.0-1/p200x200/12717613_1151716791527598_2134512684508923854_n.jpg?oh=154de9a7f3cf1972ba33dee1963f5b4b&oe=57232336', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vote_user`
--

CREATE TABLE `vote_user` (
  `ID_USER` bigint(20) NOT NULL,
  `ID_NODE` int(11) NOT NULL,
  `LIKED` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback_users`
--
ALTER TABLE `feedback_users`
  ADD KEY `ID_USER_VOTING` (`ID_USER_VOTING`),
  ADD KEY `ID_USER_VOTED` (`ID_USER_VOTED`);

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_FATHER` (`ID_FATHER`);

--
-- Indexes for table `node_sons`
--
ALTER TABLE `node_sons`
  ADD KEY `ID_NODE` (`ID_NODE`),
  ADD KEY `ID_SON` (`ID_SON`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_FACEBOOK`);

--
-- Indexes for table `vote_user`
--
ALTER TABLE `vote_user`
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_NODE` (`ID_NODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `feedback_users`
--
ALTER TABLE `feedback_users`
  ADD CONSTRAINT `feedback_users_ibfk_1` FOREIGN KEY (`ID_USER_VOTING`) REFERENCES `users` (`ID_FACEBOOK`),
  ADD CONSTRAINT `feedback_users_ibfk_2` FOREIGN KEY (`ID_USER_VOTED`) REFERENCES `users` (`ID_FACEBOOK`);

--
-- Limitadores para a tabela `node`
--
ALTER TABLE `node`
  ADD CONSTRAINT `node_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_FACEBOOK`),
  ADD CONSTRAINT `node_ibfk_2` FOREIGN KEY (`ID_FATHER`) REFERENCES `node` (`ID`);

--
-- Limitadores para a tabela `node_sons`
--
ALTER TABLE `node_sons`
  ADD CONSTRAINT `node_sons_ibfk_1` FOREIGN KEY (`ID_NODE`) REFERENCES `node` (`ID`),
  ADD CONSTRAINT `node_sons_ibfk_2` FOREIGN KEY (`ID_SON`) REFERENCES `node` (`ID`);

--
-- Limitadores para a tabela `vote_user`
--
ALTER TABLE `vote_user`
  ADD CONSTRAINT `vote_user_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_FACEBOOK`),
  ADD CONSTRAINT `vote_user_ibfk_2` FOREIGN KEY (`ID_NODE`) REFERENCES `node` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
