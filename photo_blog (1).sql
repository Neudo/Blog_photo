-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 juin 2021 à 07:56
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `photo_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text,
  `img` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `img`) VALUES
(2, 'Matériel', 'LE MATÉRIEL, DES TESTS OU ENCORE DES LOGICIELS', '1621254368.jpg'),
(3, 'Tutoriels', 'EXPLICATION DE TECHNIQUES', '1621254416.jpg'),
(4, 'Making of', 'EXPLICATIONS ET ANALYSES DE PRISES DE VUES', '1621254425.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categories_posts`
--

DROP TABLE IF EXISTS `categories_posts`;
CREATE TABLE IF NOT EXISTS `categories_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories_posts`
--

INSERT INTO `categories_posts` (`id`, `post_id`, `category_id`) VALUES
(1, 27, 2),
(2, 28, 3),
(3, 29, 3),
(4, 31, 2),
(5, 28, 3),
(6, 48, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categories_users`
--

DROP TABLE IF EXISTS `categories_users`;
CREATE TABLE IF NOT EXISTS `categories_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_user` (`user_id`),
  KEY `category_id_category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories_users`
--

INSERT INTO `categories_users` (`id`, `user_id`, `category_id`) VALUES
(1, 23, 4),
(2, 23, 2);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `img`) VALUES
(1, 'Fleurs', ''),
(2, 'Insectes', ''),
(3, 'Eau', ''),
(4, 'Peinture', '');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `summary` varchar(256) NOT NULL,
  `content` longtext NOT NULL,
  `img` varchar(256) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_publied` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `foreign users id key` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `date`, `summary`, `content`, `img`, `user_id`, `is_publied`) VALUES
(26, 'SIGMA 180mm f/2.8 Macro OS : ETES-VOUS FAIT POUR LUI ?', '2021-04-23 22:01:46', 'Premier téléobjectif macro au monde de focale 180mm à\r\nposséder une ouverture de f/2.8 ainsi que la stabilisation…\r\n', 'UNE BELLE OPPORTUNITE \r\n \r\nUne formidable opportunité m\'a permis d\'utiliser cet objectif d’exception. \r\nEn effet  Renaud Coillot ( E-marketing manager  de la société Sigma) m\'a contacté \r\npour me complimenter sur mon travail photographique avec l\'objectif Sigma \r\n150mm et m\'à proposé d\'essayer gracieusement leur nouvel objectif macro sachant\r\nque j\'aime shooter avec une focale avoisinant les 180-200mm \r\n( j\'utilise systématique \r\nun multiplicateur  de focal X1.4 sur mon objectif 150mm) \r\nLa suite vous vous en doutez, je n\'ai pas dit NON  :) \r\nPREMIÈRES IMPRESSIONS DE CE BEL OBJET\r\n\r\nIl faut bien se l\'avouer quand on a la possibilité d\'acquérir \r\ncet objectif inaccessible financièrement pour beaucoup il y a \r\nce sentiment indescriptible qui nous rend fiers et respectueux de \r\ncet objectif d’exception. Mais juste avant cette prise en main \r\nil y a la réception du colis et ça aussi c\'est un grand moment !\r\nL\'objectif est livré avec sa housse de protection ainsi que \r\nses 2 pares-soleil, selon que vous  soyez en possession d\' un \r\nappareil APS-C ou un plein format.\r\nRevenons au sujet de l\'article. La première chose qui m\'a frappé \r\nen comparaison de mon fidèle objectif 150mm c\'est la longueur \r\nde la bête avec le pare-soleil. On atteint environ les 40cm. \r\nUn détail qui peut avoir son importance sur le terrain mais \r\non verra ça un peu plus tard ... ! Deuxième choc le poids ! \r\nprès de 1,8kg sur la balance. ce second détail peut être \r\néliminatoire \r\nsur le terrain selon votre manière de travailler vos prises de vue.\r\nCôté finition l\'objectif respire la solidité et le produit bien fini. \r\nLe revêtement est agréable au toucher et n\'a plus rien à voir avec \r\nl\'aspect peau de pêche des anciens objectifs sigma.\r\n \r\n conclusion\r\n\r\n\r\nCet objectif réussit le pari d\'une qualité d\'image exceptionnel et du plaisir de son \r\nutilisation. Effectivement la qualité n\'a pas fait de compromis sur sa longueur ni \r\nde son poids. Ce sont des données importantes à prendre en compte suivant \r\nson utilisation.\r\n\r\nMais au final on  retiendra : \r\n\r\nLa qualité de ses photos\r\nLa possibilité de photographier de farouches insectes à une distance confortable\r\nla maîtrise des bokehs\r\nUne pleine ouverture excellente\r\n\r\nSi on décide de s’équiper avec ce matériel d’exception on choisit alors volontairement \r\nde renoncer à photographier léger. En conséquence au poids de l\'objet déjà important  \r\nil faut rajouter les centaines de grammes supplémentaires du sac à dos capable de le \r\ntransporter. On choisit également des contraintes supplémentaires relatives à son \r\ndéplacement constant en milieu naturel. On pratique rarement la technique de \r\nl\'affût pour une utilisation macro/ proxy.\r\n\r\nMais ... choisir cet objectif c\'est vouloir se spécialiser et ainsi aller plus loin dans sa \r\npratique photographique. N\'achetez pas cet objectif en vous convainquant \r\nqu\'il sera polyvalent, c\'est un leurre !\r\n\r\nPosséder cet objectif c\'est se donner les moyens de produire un travail d’exception\r\nPartir en ballade avec cet objectif c\'est envisager une vraie réflexion sur ses prises de vue.\r\nPratiquer la macro/ proxy avec cet objectif c\'est rajouter une nouvelle dimension créative.', '1621350981.jpg', 13, 1),
(31, 'MACROPHOTOGRAPHIE : MISSION ASCALAPHE', '2021-05-09 22:58:25', 'Les ascalaphes sont des insectes fascinants mais avant \r\nd\'aller plus loin voici la courte description dénuée …', 'MON HISTORIQUE\r\n \r\nCela fait aujourd\'hui prés de 4 ans que les ascalaphes et moi même, nous donnons rendez vous chaque année. Dans ma région Héraultaise l\'ascalaphe souffré se montre généralement début juin. 4 ans correspond également au moment où j\'ai découvert ce fameux pré où réside tant de vies animales. Ce pré à la particularité d\'être envahient d\'ascalaphes et libellules durant la saison chaude. Les photos de cet article retracent donc ces 4 années d\'observations durant les mois de juin, juillet et quelques fois août.\r\n\r\n \r\nA QUEL MOMENT PHOTOGRAPHIER L\'ASCALAPHE ?\r\n \r\nL\'ascalaphe est un insecte assez difficile à discerner et dans la végétation sèche de la saison chaude et quand on s\'aperçoit de sa présence à nos pieds son envol nous signifie que nous étions déjà bien trop prés. Comme les libellules et beaucoup d\'autres insectes l\'ascalaphe est à la même température que son environnement. En dessous d\'un certain niveau de température celui-ci  se met au repos sur une tige en attendant de capter à nouveau un maximum de chaleur. Dans ces conditions le matin et le soir sont donc des moments propices favorables à la prise de vue. Entre ces 2 horaires je vous invite à poser votre appareil photo car vous aurez le nez en l\'air en espérant que ces magnifiques insectes daignent enfin se poser !', '1621257881.jpg', 13, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` text NOT NULL,
  `bio` varchar(256) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`email`),
  UNIQUE KEY `uniq_pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `bio`, `is_admin`, `created_at`) VALUES
