-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 mars 2021 à 18:42
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `IDComment` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `IDAuthor` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`IDComment`, `content`, `post_ID`, `IDAuthor`, `date`) VALUES
(1, 'Maîtriser les fonctions de Callback, le namespacing,...', 1, 3, '2021-02-25 05:40:43');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `IDLike` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`IDLike`, `post_id`, `author_id`) VALUES
(1, 1, 1),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `IDNotification` int(11) NOT NULL,
  `notifContent` varchar(50) NOT NULL,
  `remittee` int(11) NOT NULL,
  `idPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`IDNotification`, `notifContent`, `remittee`, `idPost`) VALUES
(1, 'Aboubakary833a liké votre publication sur NodeJS', 1, 1),
(2, 'Yayaa liké votre publication sur NodeJS', 1, 1),
(3, 'Yaya a commenté votre publication sur NodeJS', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `IDPost` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(25) NOT NULL,
  `authorID` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`IDPost`, `category`, `text`, `image`, `authorID`, `likes`, `date`) VALUES
(1, 'NodeJS', 'Bonjour tout le monde!Selon vous,quel sont les bases à avoir en JavaScript pour développer avec NodeJS?', 'nodejs.jpg', 1, 2, '2021-02-24 05:50:15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `avatar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `firstname`, `lastname`, `username`, `email`, `password`, `role`, `avatar`) VALUES
(1, 'Aboubakary', 'Cissé', 'Aboubakary833', 'aboubakarycisse404@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Admin', 'default-avatar.png'),
(2, 'Wayward', 'Sidick', 'Aboubakary833', 'waywardsidick@gmail.com', '92f2fd99879b0c2466ab8648afb63c49032379c1', 'Développeur', 'john.jpg'),
(3, 'Yaya', 'Yarbanga', 'Yaya', 'yayayarbanga@gmail.com', '92f2fd99879b0c2466ab8648afb63c49032379c1', 'Développeur', 'default-avatar.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`IDComment`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`IDLike`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`IDNotification`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`IDPost`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `IDComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `IDLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `IDNotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `IDPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
