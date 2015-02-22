-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2014 at 01:14 AM
-- Server version: 5.5.37
-- PHP Version: 5.4.4-14+deb7u10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `sl_blog_categories`
--

CREATE TABLE IF NOT EXISTS `sl_blog_categories` (
  `blogCategoryId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc kategorije.',
  `name` varchar(255) NOT NULL COMMENT 'Naziv kategorije.',
  `urlLink` varchar(255) NOT NULL COMMENT 'URL link kategorije.',
  PRIMARY KEY (`blogCategoryId`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `urlLink_UNIQUE` (`urlLink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja predstavlja kategorije bloga.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_blog_post`
--

CREATE TABLE IF NOT EXISTS `sl_blog_post` (
  `blogPostId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc posta bloga.',
  `urlLink` varchar(255) NOT NULL COMMENT 'URL posta bloga (format: ovo-je-link).',
  `name` varchar(255) NOT NULL COMMENT 'Naziv post-a.',
  `shortText` text NOT NULL COMMENT 'Kratki (summary) tekst post-a.',
  `fullText` text NOT NULL COMMENT 'Puni tekst post-a.',
  `entryDate` bigint(21) DEFAULT NULL COMMENT 'UNIX timestamp post-a.',
  `isVisible` int(1) NOT NULL DEFAULT '1',
  `authorId` int(11) NOT NULL COMMENT 'Strani kljuc koji predstavlja autora post-a.',
  `tags` text COMMENT 'Predstavlja tagove posta blog-a.',
  PRIMARY KEY (`blogPostId`),
  UNIQUE KEY `urlLink_UNIQUE` (`urlLink`),
  KEY `blog_post_fid_ind` (`authorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve postove jednog blog-a.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_blog_post_in_category`
--

CREATE TABLE IF NOT EXISTS `sl_blog_post_in_category` (
  `blogPostFid` int(11) NOT NULL COMMENT 'Strani kljuc koji predstavlja post bloga.',
  `blogCategoryFid` int(11) NOT NULL COMMENT 'Strani kljuc koji predstavlja kategoriju bloga.',
  PRIMARY KEY (`blogPostFid`,`blogCategoryFid`),
  KEY `blog_category_fid_ind` (`blogCategoryFid`),
  KEY `blog_post_fid_ind` (`blogPostFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja predstavlja koji post pripada kojoj kategoriji.';

-- --------------------------------------------------------

--
-- Table structure for table `sl_blog_tags`
--

CREATE TABLE IF NOT EXISTS `sl_blog_tags` (
  `blogTagId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc tag-a.',
  `tag` varchar(255) NOT NULL COMMENT 'Tag',
  PRIMARY KEY (`blogTagId`),
  UNIQUE KEY `tag_UNIQUE` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve tagove postova.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_cv_export_formats`
--

CREATE TABLE IF NOT EXISTS `sl_cv_export_formats` (
  `exportFormatId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarnog kljuca tipa eksportovanog fajla.',
  `name` varchar(255) NOT NULL COMMENT 'Ime formata u koji CV moze biti exportovan.',
  `formatterAction` varchar(255) NOT NULL COMMENT 'Ime akcije formatera koja ce biti pozvana pri eksportu CV-a.',
  `formatIconFid` int(11) DEFAULT NULL COMMENT 'Strani kljuc ikone formatera.',
  `formatterFields` text NOT NULL COMMENT 'JSON podaci sa formatom kljuc : vrednost koji sadrze podatke o poljima u formateru koji ce biti koristeni.',
  PRIMARY KEY (`exportFormatId`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `export_format_ind` (`formatIconFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve eksport formate CV-a.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_link_group_has_links`
--

CREATE TABLE IF NOT EXISTS `sl_link_group_has_links` (
  `linkGroupId` int(11) NOT NULL,
  `linkId` int(11) NOT NULL,
  PRIMARY KEY (`linkGroupId`,`linkId`),
  KEY `link_ind` (`linkId`),
  KEY `link_group_ind` (`linkGroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi informacije koji link pripada kojoj grupi';

-- --------------------------------------------------------

--
-- Table structure for table `sl_link_groups`
--

CREATE TABLE IF NOT EXISTS `sl_link_groups` (
  `linkGroupId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc grupe linkova.',
  `name` varchar(255) NOT NULL COMMENT 'Ime grupe linkova.',
  `userFid` int(11) NOT NULL COMMENT 'Strani kljuc korisnika kojem grupa linkova pripada.',
  PRIMARY KEY (`linkGroupId`),
  KEY `group_owner_ind` (`userFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi podatke o grupi linkova.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_links`
--

CREATE TABLE IF NOT EXISTS `sl_links` (
  `linkId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc linka.',
  `name` varchar(255) NOT NULL COMMENT 'Ime linka.',
  `link` varchar(255) NOT NULL COMMENT 'Link na koji vodi.',
  `directRedirectUrl` varchar(45) NOT NULL COMMENT 'Redirekt url, izvucen iz imena na formatiran nacin (primjer: ovo-je-link) pomocu kojeg se putem redirect kontrolera moze ici direkno na stranicu.',
  PRIMARY KEY (`linkId`),
  UNIQUE KEY `directRedirectUrl_UNIQUE` (`directRedirectUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve linkove.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_pastebin`
--

CREATE TABLE IF NOT EXISTS `sl_pastebin` (
  `pastebinId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc pastebin-a.',
  `title` varchar(255) NOT NULL COMMENT 'Naslov paste-a.',
  `pasteData` text NOT NULL COMMENT 'Podaci paste-a.',
  `canExpire` int(1) NOT NULL DEFAULT '0' COMMENT 'Vrijednost da li ovaj paste moze isteci:',
  `expireTimestamp` bigint(21) NOT NULL COMMENT 'UNIX timestamp kada paste istice.',
  `isPrivate` int(1) NOT NULL DEFAULT '0',
  `usersFid` int(11) NOT NULL COMMENT 'Strani kljuc za korisnika vlasnika paste-a.',
  `langFid` int(11) NOT NULL COMMENT 'ID jezika paste-a.',
  PRIMARY KEY (`pastebinId`),
  KEY `author_user_ind` (`usersFid`),
  KEY `lang_ind` (`langFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve paste-ove.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_pastebin_lang`
--

CREATE TABLE IF NOT EXISTS `sl_pastebin_lang` (
  `pastebinLangId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc jezika pastebin-a.',
  `name` varchar(30) NOT NULL COMMENT 'Ime jezika.',
  `formatData` text NOT NULL COMMENT 'Podaci za formatiranje teksta (za Codemirror).',
  PRIMARY KEY (`pastebinLangId`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi informacije o jezicima pastebin-a.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_project_has_links`
--

CREATE TABLE IF NOT EXISTS `sl_project_has_links` (
  `projectFid` int(11) NOT NULL COMMENT 'Strani kljuc projekta.',
  `projectLinkFid` int(11) NOT NULL COMMENT 'Strani kljuc linka projekta.',
  PRIMARY KEY (`projectFid`,`projectLinkFid`),
  KEY `project_link_ind` (`projectLinkFid`),
  KEY `project_ind` (`projectFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi informacije koji projekat ima koje linkov';

-- --------------------------------------------------------

--
-- Table structure for table `sl_project_links`
--

CREATE TABLE IF NOT EXISTS `sl_project_links` (
  `projectLinkId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID linka projekta.',
  `name` varchar(255) NOT NULL COMMENT 'Ime linka od projekta.',
  `link` varchar(255) NOT NULL COMMENT 'Link do projekta.',
  PRIMARY KEY (`projectLinkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve linkove projekata (github, svn, stran' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_projects`
--

CREATE TABLE IF NOT EXISTS `sl_projects` (
  `projectId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc projekta',
  `name` varchar(255) NOT NULL COMMENT 'Ime projekta.',
  `description` text NOT NULL COMMENT 'Opis projekta.',
  `entryDate` bigint(21) NOT NULL COMMENT 'Datum kreiranja projekta.',
  `startDate` bigint(21) NOT NULL COMMENT 'Datum pocetka izrade projekta.',
  `etaDate` bigint(21) NOT NULL COMMENT 'Datum kraja izrade projekta.',
  `priceEstimate` bigint(21) DEFAULT NULL COMMENT 'Cijena projekta.',
  PRIMARY KEY (`projectId`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadzi sve projekte softlaba.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_team_in_project`
--

CREATE TABLE IF NOT EXISTS `sl_team_in_project` (
  `teamFid` int(11) NOT NULL COMMENT 'Strani kljuc tima.',
  `projectFid` int(11) NOT NULL COMMENT 'Strani kljuc projekta.',
  PRIMARY KEY (`teamFid`,`projectFid`),
  KEY `project_ind` (`projectFid`),
  KEY `team_ind` (`teamFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja pokazuje koji tim je u kojem projektu.';

-- --------------------------------------------------------

--
-- Table structure for table `sl_teams`
--

CREATE TABLE IF NOT EXISTS `sl_teams` (
  `teamId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarnog kljuca tima.',
  `name` varchar(255) NOT NULL COMMENT 'Naziv tima',
  `entryDate` bigint(21) NOT NULL COMMENT 'Timestamp (UNIX) kreiranja tima.',
  `description` text COMMENT 'Opis tima.',
  `createdByUserFid` int(11) NOT NULL COMMENT 'Strani kljuc korisnika koji je napravio tim.',
  `teamLeaderId` int(11) NOT NULL COMMENT 'Strani kljuc korisnika koji je vodja tima.',
  `teamImageId` int(11) DEFAULT NULL COMMENT 'ID uploadovane slike tima.',
  PRIMARY KEY (`teamId`),
  KEY `team_created_by_user_id` (`createdByUserFid`),
  KEY `team_icon_id` (`teamImageId`),
  KEY `team_lead_id` (`teamLeaderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve timove.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_thinking_thursday`
--

CREATE TABLE IF NOT EXISTS `sl_thinking_thursday` (
  `ttId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Primarni kljuc ovog Thinking Thursday unosa.',
  `topicName` varchar(255) NOT NULL COMMENT 'Naziv teme Thinking Thursday-a.',
  `eventDate` bigint(21) NOT NULL COMMENT 'UNIX timestamp datuma thinking thursday-a.',
  `abstract` text NOT NULL COMMENT 'Abstrakt tekst thinking thursday-a.',
  PRIMARY KEY (`ttId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi informacije o pojedinom Thinking Thursday' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_thinking_thursday_has_files`
--

CREATE TABLE IF NOT EXISTS `sl_thinking_thursday_has_files` (
  `ttFid` int(11) NOT NULL,
  `uploadFid` int(11) NOT NULL,
  PRIMARY KEY (`ttFid`,`uploadFid`),
  KEY `uploaded_file_tt_ind` (`uploadFid`),
  KEY `relation_tt_ind` (`ttFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve uploadovane fajlove vezane za ovaj Th';

-- --------------------------------------------------------

--
-- Table structure for table `sl_thinking_thursday_has_hosts`
--

CREATE TABLE IF NOT EXISTS `sl_thinking_thursday_has_hosts` (
  `ttFid` int(11) NOT NULL COMMENT 'Strani kljuc koji predstavlja Thinking Thursday na koji se odnosi.',
  `ttHostFid` int(11) NOT NULL COMMENT 'Strani kljuc hosta ovog thinking thursday-a.',
  PRIMARY KEY (`ttFid`,`ttHostFid`),
  KEY `tt_host_fid_ind` (`ttHostFid`),
  KEY `tt_fid_ind` (`ttFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi koji host pripada kojem Thinking Thursday';

-- --------------------------------------------------------

--
-- Table structure for table `sl_thinking_thursday_hosts`
--

CREATE TABLE IF NOT EXISTS `sl_thinking_thursday_hosts` (
  `ttHostId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc hosta thinking thursday-a.',
  `fullName` varchar(70) NOT NULL COMMENT 'Naziv ovog hosta.',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email host-a.',
  `facebookLink` varchar(255) DEFAULT NULL COMMENT 'Facebook link.',
  `twitterLink` varchar(255) DEFAULT NULL COMMENT 'Twitter link.',
  `linkedInLink` varchar(255) DEFAULT NULL COMMENT 'LinkedIn link.',
  `googlePlusLink` varchar(255) DEFAULT NULL COMMENT 'Google+ link.',
  `aboutMeLink` varchar(255) DEFAULT NULL COMMENT 'about.me link',
  `hostMemberFid` int(11) DEFAULT NULL COMMENT 'ID korisnika clana softlaba kao Host-a (ako ga ima).',
  PRIMARY KEY (`ttHostId`),
  KEY `tt_host_ind` (`hostMemberFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_thinking_thursday_related`
--

CREATE TABLE IF NOT EXISTS `sl_thinking_thursday_related` (
  `originTTFid` int(11) NOT NULL COMMENT 'Strani kljuc Thinking thursday-a koji predstavlja izvor veze.',
  `relatedTTFid` int(11) NOT NULL COMMENT 'Strani kljuc thinking thursday-a na koji je izvorni TT povezan.',
  `relationType` int(11) NOT NULL COMMENT 'Strani kljuc relacije prema thinking thursday-a.',
  PRIMARY KEY (`originTTFid`,`relatedTTFid`),
  KEY `related_tt_ind` (`relatedTTFid`),
  KEY `origin_tt_ind` (`originTTFid`),
  KEY `relation_type_ind` (`relationType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja predstavlja koji Thinking Thursday je povezan sa';

-- --------------------------------------------------------

--
-- Table structure for table `sl_transactions`
--

CREATE TABLE IF NOT EXISTS `sl_transactions` (
  `transactionId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc transakcija',
  `name` varchar(255) NOT NULL COMMENT 'Ime transakcije.',
  `timestamp` bigint(21) NOT NULL COMMENT 'Vrijeme transakcije.',
  `amount` float NOT NULL COMMENT 'Iznos transakcije.',
  `description` text NOT NULL COMMENT 'Opis transakcije.',
  `userId` int(11) NOT NULL COMMENT 'Korisnik koji je unjeo transakciju.',
  PRIMARY KEY (`transactionId`),
  KEY `created_user_ind` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve transakcije.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_tt_relation_type`
--

CREATE TABLE IF NOT EXISTS `sl_tt_relation_type` (
  `relationTypeId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc tipa relacije.',
  `relationName` varchar(40) NOT NULL COMMENT 'Naziv relacije.',
  PRIMARY KEY (`relationTypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela tipova relacija jednog thinking thursday-a od drugog.' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sl_tt_relation_type`
--

INSERT INTO `sl_tt_relation_type` (`relationTypeId`, `relationName`) VALUES
(1, 'Nastavak na prijašnji.'),
(2, 'Prethodi sledeći.'),
(3, 'Dodatne informacije.');

-- --------------------------------------------------------

--
-- Table structure for table `sl_uploads`
--

CREATE TABLE IF NOT EXISTS `sl_uploads` (
  `uploadsId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID uploadovanih fajlova',
  `fullpath` varchar(255) NOT NULL COMMENT 'Puna putanja fajla sa imenom fajla.',
  PRIMARY KEY (`uploadsId`),
  UNIQUE KEY `fullpath_UNIQUE` (`fullpath`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve uploadovane fajlove.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sl_user_data`
--

CREATE TABLE IF NOT EXISTS `sl_user_data` (
  `userDataId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc korisnickih podataka.',
  `firstName` varchar(30) DEFAULT NULL COMMENT 'Ime korisnika.',
  `lastName` varchar(30) DEFAULT NULL COMMENT 'Prezime korisnika.',
  `registrationDate` bigint(21) NOT NULL COMMENT 'Datum registracije korisnika (UNIX timestamp).',
  `lastLoginDate` bigint(21) DEFAULT NULL COMMENT 'Datum zadnjeg logina korisnika (UNIX timestamp).',
  `lastLoginIP` varchar(80) DEFAULT NULL COMMENT 'IP iz zadnjeg logina korisnika.',
  `avatarUploadFid` int(11) DEFAULT NULL COMMENT 'Strani kljuc uploadovanog avatara.',
  `facebookLink` varchar(255) DEFAULT NULL COMMENT 'Facebook link.',
  `twitterLink` varchar(255) DEFAULT NULL COMMENT 'Twitter link.',
  `linkedInLink` varchar(255) DEFAULT NULL COMMENT 'LinkedIn link.',
  `googlePlusLink` varchar(255) DEFAULT NULL COMMENT 'Google+ link.',
  `aboutMeLink` varchar(255) DEFAULT NULL COMMENT 'about.me link',
  PRIMARY KEY (`userDataId`),
  UNIQUE KEY `avatarUploadId_UNIQUE` (`avatarUploadFid`),
  KEY `avatar_upload_ind` (`avatarUploadFid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela koja predstavlja podatke o korisnicima.' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sl_user_data`
--

INSERT INTO `sl_user_data` (`userDataId`, `firstName`, `lastName`, `registrationDate`, `lastLoginDate`, `lastLoginIP`, `avatarUploadFid`, `facebookLink`, `twitterLink`, `linkedInLink`, `googlePlusLink`, `aboutMeLink`) VALUES
(1, 'Admin', 'Administratovic', 0, 1402439498, '127.0.0.1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sl_user_data_has_cv_data`
--

CREATE TABLE IF NOT EXISTS `sl_user_data_has_cv_data` (
  `userDataFid` int(11) NOT NULL COMMENT 'Strani kljuc korisnickih podataka.',
  `userDataCvFid` int(11) NOT NULL COMMENT 'Strani kljuc CV-a.',
  PRIMARY KEY (`userDataFid`,`userDataCvFid`),
  KEY `user_has_cv_ind` (`userDataCvFid`),
  KEY `user_data_ind` (`userDataFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja predstavlja informacije koji korisnik ima koji C';

-- --------------------------------------------------------

--
-- Table structure for table `sl_user_groups`
--

CREATE TABLE IF NOT EXISTS `sl_user_groups` (
  `userGroupId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID korisnicke grupe.',
  `name` varchar(255) NOT NULL DEFAULT 'Unknown group' COMMENT 'Naziv grupe.',
  `frontendAccess` text NOT NULL COMMENT 'Sadrzi informacije u JSON formatu koje sadrze vrednosti kljuc : vrijednost pomocu kojih se vidi kojim frontend djelovima ova grupa pristup.',
  `backendAccess` text NOT NULL COMMENT 'Sadrzi informacije u JSON formatu koje sadrze vrednosti kljuc : vrijednost pomocu kojih se vidi kojim backend admin djelovima ova grupa pristup.',
  PRIMARY KEY (`userGroupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela koja predstavlja korisnicke grupe.' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sl_user_groups`
--

INSERT INTO `sl_user_groups` (`userGroupId`, `name`, `frontendAccess`, `backendAccess`) VALUES
(1, 'Bez pristupa', '{}', '{}'),
(2, 'Junior', '{}', '{\r\n"blog":\r\n[{"0":"allow","actions":["index","view","create"],"users":["@"]}]\r\n}'),
(3, 'Senior', '{}', '{}'),
(4, 'Administrator', '{"allow":"all"}\r\n', '{"allow":"all"}'),
(5, 'Moderator', '{}', '{}');

-- --------------------------------------------------------

--
-- Table structure for table `sl_user_in_team`
--

CREATE TABLE IF NOT EXISTS `sl_user_in_team` (
  `usersFid` int(11) NOT NULL,
  `teamFid` int(11) NOT NULL,
  PRIMARY KEY (`usersFid`,`teamFid`),
  KEY `users_team_ind` (`teamFid`),
  KEY `users_in_ind` (`usersFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi sve informacije koji je korisnik u kojem ';

-- --------------------------------------------------------

--
-- Table structure for table `sl_users`
--

CREATE TABLE IF NOT EXISTS `sl_users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primarni kljuc identifikator korisnika.',
  `email` varchar(255) NOT NULL COMMENT 'Email korisnika. Koristi se kao korisnicko ime.',
  `password` varchar(128) NOT NULL COMMENT 'Hashovana lozinka korisnika u formi:',
  `salt` char(12) NOT NULL COMMENT 'Random znakovi za saltovanje sifre.',
  `logoutKey` varchar(128) DEFAULT NULL COMMENT 'Kljuc za izlogovanje korisnika (anti-CSRF).',
  `isActivated` int(1) NOT NULL DEFAULT '0' COMMENT 'Vrednost da li je korisnik aktivan (0 - ne, 1 - da).',
  `isLoggedIn` int(1) NOT NULL COMMENT 'Vrijednost da li je korisnik ulogovan.',
  `userDataFid` int(11) NOT NULL COMMENT 'Strani kljuc na korisnicke podatke.',
  `userGroupFid` int(11) NOT NULL COMMENT 'Strani kljuc korisnicke grupe.',
  PRIMARY KEY (`usersId`),
  UNIQUE KEY `username_UNIQUE` (`email`),
  KEY `user_data_ind` (`userDataFid`),
  KEY `user_group_ind` (`userGroupFid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela koja predstavlja korisnike.' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sl_users`
--

INSERT INTO `sl_users` (`usersId`, `email`, `password`, `salt`, `logoutKey`, `isActivated`, `isLoggedIn`, `userDataFid`, `userGroupFid`) VALUES
(1, 'a@dm.in', '2176179c12e102627261bd40a5be8dce', 'skbvux29rpar', NULL, 1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sl_users_cv_data`
--

CREATE TABLE IF NOT EXISTS `sl_users_cv_data` (
  `usersCvDataId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID primarni kljuc CV podataka korisnika.',
  `imageFid` int(11) DEFAULT NULL COMMENT 'ID uploadovanog fajla slike portofolija.',
  `exportFormatFid` int(11) NOT NULL COMMENT 'Strani kljuc formatera eksportovanog CV-a.',
  `data` text NOT NULL COMMENT 'JSON podaci sa formatom kljuc : vrednost koji sadrze podatke iz CV-a. Kljucevi sa vrednostima se uzimaju iz formatera.',
  PRIMARY KEY (`usersCvDataId`),
  KEY `image_upload_ind` (`imageFid`),
  KEY `export_format_ind` (`exportFormatFid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela koja sadrzi podatke za CV.' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sl_blog_post`
--
ALTER TABLE `sl_blog_post`
  ADD CONSTRAINT `blog_post_fid_fk_id` FOREIGN KEY (`authorId`) REFERENCES `sl_users` (`usersId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_blog_post_in_category`
--
ALTER TABLE `sl_blog_post_in_category`
  ADD CONSTRAINT `blog_post_refers_to_fid_fk_id` FOREIGN KEY (`blogPostFid`) REFERENCES `sl_blog_post` (`blogPostId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `blog_category_belongs_to_fid_fk_id` FOREIGN KEY (`blogCategoryFid`) REFERENCES `sl_blog_categories` (`blogCategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_cv_export_formats`
--
ALTER TABLE `sl_cv_export_formats`
  ADD CONSTRAINT `export_format_fk_id` FOREIGN KEY (`formatIconFid`) REFERENCES `sl_uploads` (`uploadsId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_link_group_has_links`
--
ALTER TABLE `sl_link_group_has_links`
  ADD CONSTRAINT `link_group_fk_id` FOREIGN KEY (`linkGroupId`) REFERENCES `sl_link_groups` (`linkGroupId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `link_fk_id` FOREIGN KEY (`linkId`) REFERENCES `sl_links` (`linkId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_link_groups`
--
ALTER TABLE `sl_link_groups`
  ADD CONSTRAINT `group_owner_fk_id` FOREIGN KEY (`userFid`) REFERENCES `sl_users` (`usersId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_pastebin`
--
ALTER TABLE `sl_pastebin`
  ADD CONSTRAINT `author_user_fk_id` FOREIGN KEY (`usersFid`) REFERENCES `sl_users` (`usersId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lang_fk_id` FOREIGN KEY (`langFid`) REFERENCES `sl_pastebin_lang` (`pastebinLangId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_project_has_links`
--
ALTER TABLE `sl_project_has_links`
  ADD CONSTRAINT `project_fk_id` FOREIGN KEY (`projectFid`) REFERENCES `sl_projects` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `project_link_fk_id` FOREIGN KEY (`projectLinkFid`) REFERENCES `sl_project_links` (`projectLinkId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_team_in_project`
--
ALTER TABLE `sl_team_in_project`
  ADD CONSTRAINT `team_id_fk` FOREIGN KEY (`teamFid`) REFERENCES `sl_teams` (`teamId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `project_id_fk` FOREIGN KEY (`projectFid`) REFERENCES `sl_projects` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_teams`
--
ALTER TABLE `sl_teams`
  ADD CONSTRAINT `team_user_fk_id` FOREIGN KEY (`createdByUserFid`) REFERENCES `sl_users` (`usersId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `team_image_fk_id` FOREIGN KEY (`teamImageId`) REFERENCES `sl_uploads` (`uploadsId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `team_leader_fk_id` FOREIGN KEY (`teamLeaderId`) REFERENCES `sl_users` (`usersId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_thinking_thursday_has_files`
--
ALTER TABLE `sl_thinking_thursday_has_files`
  ADD CONSTRAINT `relation_tt_fk_id` FOREIGN KEY (`ttFid`) REFERENCES `sl_thinking_thursday` (`ttId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `uploaded_file_tt_fk_id` FOREIGN KEY (`uploadFid`) REFERENCES `sl_uploads` (`uploadsId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_thinking_thursday_has_hosts`
--
ALTER TABLE `sl_thinking_thursday_has_hosts`
  ADD CONSTRAINT `tt_belongs_to_fid_fk_id` FOREIGN KEY (`ttFid`) REFERENCES `sl_thinking_thursday` (`ttId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tt_is_host_fk_id` FOREIGN KEY (`ttHostFid`) REFERENCES `sl_thinking_thursday_hosts` (`ttHostId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_thinking_thursday_hosts`
--
ALTER TABLE `sl_thinking_thursday_hosts`
  ADD CONSTRAINT `tt_host_fk_id` FOREIGN KEY (`hostMemberFid`) REFERENCES `sl_users` (`usersId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_thinking_thursday_related`
--
ALTER TABLE `sl_thinking_thursday_related`
  ADD CONSTRAINT `origin_tt_fk_id` FOREIGN KEY (`originTTFid`) REFERENCES `sl_thinking_thursday` (`ttId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `related_tt_fk_id` FOREIGN KEY (`relatedTTFid`) REFERENCES `sl_thinking_thursday` (`ttId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relation_type_fk_id` FOREIGN KEY (`relationType`) REFERENCES `sl_tt_relation_type` (`relationTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_transactions`
--
ALTER TABLE `sl_transactions`
  ADD CONSTRAINT `created_by_user_fk_id` FOREIGN KEY (`userId`) REFERENCES `sl_users` (`usersId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_user_data`
--
ALTER TABLE `sl_user_data`
  ADD CONSTRAINT `avatar_upload_fid_fk_id` FOREIGN KEY (`avatarUploadFid`) REFERENCES `sl_uploads` (`uploadsId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_user_data_has_cv_data`
--
ALTER TABLE `sl_user_data_has_cv_data`
  ADD CONSTRAINT `user_data_fid_fk_id` FOREIGN KEY (`userDataFid`) REFERENCES `sl_user_data` (`userDataId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_has_fid_cv_fk_id` FOREIGN KEY (`userDataCvFid`) REFERENCES `sl_users_cv_data` (`usersCvDataId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_user_in_team`
--
ALTER TABLE `sl_user_in_team`
  ADD CONSTRAINT `users_in_fk_id` FOREIGN KEY (`usersFid`) REFERENCES `sl_users` (`usersId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_team_fk_id` FOREIGN KEY (`teamFid`) REFERENCES `sl_teams` (`teamId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_users`
--
ALTER TABLE `sl_users`
  ADD CONSTRAINT `user_data_fk_id` FOREIGN KEY (`userDataFid`) REFERENCES `sl_user_data` (`userDataId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_groups_fk_id` FOREIGN KEY (`userGroupFid`) REFERENCES `sl_user_groups` (`userGroupId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sl_users_cv_data`
--
ALTER TABLE `sl_users_cv_data`
  ADD CONSTRAINT `image_upload_fid_fk_id` FOREIGN KEY (`imageFid`) REFERENCES `sl_uploads` (`uploadsId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `export_format_fid_fk_id` FOREIGN KEY (`exportFormatFid`) REFERENCES `sl_cv_export_formats` (`exportFormatId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