(12, 'crypt', 'cryptmdp@gmail.com', '$2y$10$eZTM8YLb2TANZ17uxWveJ.oygyZ9Q.OqTilfczEL1x7K3Tno1zz9a', '', 0, '2021-03-30 18:58:59'),
(13, 'admin', 'admin@alimo.com', '$2y$10$M7VOjhAjR28WbFdd6mp0tOO5glvDREVfhduBg8.8mPbR2ZAOeRlb2', '', 1, '2021-04-01 11:17:41'),
(19, 'Userajouté', 'testuseradd@gmail.com', '$2y$10$CJsbBYTM/BHenZbgaZEOKuWQgTPFmf8EGoPzx9q2A9WUrGGzqfGzO', '', 0, '2021-04-11 12:48:34'),
(20, 'testuser', 'tesus@user.com', '$2y$10$BHaPze587BhCuu5Dy0mUzezMxz.epovxCPEJuYTqA/KfuLn2XQrj2', '', 0, '2021-04-24 15:36:36'),
(21, 'Testbio', 'testbio@user.com', '$2y$10$Rc5h5.UQgVPAd2GGg5peMeCIiNuhTL7GIzj55Qeffeo61dJLlC.c6', '', 0, '2021-04-27 11:27:49'),
(23, 'aaa', 'aaa@aaa.fr', '$2y$10$qqLYD6DYoqyKGZvY9WrJc.MZyHutA7.b/Uu9U43J3BZSGtPcUZOF2', 'aaa', 0, '2021-04-27 11:52:40'),
(24, 'inscrit', 'ption@inscrit.fr', '$2y$10$AXMtvPVVABniuqEa9JE3EO2/VnUC7MdO9v8PlAyRLy46GP1J1MnkS', 'aze', 0, '2021-06-01 11:53:17');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories_users`
--
ALTER TABLE `categories_users`
  ADD CONSTRAINT `category_id_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `foreign users id key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
