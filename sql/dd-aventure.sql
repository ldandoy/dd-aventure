-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le : mar. 16 mai 2023 à 21:46
-- Version du serveur : 8.0.33
-- Version de PHP : 8.1.19

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id`, `zone_id`, `name`, `description`, `created`, `updated`, `active`) VALUES
(1, 1, 'Ville de Zukaramundi', NULL, '2023-05-15 21:52:03', '2023-05-15 21:52:03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230401155449', '2023-05-15 20:22:10', 85),
('DoctrineMigrations\\Version20230401155706', '2023-05-15 20:22:10', 15),
('DoctrineMigrations\\Version20230401161359', '2023-05-15 20:22:10', 21),
('DoctrineMigrations\\Version20230401162444', '2023-05-15 20:22:10', 33),
('DoctrineMigrations\\Version20230401215200', '2023-05-15 20:22:10', 79),
('DoctrineMigrations\\Version20230402191346', '2023-05-15 20:22:11', 164),
('DoctrineMigrations\\Version20230402191802', '2023-05-15 20:22:11', 72),
('DoctrineMigrations\\Version20230402191944', '2023-05-15 20:22:11', 81),
('DoctrineMigrations\\Version20230402192528', '2023-05-15 20:22:11', 119),
('DoctrineMigrations\\Version20230402192639', '2023-05-15 20:22:11', 54),
('DoctrineMigrations\\Version20230402205653', '2023-05-15 20:22:11', 109),
('DoctrineMigrations\\Version20230405124447', '2023-05-15 20:22:11', 205),
('DoctrineMigrations\\Version20230405125433', '2023-05-15 20:22:11', 150),
('DoctrineMigrations\\Version20230405141021', '2023-05-15 20:22:12', 138),
('DoctrineMigrations\\Version20230406145042', '2023-05-15 20:22:12', 17),
('DoctrineMigrations\\Version20230406145129', '2023-05-15 20:22:12', 10),
('DoctrineMigrations\\Version20230406203835', '2023-05-15 20:22:12', 19),
('DoctrineMigrations\\Version20230406210349', '2023-05-15 20:22:12', 98),
('DoctrineMigrations\\Version20230406210522', '2023-05-15 20:22:12', 86),
('DoctrineMigrations\\Version20230407074201', '2023-05-15 20:22:12', 20),
('DoctrineMigrations\\Version20230407075011', '2023-05-15 20:22:12', 134),
('DoctrineMigrations\\Version20230407201013', '2023-05-15 20:22:12', 134),
('DoctrineMigrations\\Version20230407201137', '2023-05-15 20:22:12', 29),
('DoctrineMigrations\\Version20230407204313', '2023-05-15 20:22:12', 130),
('DoctrineMigrations\\Version20230407211156', '2023-05-15 20:22:12', 18),
('DoctrineMigrations\\Version20230407212910', '2023-05-15 20:22:12', 30),
('DoctrineMigrations\\Version20230407213115', '2023-05-15 20:22:12', 136),
('DoctrineMigrations\\Version20230407221309', '2023-05-15 20:22:13', 18),
('DoctrineMigrations\\Version20230407221809', '2023-05-15 20:22:13', 43),
('DoctrineMigrations\\Version20230408210608', '2023-05-15 20:22:13', 29),
('DoctrineMigrations\\Version20230408210713', '2023-05-15 20:22:13', 132),
('DoctrineMigrations\\Version20230408212711', '2023-05-15 20:22:13', 18),
('DoctrineMigrations\\Version20230413200023', '2023-05-15 20:22:13', 128),
('DoctrineMigrations\\Version20230413203426', '2023-05-15 20:22:13', 96),
('DoctrineMigrations\\Version20230413203647', '2023-05-15 20:22:13', 13),
('DoctrineMigrations\\Version20230413205533', '2023-05-15 20:22:13', 103),
('DoctrineMigrations\\Version20230413210405', '2023-05-15 20:22:13', 16),
('DoctrineMigrations\\Version20230413212411', '2023-05-15 20:22:13', 13),
('DoctrineMigrations\\Version20230413221438', '2023-05-15 20:22:13', 101),
('DoctrineMigrations\\Version20230414210909', '2023-05-15 20:22:13', 21),
('DoctrineMigrations\\Version20230414211448', '2023-05-15 20:22:13', 18),
('DoctrineMigrations\\Version20230422125309', '2023-05-15 20:22:13', 19),
('DoctrineMigrations\\Version20230515182455', '2023-05-15 20:25:11', 51),
('DoctrineMigrations\\Version20230515184820', '2023-05-15 20:48:23', 49),
('DoctrineMigrations\\Version20230515185924', '2023-05-15 20:59:32', 31),
('DoctrineMigrations\\Version20230515190116', '2023-05-15 21:01:19', 58),
('DoctrineMigrations\\Version20230515191606', '2023-05-15 21:16:10', 69),
('DoctrineMigrations\\Version20230515193056', '2023-05-15 21:31:23', 73),
('DoctrineMigrations\\Version20230515193934', '2023-05-15 21:39:37', 78),
('DoctrineMigrations\\Version20230515194302', '2023-05-15 21:43:05', 94),
('DoctrineMigrations\\Version20230515194656', '2023-05-15 21:47:00', 71),
('DoctrineMigrations\\Version20230515195153', '2023-05-15 21:51:56', 54),
('DoctrineMigrations\\Version20230515195613', '2023-05-15 21:56:15', 68),
('DoctrineMigrations\\Version20230515195959', '2023-05-15 22:00:01', 61),
('DoctrineMigrations\\Version20230515205748', '2023-05-15 22:57:51', 67),
('DoctrineMigrations\\Version20230515210640', '2023-05-15 23:06:42', 48),
('DoctrineMigrations\\Version20230515211525', '2023-05-15 23:15:29', 55),
('DoctrineMigrations\\Version20230515212453', '2023-05-15 23:24:56', 40),
('DoctrineMigrations\\Version20230515212705', '2023-05-15 23:27:09', 136),
('DoctrineMigrations\\Version20230515212852', '2023-05-15 23:28:54', 28),
('DoctrineMigrations\\Version20230515212949', '2023-05-15 23:29:52', 51),
('DoctrineMigrations\\Version20230515214022', '2023-05-15 23:40:24', 64),
('DoctrineMigrations\\Version20230516212802', '2023-05-16 23:28:16', 38),
('DoctrineMigrations\\Version20230516212934', '2023-05-16 23:29:37', 27);

-- --------------------------------------------------------

--
-- Structure de la table `freak`
--

CREATE TABLE `freak` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puissance` int NOT NULL,
  `vitesse` int NOT NULL,
  `pdv` int NOT NULL,
  `dexterite` int NOT NULL,
  `charisme` int NOT NULL,
  `intelligence` int NOT NULL,
  `constitution` int NOT NULL,
  `sagesse` int NOT NULL,
  `xp` int NOT NULL,
  `gold` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `freak`
