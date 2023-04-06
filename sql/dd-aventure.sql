-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le : jeu. 06 avr. 2023 à 21:24
-- Version du serveur : 8.0.29
-- Version de PHP : 8.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dd-aventure`
--

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `id` int NOT NULL,
  `zone_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id`, `zone_id`, `name`) VALUES
(3, 1, 'Zukaramundi');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230401155449', '2023-04-06 16:39:24', 49),
('DoctrineMigrations\\Version20230401155706', '2023-04-06 16:39:24', 8),
('DoctrineMigrations\\Version20230401161359', '2023-04-06 16:39:24', 13),
('DoctrineMigrations\\Version20230401162444', '2023-04-06 16:39:24', 19),
('DoctrineMigrations\\Version20230401215200', '2023-04-06 16:39:24', 46),
('DoctrineMigrations\\Version20230402191346', '2023-04-06 16:39:24', 96),
('DoctrineMigrations\\Version20230402191802', '2023-04-06 16:39:24', 39),
('DoctrineMigrations\\Version20230402191944', '2023-04-06 16:39:24', 56),
('DoctrineMigrations\\Version20230402192528', '2023-04-06 16:39:24', 67),
('DoctrineMigrations\\Version20230402192639', '2023-04-06 16:39:24', 12),
('DoctrineMigrations\\Version20230402205653', '2023-04-06 16:39:24', 80),
('DoctrineMigrations\\Version20230405124447', '2023-04-06 16:39:24', 129),
('DoctrineMigrations\\Version20230405125433', '2023-04-06 16:39:24', 100),
('DoctrineMigrations\\Version20230405141021', '2023-04-06 16:39:24', 126),
('DoctrineMigrations\\Version20230406145042', '2023-04-06 16:50:48', 67),
('DoctrineMigrations\\Version20230406145129', '2023-04-06 16:51:32', 31),
('DoctrineMigrations\\Version20230406203835', '2023-04-06 22:38:42', 33),
('DoctrineMigrations\\Version20230406210349', '2023-04-06 23:03:57', 84),
('DoctrineMigrations\\Version20230406210522', '2023-04-06 23:05:30', 92);

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`id`, `name`) VALUES
(1, 'Forgeron'),
(2, 'Marchand');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:41:\\\"registration/confirmation_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:171:\\\"http://127.0.0.1:8001/verify/email?expires=1680795578&signature=acuLdYqEN%2F%2FYoeFPhqvioR27bYv8F5CIMIBKPWH1M%2FY%3D&token=6rngPg71KOAKJn1yaSNLHGY7kx3m2o5h%2BBhvdSimXY8%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:17:\\\"ldandoy@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:11:\\\"dd-aventure\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:13:\\\"test@test.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"Please Confirm your Email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-04-06 16:39:38', '2023-04-06 16:39:38', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `perso`
--

CREATE TABLE `perso` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puissance` int NOT NULL,
  `vitesse` int NOT NULL,
  `pdv` int NOT NULL,
  `dexterite` int NOT NULL,
  `charisme` int NOT NULL,
  `intelligence` int NOT NULL,
  `constitution` int NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_id` int DEFAULT NULL,
  `place_id` int DEFAULT NULL,
  `sagesse` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `perso`
--

INSERT INTO `perso` (`id`, `name`, `puissance`, `vitesse`, `pdv`, `dexterite`, `charisme`, `intelligence`, `constitution`, `created`, `updated`, `user_id`, `place_id`, `sagesse`) VALUES
(1, 'Tron Gullis', 20, 10, 20, 15, 8, 13, 7, '2023-04-06 16:40:08', '2023-04-06 16:40:08', 1, 2, 15);

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE `place` (
  `id` int NOT NULL,
  `city_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_id` int DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`id`, `city_id`, `name`, `zone_id`, `description`) VALUES
(1, 3, 'Marcher', 1, NULL),
(2, 3, 'Forge', 1, NULL),
(3, NULL, 'Camps des loups', 1, 'Lorsque vous arrivez aux camps de loup. Il fait déjà nuit et la pluie continue à tomber.<br />\r\nVous savez que c\'est un endroit froid, et humide. <br />\r\nUn grand feu est maintenu en vie jour et nuit. Avant de partir de exploration, vous vous réchauffez les mains et reprenez des forces.');

-- --------------------------------------------------------

--
-- Structure de la table `place_story`
--

CREATE TABLE `place_story` (
  `id` int NOT NULL,
  `type_id` int DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `place_story`
--

INSERT INTO `place_story` (`id`, `type_id`, `description`, `place_id`) VALUES
(1, 1, 'Il n\'y a pas beaucoup de lumière, mais vous pouvez quand même avancer dans la lande brumeuse et humide', 3),
(2, 1, 'Vos habits sont trempés, plusieurs fois vous avez cru apercevoir la silhouette d\'un loup, mais ils ont peur de la lumière pour le moment.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `place_story_type`
--

CREATE TABLE `place_story_type` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `place_story_type`
--

INSERT INTO `place_story_type` (`id`, `name`) VALUES
(1, 'Text'),
(2, 'Test'),
(3, 'Combat'),
(4, 'Gold'),
(5, 'Object');

-- --------------------------------------------------------

--
-- Structure de la table `pnj`
--

CREATE TABLE `pnj` (
  `id` int NOT NULL,
  `city_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int NOT NULL,
  `job_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pnj`
