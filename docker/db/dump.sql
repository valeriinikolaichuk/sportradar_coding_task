-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: symfony_new_mysql
-- Generation Time: Mar 26, 2026 at 05:46 PM
-- Wersja serwera: 8.4.7
-- Wersja PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `symfony_new`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `allowed_external_id`
--

CREATE TABLE `allowed_external_id` (
  `id` int NOT NULL,
  `competition_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `allowed_external_id`
--

INSERT INTO `allowed_external_id` (`id`, `competition_id`) VALUES
(1, 'afc-champions-league');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `competition`
--

CREATE TABLE `competition` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `season` varchar(20) NOT NULL,
  `_sport_id` int NOT NULL,
  `external_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `competition`
--

INSERT INTO `competition` (`id`, `name`, `season`, `_sport_id`, `external_id`) VALUES
(5, 'AFC Champions League', '2024', 1, 'afc-champions-league');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `country`
--

CREATE TABLE `country` (
  `code` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `country`
--

INSERT INTO `country` (`code`, `name`) VALUES
('IRN', 'Iran'),
('JPN', 'Japan'),
('KSA', 'Kingdom of Saudi Arabia'),
('QAT', 'Qatar'),
('UAE', 'United Arab Emirates'),
('UZB', 'Uzbekistan');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20260319172735', '2026-03-19 17:29:29', 222),
('DoctrineMigrations\\Version20260319184524', '2026-03-19 18:49:57', 833),
('DoctrineMigrations\\Version20260320115130', '2026-03-20 11:52:55', 388),
('DoctrineMigrations\\Version20260320122739', '2026-03-20 12:28:33', 917),
('DoctrineMigrations\\Version20260320134257', '2026-03-20 13:43:54', 1256),
('DoctrineMigrations\\Version20260320144316', '2026-03-20 14:44:07', 1107),
('DoctrineMigrations\\Version20260320154751', '2026-03-20 16:23:14', 396),
('DoctrineMigrations\\Version20260320164357', '2026-03-20 16:44:49', 1615),
('DoctrineMigrations\\Version20260320172916', '2026-03-20 17:30:25', 202),
('DoctrineMigrations\\Version20260320202842', '2026-03-20 20:29:58', 245),
('DoctrineMigrations\\Version20260321053501', '2026-03-21 05:35:56', 818),
('DoctrineMigrations\\Version20260321061318', '2026-03-21 06:14:26', 1041),
('DoctrineMigrations\\Version20260321090859', '2026-03-21 09:10:19', 813),
('DoctrineMigrations\\Version20260321093612', '2026-03-21 09:37:41', 107),
('DoctrineMigrations\\Version20260321184745', '2026-03-21 18:48:43', 3793),
('DoctrineMigrations\\Version20260324112128', '2026-03-24 11:22:28', 918),
('DoctrineMigrations\\Version20260324113751', '2026-03-24 11:56:02', 1423),
('DoctrineMigrations\\Version20260324114014', '2026-03-24 11:56:03', 52),
('DoctrineMigrations\\Version20260324114136', '2026-03-24 11:56:03', 63),
('DoctrineMigrations\\Version20260324115132', '2026-03-24 11:56:03', 47);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `event`
--

CREATE TABLE `event` (
  `id` int NOT NULL,
  `match_date` date NOT NULL,
  `status` enum('scheduled','played') NOT NULL,
  `home_score` int NOT NULL DEFAULT '0',
  `away_score` int NOT NULL DEFAULT '0',
  `_competition_id` int NOT NULL,
  `match_time` time DEFAULT NULL,
  `message` longtext,
  `goals` json DEFAULT NULL,
  `yellow_cards` json DEFAULT NULL,
  `second_yellow_cards` json DEFAULT NULL,
  `direct_red_cards` json DEFAULT NULL,
  `score_by_periods` json DEFAULT NULL,
  `_stage_id` int DEFAULT NULL,
  `_group_id` int DEFAULT NULL,
  `_stadium_id` int DEFAULT NULL,
  `_home_team_id` int DEFAULT NULL,
  `_away_team_id` int DEFAULT NULL,
  `_winner_team_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `event`
--

INSERT INTO `event` (`id`, `match_date`, `status`, `home_score`, `away_score`, `_competition_id`, `match_time`, `message`, `goals`, `yellow_cards`, `second_yellow_cards`, `direct_red_cards`, `score_by_periods`, `_stage_id`, `_group_id`, `_stadium_id`, `_home_team_id`, `_away_team_id`, `_winner_team_id`) VALUES
(1, '2024-01-03', 'played', 1, 2, 5, '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 2, NULL),
(3, '2024-01-03', 'scheduled', 0, 0, 5, '16:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 3, 4, NULL),
(4, '2024-01-04', 'scheduled', 0, 0, 5, '15:25:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 5, 6, NULL),
(5, '2024-01-04', 'scheduled', 0, 0, 5, '08:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 7, 8, NULL),
(6, '2024-01-19', 'scheduled', 0, 0, 5, '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, 9, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `external_api`
--

CREATE TABLE `external_api` (
  `id` int NOT NULL,
  `api_name` varchar(50) NOT NULL,
  `competition_id_key` varchar(50) NOT NULL,
  `competition_name_key` varchar(150) DEFAULT NULL,
  `winner_key` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `external_api`
--

INSERT INTO `external_api` (`id`, `api_name`, `competition_id_key`, `competition_name_key`, `winner_key`) VALUES
(1, 'sportradar', 'originCompetitionId', 'originCompetitionName', 'winnerId');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `_stage_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `group_standing`
--

CREATE TABLE `group_standing` (
  `id` int NOT NULL,
  `position` int DEFAULT NULL,
  `_team_id` int NOT NULL,
  `_group_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sports`
--

CREATE TABLE `sports` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `sports`
--

INSERT INTO `sports` (`id`, `name`) VALUES
(1, 'football');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stadium`
--

CREATE TABLE `stadium` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `_country_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stage`
--

CREATE TABLE `stage` (
  `id` int NOT NULL,
  `external_id` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ordering` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `stage`
--

INSERT INTO `stage` (`id`, `external_id`, `name`, `ordering`) VALUES
(1, 'ROUND OF 16', 'ROUND OF 16', 4),
(2, 'FINAL', 'FINAL', 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE `team` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `official_name` varchar(150) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `abbreviation` varchar(10) DEFAULT NULL,
  `_country_code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Zrzut danych tabeli `team`
--

INSERT INTO `team` (`id`, `name`, `official_name`, `slug`, `abbreviation`, `_country_code`) VALUES
(1, 'Al Shabab', 'Al Shabab FС', 'al-shabab-fc', 'SHA', 'KSA'),
(2, 'Nasaf', 'FC Nasaf', 'fc-nasaf-qarshi', 'NAS', 'UZB'),
(3, 'Al Hilal', 'Al Hilal Saudi FC', 'al-hilal-saudi-fc', 'HIL', 'KSA'),
(4, 'Shabab Al Ahli', 'SHABAB AL AHLI DUBAI', 'shabab-al-ahli-club', 'SAH', 'UAE'),
(5, 'Al Duhail', 'AL DUHAIL SC', 'al-duhail-sc', 'DUH', 'QAT'),
(6, 'Al Rayyan', 'AL RAYYAN SC', 'al-rayyan-sc', 'RYN', 'QAT'),
(7, 'Al Faisaly', 'Al Faisaly FC', 'al-faisaly-fc', 'FAI', 'KSA'),
(8, 'Foolad', 'FOOLAD KHOUZESTAN FC', 'foolad-khuzestan-fc', 'FLD', 'IRN'),
(9, 'Urawa Reds', 'Urawa Red Diamonds', 'urawa-red-diamonds', 'RED', 'JPN');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `allowed_external_id`
--
ALTER TABLE `allowed_external_id`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B50A2CB19F75D7B0` (`external_id`),
  ADD KEY `IDX_B50A2CB182B8F998` (`_sport_id`);

--
-- Indeksy dla tabeli `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indeksy dla tabeli `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indeksy dla tabeli `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3BAE0AA7A7408E9D` (`_competition_id`),
  ADD KEY `IDX_3BAE0AA7C5894F3` (`_stage_id`),
  ADD KEY `IDX_3BAE0AA7D0949C27` (`_group_id`),
  ADD KEY `IDX_3BAE0AA71DCDFE4E` (`_stadium_id`),
  ADD KEY `IDX_3BAE0AA7C617715F` (`_home_team_id`),
  ADD KEY `IDX_3BAE0AA71F433FAB` (`_away_team_id`),
  ADD KEY `IDX_3BAE0AA7195A2D8E` (`_winner_team_id`);

--
-- Indeksy dla tabeli `external_api`
--
ALTER TABLE `external_api`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F06D3970C5894F3` (`_stage_id`);

--
-- Indeksy dla tabeli `group_standing`
--
ALTER TABLE `group_standing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_68AAC6A75D2439D3` (`_team_id`),
  ADD KEY `IDX_68AAC6A7D0949C27` (`_group_id`);

--
-- Indeksy dla tabeli `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E604044FAA7DD9D5` (`_country_code`);

--
-- Indeksy dla tabeli `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C4E0A61F989D9B62` (`slug`),
  ADD KEY `IDX_C4E0A61FAA7DD9D5` (`_country_code`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `allowed_external_id`
--
ALTER TABLE `allowed_external_id`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `competition`
--
ALTER TABLE `competition`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `event`
--
ALTER TABLE `event`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `external_api`
--
ALTER TABLE `external_api`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `group_standing`
--
ALTER TABLE `group_standing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `stadium`
--
ALTER TABLE `stadium`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `team`
--
ALTER TABLE `team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `FK_B50A2CB182B8F998` FOREIGN KEY (`_sport_id`) REFERENCES `sports` (`id`);

--
-- Ograniczenia dla tabeli `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_3BAE0AA7195A2D8E` FOREIGN KEY (`_winner_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_3BAE0AA71DCDFE4E` FOREIGN KEY (`_stadium_id`) REFERENCES `stadium` (`id`),
  ADD CONSTRAINT `FK_3BAE0AA71F433FAB` FOREIGN KEY (`_away_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_3BAE0AA7A7408E9D` FOREIGN KEY (`_competition_id`) REFERENCES `competition` (`id`),
  ADD CONSTRAINT `FK_3BAE0AA7C5894F3` FOREIGN KEY (`_stage_id`) REFERENCES `stage` (`id`),
  ADD CONSTRAINT `FK_3BAE0AA7C617715F` FOREIGN KEY (`_home_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_3BAE0AA7D0949C27` FOREIGN KEY (`_group_id`) REFERENCES `groups` (`id`);

--
-- Ograniczenia dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `FK_F06D3970C5894F3` FOREIGN KEY (`_stage_id`) REFERENCES `stage` (`id`);

--
-- Ograniczenia dla tabeli `group_standing`
--
ALTER TABLE `group_standing`
  ADD CONSTRAINT `FK_68AAC6A75D2439D3` FOREIGN KEY (`_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_68AAC6A7D0949C27` FOREIGN KEY (`_group_id`) REFERENCES `groups` (`id`);

--
-- Ograniczenia dla tabeli `stadium`
--
ALTER TABLE `stadium`
  ADD CONSTRAINT `FK_E604044FAA7DD9D5` FOREIGN KEY (`_country_code`) REFERENCES `country` (`code`);

--
-- Ograniczenia dla tabeli `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FK_C4E0A61FAA7DD9D5` FOREIGN KEY (`_country_code`) REFERENCES `country` (`code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