--

INSERT INTO `freak` (`id`, `name`, `puissance`, `vitesse`, `pdv`, `dexterite`, `charisme`, `intelligence`, `constitution`, `sagesse`, `xp`, `gold`, `active`, `created`, `updated`) VALUES
(1, 'Loup', 5, 7, 5, 15, 7, 10, 5, 8, 10, 5, 1, '2023-05-15 23:10:28', '2023-05-15 23:10:28');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `weight` double NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `weight`, `icon`, `created`, `updated`, `active`) VALUES
(1, 'Potion', 1, 0.5, NULL, '2023-05-15 21:18:21', '2023-05-15 23:21:30', 1);

-- --------------------------------------------------------

--
-- Structure de la table `item_place`
--

CREATE TABLE `item_place` (
  `item_id` int NOT NULL,
  `place_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `item_place`
--

INSERT INTO `item_place` (`item_id`, `place_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`id`, `name`, `created`, `updated`, `active`) VALUES
(1, 'Forgeront', '2023-05-15 21:40:20', '2023-05-15 21:40:20', 1),
(2, 'Marchand', '2023-05-15 21:40:28', '2023-05-15 21:40:28', 1);

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
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:41:\\\"registration/confirmation_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:167:\\\"http://127.0.0.1:8001/verify/email?expires=1684178572&signature=XiYVLaEfIcraljHHgRApzai%2FsbT6uwUEiHYaJbUyIiA%3D&token=YGwc%2Bb1fKKMJV8RQDqvyNr6ENCHG2kdnXBwiMt5ILg0%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:17:\\\"ldandoy@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:11:\\\"dd-aventure\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:17:\\\"ldandoy@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"Please Confirm your Email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-05-15 20:22:52', '2023-05-15 20:22:52', NULL),
(2, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":4:{i:0;s:41:\\\"registration/confirmation_email.html.twig\\\";i:1;N;i:2;a:3:{s:9:\\\"signedUrl\\\";s:165:\\\"http://127.0.0.1:8001/verify/email?expires=1684186056&signature=dvb%2FN85XWoROLaA2p9Lqv8fOYsrBw7vWkjEk1VNdpZI%3D&token=gA51qMUHPMKiRtJKYMy52i0hYkdWB0gHfJqLmsO3NAc%3D\\\";s:19:\\\"expiresAtMessageKey\\\";s:26:\\\"%count% hour|%count% hours\\\";s:20:\\\"expiresAtMessageData\\\";a:1:{s:7:\\\"%count%\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:17:\\\"ldandoy@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:11:\\\"dd-aventure\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:17:\\\"ldandoy@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:25:\\\"Please Confirm your Email\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2023-05-15 22:27:36', '2023-05-15 22:27:36', NULL);

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
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  `place_id` int DEFAULT NULL,
  `sagesse` int NOT NULL,
  `race_id` int DEFAULT NULL,
  `xp` int NOT NULL DEFAULT '0',
  `gold` int NOT NULL DEFAULT '0',
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `perso`
--

INSERT INTO `perso` (`id`, `name`, `puissance`, `vitesse`, `pdv`, `dexterite`, `charisme`, `intelligence`, `constitution`, `created`, `updated`, `user_id`, `place_id`, `sagesse`, `race_id`, `xp`, `gold`, `image_name`, `image_size`) VALUES
(2, 'Tron Gullis', 20, 4, 20, 14, 19, 18, 15, '2023-05-16 23:30:30', '2023-05-16 23:36:26', 2, 1, 15, 2, 0, 0, 'druid-2-6463f75a7b65b824455168.png', 1548718);

-- --------------------------------------------------------

--
-- Structure de la table `perso_item`
--

CREATE TABLE `perso_item` (
  `id` int NOT NULL,
  `perso_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `qte` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `perso_quest`
--

CREATE TABLE `perso_quest` (
  `perso_id` int NOT NULL,
  `quest_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE `place` (
  `id` int NOT NULL,
  `city_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_id` int DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`id`, `city_id`, `name`, `zone_id`, `description`, `active`, `created`, `updated`) VALUES
(1, 1, 'Forge', 1, '<div>Vous sentez l\'air chaud du feu, et entendez les bruits du marteaux rebondissant sur l\'acier</div>', 1, '2023-05-15 21:24:56', '2023-05-15 21:24:56'),
(2, NULL, 'Camps des chasseurs de loups', 1, '<div>Le camps est désert à cette heure de la nuit</div>', 1, '2023-05-15 21:24:56', '2023-05-15 21:24:56');

-- --------------------------------------------------------

--
-- Structure de la table `place_story`
--

CREATE TABLE `place_story` (
  `id` int NOT NULL,
  `type_id` int DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `place_story`
--

INSERT INTO `place_story` (`id`, `type_id`, `description`, `place_id`, `active`, `created`, `updated`) VALUES
(1, 1, '<div>Vous avancez dans la taïga, alors qui fait froid. Mais vous avez de la chance pour le moment personne ne vous attaque</div>', 2, 1, '2023-05-15 23:46:51', '2023-05-15 23:46:51');

-- --------------------------------------------------------

--
-- Structure de la table `place_story_type`
--

CREATE TABLE `place_story_type` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `place_story_type`
--

INSERT INTO `place_story_type` (`id`, `name`, `created`, `updated`, `active`) VALUES
(1, 'text', '2023-05-15 23:32:29', '2023-05-15 23:32:29', 1),
(2, 'test', '2023-05-15 23:32:32', '2023-05-15 23:32:50', 1),
(3, 'fight', '2023-05-15 23:32:39', '2023-05-15 23:32:39', 1);

-- --------------------------------------------------------

--
-- Structure de la table `place_test`
--

CREATE TABLE `place_test` (
  `id` int NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` int NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_successed` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_failed` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `xp` int NOT NULL,
  `place_story_id` int NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pnj`
--

CREATE TABLE `pnj` (
  `id` int NOT NULL,
  `city_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_id` int NOT NULL,
  `job_id` int DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pnj`
--

INSERT INTO `pnj` (`id`, `city_id`, `name`, `place_id`, `job_id`, `active`, `created`, `updated`) VALUES
(1, NULL, 'Tim Hul', 1, 1, 1, '2023-05-15 23:02:38', '2023-05-15 23:02:38');

-- --------------------------------------------------------

--
-- Structure de la table `quest`
--

CREATE TABLE `quest` (
  `id` int NOT NULL,
  `pnj_id` int DEFAULT NULL,
  `place_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xp` int NOT NULL,
  `item_id` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quest`
--

INSERT INTO `quest` (`id`, `pnj_id`, `place_id`, `name`, `xp`, `item_id`, `total`, `active`, `created`, `updated`) VALUES
(1, 1, 2, 'Les têtes de loups', 10, 1, 5, 1, '2023-05-15 23:04:19', '2023-05-15 23:04:19');

-- --------------------------------------------------------

--
-- Structure de la table `quest_step`
--

CREATE TABLE `quest_step` (
  `id` int NOT NULL,
  `quest_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quest_step`
--

INSERT INTO `quest_step` (`id`, `quest_id`, `name`, `description`, `active`, `created`, `updated`) VALUES
(1, 1, 'Allez au camps des chasseurs de loup', '<div>Vous devez vous rendre au camp des chasseurs de loup.</div>', 1, '2023-05-15 23:16:57', '2023-05-15 23:16:57'),
(2, 1, 'Vous devez tuez 10 loups et ramener leur tête', '<div>Vous devez récupérer 10 têtes de loups, afin de récupérer la récompense de la misson</div>', 1, '2023-05-15 23:17:48', '2023-05-15 23:17:48'),
(3, 1, 'Retournez auprès de', '<div>Elle vous donnera votre récompense si vous lui ramener les 10 têtes de loups</div>', 1, '2023-05-15 23:18:50', '2023-05-15 23:18:50');

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puissance` int NOT NULL,
  `vitesse` int NOT NULL,
  `dexterite` int NOT NULL,
  `charisme` int NOT NULL,
  `intelligence` int NOT NULL,
  `constitution` int NOT NULL,
  `sagesse` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id`, `name`, `puissance`, `vitesse`, `dexterite`, `charisme`, `intelligence`, `constitution`, `sagesse`, `created`, `updated`, `active`) VALUES
(1, 'Elfe', 10, 15, 15, 15, 12, 9, 12, '2023-05-15 20:50:14', '2023-05-15 21:00:20', 1),
(2, 'Humain', 10, 10, 10, 10, 10, 10, 10, '2023-05-15 20:51:39', '2023-05-15 21:00:22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `is_verified`, `username`, `active`, `created`, `updated`) VALUES
(2, 'ldandoy@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$8X9tsh7dhnQjgsoqFfC1uuKGdYgqe0mBC.yXKCLFkcdJROfX2OBda', 0, 'ldandoy', 1, '2023-05-15 22:27:36', '2023-05-15 22:27:36');

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`id`, `name`, `active`, `created`, `updated`) VALUES
(1, 'Zone de Zukaramundi', 1, '2023-05-15 21:48:12', '2023-05-15 21:48:12');

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
-- Index pour la table `freak`
--
ALTER TABLE `freak`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `item_place`
--
ALTER TABLE `item_place`
  ADD PRIMARY KEY (`item_id`,`place_id`),
  ADD KEY `IDX_5EBA481D126F525E` (`item_id`),
  ADD KEY `IDX_5EBA481DDA6A219` (`place_id`);

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
  ADD KEY `IDX_BD62FA21DA6A219` (`place_id`),
  ADD KEY `IDX_BD62FA216E59D40D` (`race_id`);

--
-- Index pour la table `perso_item`
--
ALTER TABLE `perso_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4D7C6AC91221E019` (`perso_id`),
  ADD KEY `IDX_4D7C6AC9126F525E` (`item_id`);

--
-- Index pour la table `perso_quest`
--
ALTER TABLE `perso_quest`
  ADD PRIMARY KEY (`perso_id`,`quest_id`),
  ADD KEY `IDX_5BF2D82F1221E019` (`perso_id`),
  ADD KEY `IDX_5BF2D82F209E9EF4` (`quest_id`);

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
-- Index pour la table `place_test`
--
ALTER TABLE `place_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_12CA0EE08006A7B5` (`place_story_id`);

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
  ADD KEY `IDX_4317F817DA6A219` (`place_id`),
  ADD KEY `IDX_4317F817126F525E` (`item_id`);

--
-- Index pour la table `quest_step`
--
ALTER TABLE `quest_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4DB352CE209E9EF4` (`quest_id`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `freak`
--
ALTER TABLE `freak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `perso`
--
ALTER TABLE `perso`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `perso_item`
--
ALTER TABLE `perso_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `place`
--
ALTER TABLE `place`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `place_story`
--
ALTER TABLE `place_story`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `place_story_type`
--
ALTER TABLE `place_story_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `place_test`
--
ALTER TABLE `place_test`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Contraintes pour la table `item_place`
--
ALTER TABLE `item_place`
  ADD CONSTRAINT `FK_5EBA481D126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5EBA481DDA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `perso`
--
ALTER TABLE `perso`
  ADD CONSTRAINT `FK_BD62FA216E59D40D` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`),
  ADD CONSTRAINT `FK_BD62FA21A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_BD62FA21DA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Contraintes pour la table `perso_item`
--
ALTER TABLE `perso_item`
  ADD CONSTRAINT `FK_4D7C6AC91221E019` FOREIGN KEY (`perso_id`) REFERENCES `perso` (`id`),
  ADD CONSTRAINT `FK_4D7C6AC9126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Contraintes pour la table `perso_quest`
--
ALTER TABLE `perso_quest`
  ADD CONSTRAINT `FK_5BF2D82F1221E019` FOREIGN KEY (`perso_id`) REFERENCES `perso` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5BF2D82F209E9EF4` FOREIGN KEY (`quest_id`) REFERENCES `quest` (`id`) ON DELETE CASCADE;

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
-- Contraintes pour la table `place_test`
--
ALTER TABLE `place_test`
  ADD CONSTRAINT `FK_12CA0EE08006A7B5` FOREIGN KEY (`place_story_id`) REFERENCES `place_story` (`id`);

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
  ADD CONSTRAINT `FK_4317F817126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `FK_4317F81751796E0B` FOREIGN KEY (`pnj_id`) REFERENCES `pnj` (`id`),
  ADD CONSTRAINT `FK_4317F817DA6A219` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`);

--
-- Contraintes pour la table `quest_step`
--
ALTER TABLE `quest_step`
  ADD CONSTRAINT `FK_4DB352CE209E9EF4` FOREIGN KEY (`quest_id`) REFERENCES `quest` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