--

INSERT INTO `pnj` (`id`, `city_id`, `name`, `place_id`, `job_id`) VALUES
(1, 3, 'Tim Gordon', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `quest`
--

CREATE TABLE `quest` (
  `id` int NOT NULL,
  `pnj_id` int DEFAULT NULL,
  `place_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quest`
--

INSERT INTO `quest` (`id`, `pnj_id`, `place_id`, `name`, `xp`) VALUES
(1, 1, 2, 'Chasseurs de loup', 100);

-- --------------------------------------------------------

--
-- Structure de la table `quest_step`
--

CREATE TABLE `quest_step` (
  `id` int NOT NULL,
  `quest_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quest_step`
--

INSERT INTO `quest_step` (`id`, `quest_id`, `name`, `description`) VALUES
(1, 1, 'Aider les chasseurs de loups', 'Vous voulez nous aider ? Très bien ! J\'ai entendu parlé de problème à la sortie de la ville, du côté du camps des loups.\r\nNos chasseurs ont été attaqué trois fois cette semaine !!\r\nRamenez moi 10 têtes de loups et vous aurez finis cette quête !');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`) VALUES
(1, 'test@test.com', '[]', '$2y$13$DHCVWRhlOyZJLOHHDiOHKuV3md2TgVtmuuD1EiW7KY7QSxuzMR6E2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_quest`
--

CREATE TABLE `user_quest` (
  `user_id` int NOT NULL,
  `quest_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_quest`
--

INSERT INTO `user_quest` (`user_id`, `quest_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`id`, `name`, `active`) VALUES
(1, 'Zukara', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D5B02349F2C3FAB` (`zone_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `perso`
--
ALTER TABLE `perso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BD62FA21A76ED395` (`user_id`),
  ADD KEY `IDX_BD62FA21DA6A219` (`place_id`);

--
-- Index pour la table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_741D53CD8BAC62AF` (`city_id`),
  ADD KEY `IDX_741D53CD9F2C3FAB` (`zone_id`);

--
-- Index pour la table `place_story`
--
ALTER TABLE `place_story`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_42201F1BC54C8C93` (`type_id`),
  ADD KEY `IDX_42201F1BDA6A219` (`place_id`);

--
-- Index pour la table `place_story_type`
--
ALTER TABLE `place_story_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pnj`
--
ALTER TABLE `pnj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FDA97F2D8BAC62AF` (`city_id`),
  ADD KEY `IDX_FDA97F2DDA6A219` (`place_id`),
  ADD KEY `IDX_FDA97F2DBE04EA9` (`job_id`);

--
-- Index pour la table `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4317F81751796E0B` (`pnj_id`),
  ADD KEY `IDX_4317F817DA6A219` (`place_id`);

--
-- Index pour la table `quest_step`
--
ALTER TABLE `quest_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4DB352CE209E9EF4` (`quest_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `user_quest`
--
ALTER TABLE `user_quest`
  ADD PRIMARY KEY (`user_id`,`quest_id`),
  ADD KEY `IDX_A1D5034FA76ED395` (`user_id`),
  ADD KEY `IDX_A1D5034F209E9EF4` (`quest_id`);

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `perso`
--
ALTER TABLE `perso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `place`
--
ALTER TABLE `place`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `place_story`
--
ALTER TABLE `place_story`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `place_story_type`
--
ALTER TABLE `place_story_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pnj`
--
ALTER TABLE `pnj`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `quest`
--
ALTER TABLE `quest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `quest_step`
--
ALTER TABLE `quest_step`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `FK_2D5B02349F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`);

--
-- Contraintes pour la table `perso`
--
ALTER TABLE `perso`
  ADD CONSTRAINT `FK_BD62FA21A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_BD62FA21DA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Contraintes pour la table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `FK_741D53CD8BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `FK_741D53CD9F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`);

--
-- Contraintes pour la table `place_story`
--
ALTER TABLE `place_story`
  ADD CONSTRAINT `FK_42201F1BC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `place_story_type` (`id`),
  ADD CONSTRAINT `FK_42201F1BDA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Contraintes pour la table `pnj`
--
ALTER TABLE `pnj`
  ADD CONSTRAINT `FK_FDA97F2D8BAC62AF` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `FK_FDA97F2DBE04EA9` FOREIGN KEY (`job_id`) REFERENCES `job` (`id`),
  ADD CONSTRAINT `FK_FDA97F2DDA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Contraintes pour la table `quest`
--
ALTER TABLE `quest`
  ADD CONSTRAINT `FK_4317F81751796E0B` FOREIGN KEY (`pnj_id`) REFERENCES `pnj` (`id`),
  ADD CONSTRAINT `FK_4317F817DA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Contraintes pour la table `quest_step`
--
ALTER TABLE `quest_step`
  ADD CONSTRAINT `FK_4DB352CE209E9EF4` FOREIGN KEY (`quest_id`) REFERENCES `quest` (`id`);

--
-- Contraintes pour la table `user_quest`
--
ALTER TABLE `user_quest`
  ADD CONSTRAINT `FK_A1D5034F209E9EF4` FOREIGN KEY (`quest_id`) REFERENCES `quest` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A1D5034FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
