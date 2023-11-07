-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2023 at 07:53 AM
-- Server version: 8.0.29
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canadapdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rel_type` enum('user','brand','language','visa-type','representative','smtp-setting','pipedeive-setting') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rel_id` int DEFAULT '0',
  `brand_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ipaddress` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int NOT NULL DEFAULT '0' COMMENT 'staff id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `datetime`, `description`, `additional_data`, `rel_type`, `rel_id`, `brand_id`, `ipaddress`, `added_by`) VALUES
(1, '2023-10-17 04:48:06', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '103.240.79.54', 18),
(2, '2023-10-17 04:50:09', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '103.240.79.54', 18),
(3, '2023-10-17 04:52:09', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '103.240.79.54', 18),
(4, '2023-10-17 04:54:19', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '103.240.79.54', 18),
(5, '2023-10-17 05:58:20', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>1.<br \\/>\\r\\nWe will assist to get an Endorsement of Candidate letter from designated<br \\/>\\r\\ncommunity.<br \\/>\\r\\n2.<br \\/>\\r\\nWe will open your family an account and submit your case to Rural Renewal Stream<br \\/>\\r\\n3.<br \\/>\\r\\nWe will assist you to find a Job and we will represent you in front of a Canadian<br \\/>\\r\\nemployer to get LMIA.<br \\/>\\r\\n4.<br \\/>\\r\\nWe will represent you in front of the Ministry of Immigration.<br \\/>\\r\\n5.<br \\/>\\r\\nWe will represent you in front of the Embassy of Canada in your country of<br \\/>\\r\\nresidence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '103.240.79.54', 1),
(6, '2023-10-17 06:18:12', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1697523492_stamp-img.png\"}', 'representative', 1, '0', '103.240.79.54', 1),
(7, '2023-10-17 06:46:59', 'New Brand Added [Brand Name: VisaCanada, visacanada@gmail.com ]', '{\"name\":\"VisaCanada\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"visacanada@gmail.com\",\"phone_no\":\"9988558855\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/visacanada.com\",\"logo\":\"\\/uploads\\/1697525219_logo.png.png\"}', 'brand', 53, '0', '49.15.248.40', 1),
(8, '2023-10-17 06:52:05', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '103.240.79.54', 18),
(9, '2023-10-17 07:49:43', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>Canada Migration is a Leading immigration consultancy which specializes in dealing<br \\/>\\r\\nwith professional services related to immigration.<br \\/>\\r\\nWe are private<br \\/>\\r\\nowned Canadian Immigration Consultancy, based in Peterborough,<br \\/>\\r\\nOntario, Canada.<br \\/>\\r\\nCanadaMigration.org assists individuals and families around the world with their visa<br \\/>\\r\\napplication and immigration process.<br \\/>\\r\\nMost of Our legal team are practicing lawyers and the rest are licensed RCICs.<br \\/>\\r\\nWe can handle your case from the initial interview to any potential administrative<br \\/>\\r\\nappeal or higher court appeals if required.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '103.240.79.54', 1),
(10, '2023-10-17 10:33:00', 'New PDF Added [Name: Laura Euridice Guajardo Valenzuela, euridicegv@icloud.com]', '{\"visa_type_id\":\"8,9\",\"recommended_visa_type\":\"9\",\"email\":\"euridicegv@icloud.com\",\"representative_id\":27,\"name\":\"Laura Euridice Guajardo Valenzuela\",\"credit_score\":\"345\",\"country\":\"India\",\"occupation\":\"hhh222222\",\"education_level\":\"design\",\"age\":\"23\",\"case_number\":\"cafff\",\"is_sent_mail\":0,\"phone_no\":\"52 81 2320 5525\",\"city\":\"Ahmedabad\",\"language_code\":\"en\",\"conclusion\":\"ddddddddddddd\"}', 'visa-type', 47, '19', '103.240.79.54', 27),
(11, '2023-10-17 10:33:05', 'PDF Updated [Name: Laura Euridice Guajardo Valenzuela, euridicegv@icloud.com]', '{\"visa_type_id\":\"8,9\",\"recommended_visa_type\":\"9\",\"email\":\"euridicegv@icloud.com\",\"representative_id\":27,\"name\":\"Laura Euridice Guajardo Valenzuela\",\"credit_score\":\"345\",\"country\":\"India\",\"occupation\":\"hhh222222\",\"education_level\":\"design\",\"age\":\"23\",\"case_number\":\"cafff\",\"is_sent_mail\":0,\"phone_no\":\"52 81 2320 5525\",\"city\":\"Ahmedabad\",\"language_code\":\"en\",\"conclusion\":\"ddddddddddddd\"}', 'visa-type', 47, '19', '103.240.79.54', 27),
(12, '2023-10-17 12:14:48', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '103.240.79.54', 18),
(13, '2023-10-17 12:15:01', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '103.240.79.54', 18),
(14, '2023-10-17 12:18:10', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 9, '19', '103.240.79.54', 18),
(15, '2023-10-17 12:18:18', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '103.240.79.54', 18),
(16, '2023-10-17 12:32:10', 'New PDF Added [Name: Laura Euridice Guajardo Valenzuela, euridicegv@icloud.com]', '{\"visa_type_id\":\"8,9\",\"recommended_visa_type\":\"8\",\"email\":\"euridicegv@icloud.com\",\"representative_id\":48,\"name\":\"Laura Euridice Guajardo Valenzuela\",\"credit_score\":\"250\",\"country\":\"Mexico\",\"occupation\":\"Software Developer\",\"education_level\":\"Bachelor of Engineering\",\"age\":\"59\",\"case_number\":\"EUR123\",\"is_sent_mail\":0,\"phone_no\":\"52 81 2320 5525\",\"city\":\"Mexico City\",\"language_code\":\"fr\",\"conclusion\":\"You are qualified with a high chance to enter Canada! These are your immigration \\r\\nprograms recommended to you based on your background, age, experience, education, \\r\\nand immigration status in Canada:\\r\\nWe are of the opinion that your chances of securing a job in Canada are high, we have \\r\\nreached this conclusion based on your occupation, education, work experience, and \\r\\nlanguage proficiency. \\r\\nWe encourage you to board this journey and we are ready to support and accompany \\r\\nyou through every step of the way, starting with getting ready for a proper job search \\r\\nthat will follow and continue with the full immigration process, which shall lead to \\r\\nPermanent or Temporary status in Canada. \\r\\nGiven your high profile, we will assign you an account manager who will be contacting \\r\\nyou shortly to discuss the steps that shall follow to allow you to start your path to \\r\\nCanada\"}', 'visa-type', 48, '19', '49.15.248.40', 48),
(17, '2023-10-17 12:42:35', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>1.<br \\/>\\r\\nWe will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\n2.<br \\/>\\r\\nWe will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\n3.<br \\/>\\r\\nWe will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\n4.<br \\/>\\r\\nWe will represent you in front of the Embassy of Canada in your country of<br \\/>\\r\\nresidence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '103.240.79.54', 1),
(18, '2023-10-17 12:45:05', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>1.We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\n2.We will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\n3.We will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\n4.We will represent you in front of the Embassy of Canada in your country of<br \\/>\\r\\nresidence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '103.240.79.54', 1),
(19, '2023-10-17 12:47:05', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>1.We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\n2.We will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\n3.We will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\n4.We will represent you in front of the Embassy of Canada in your country of<br \\/>\\r\\nresidence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '103.240.79.54', 1),
(20, '2023-10-18 05:14:27', 'PDF Updated [Name: Piyush Chouvhan, piyushgchouvhan@gmail.com]', '{\"visa_type_id\":\"8,9,10\",\"recommended_visa_type\":\"8\",\"email\":\"piyushgchouvhan@gmail.com\",\"representative_id\":48,\"name\":\"Piyush Chouvhan\",\"credit_score\":\"300\",\"country\":\"India\",\"occupation\":\"Sevice\",\"education_level\":\"Bachelor Degree\",\"age\":\"28\",\"case_number\":\"ABC12\",\"is_sent_mail\":0,\"phone_no\":\"9922565656\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":null}', 'visa-type', 43, '19', '49.15.244.94', 48),
(21, '2023-10-18 05:37:19', 'PDF Updated [Name: Piyush, piyushc.knp@gmail.com]', '{\"visa_type_id\":\"8,9,10\",\"recommended_visa_type\":\"9\",\"email\":\"piyushc.knp@gmail.com\",\"representative_id\":48,\"name\":\"Piyush\",\"credit_score\":\"300\",\"country\":\"India\",\"occupation\":\"Service\",\"education_level\":\"B.E.\",\"age\":\"29\",\"case_number\":\"ABC123\",\"is_sent_mail\":0,\"phone_no\":\"8956895689\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available\"}', 'visa-type', 35, '19', '49.15.244.94', 48),
(22, '2023-10-18 07:32:56', 'Representative Updated [Representative Name: Simran Kaur]', '{\"name\":\"Simran Kaur\",\"bio\":\"RCIC. Simran Kaur is a dedicated, organized and efficient individual.\\r\\nShe is a skilled and reliable immigration consultant with experience in\\r\\nmanaging time sensitive issues. Being an RCIC, she advises and\\r\\nassists clients in all classes of Canadian immigration As a fully\\r\\nqualified RCIC, she will guide you through your immigration process\\r\\nand assist you with any immigration issues you may experience. He\\r\\nwill ensure that you are provided with the best immigration service\\r\\nand business guidance on your journey to Canada\",\"brand_id\":\"19\",\"linkedin_id\":\"dfdf\",\"license_number\":\"RCIC Immigration Consultant | CCRC Mem ID| R526406\",\"cba_number\":\"dfd123\",\"email\":\"ketul1@gmail.com\",\"password\":\"$2y$10$vlXFZCZGUgfLtlL7dc\\/Uc.dU4EaKW9lW2pUChJGxaORp6h70nTENW\"}', 'representative', 5, '0', '49.15.244.94', 1),
(23, '2023-10-18 07:41:17', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '49.15.244.94', 1),
(24, '2023-10-18 07:46:10', 'Brand Updated [ID: 19, Info@canadamigration.org -> CanadaMigration]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>1.We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\n2.We will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\n3.We will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\n4.We will represent you in front of the Embassy of Canada in your country of<br \\/>\\r\\nresidence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"language_id\":\"en,fr\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '19', '49.15.244.94', 42),
(25, '2023-10-18 07:49:05', 'Brand Updated [ID: 19, Info@canadamigration.org -> CanadaMigration]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>1.We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\n2.We will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\n3.We will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\n4.We will represent you in front of the Embassy of Canada in your country of<br \\/>\\r\\nresidence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '19', '49.15.244.94', 42),
(26, '2023-10-18 08:29:16', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731 N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '106.193.137.233', 1),
(27, '2023-10-18 08:29:39', 'Representative Updated [Representative Name: Simran Kaur]', '{\"name\":\"Simran Kaur\",\"bio\":\"RCIC. Simran Kaur is a dedicated, organized and efficient individual.\\r\\nShe is a skilled and reliable immigration consultant with experience in\\r\\nmanaging time sensitive issues. Being an RCIC, she advises and\\r\\nassists clients in all classes of Canadian immigration As a fully\\r\\nqualified RCIC, she will guide you through your immigration process\\r\\nand assist you with any immigration issues you may experience. He\\r\\nwill ensure that you are provided with the best immigration service\\r\\nand business guidance on your journey to Canada\",\"brand_id\":\"19\",\"linkedin_id\":\"dfdf\",\"license_number\":\"RCIC Immigration Consultant | CCRC Mem ID| R526406\",\"cba_number\":\"dfd123\",\"email\":\"ketul1@gmail.com\",\"password\":\"$2y$10$vlXFZCZGUgfLtlL7dc\\/Uc.dU4EaKW9lW2pUChJGxaORp6h70nTENW\"}', 'representative', 5, '0', '106.193.137.233', 1),
(28, '2023-10-18 08:29:48', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '106.193.137.233', 1),
(29, '2023-10-18 08:30:14', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\"}', 'representative', 1, '0', '106.193.137.233', 1),
(30, '2023-10-18 10:07:02', 'Brand Updated [Brand Name: VisaCanada, visacanada@gmail.com]', '{\"name\":\"VisaCanada\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"visacanada@gmail.com\",\"phone_no\":\"9988558855\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/visacanada.com\"}', 'brand', 53, '0', '106.193.137.233', 1),
(31, '2023-10-18 10:07:09', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '106.193.137.233', 1),
(32, '2023-10-18 10:07:18', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '106.193.137.233', 1),
(33, '2023-10-18 10:08:58', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"law_logo\":\"\\/uploads\\/law_logo\\/1697623738_law_logo.png\"}', 'representative', 6, '0', '106.193.137.233', 1),
(34, '2023-10-18 10:09:05', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '106.193.137.233', 1),
(35, '2023-10-18 10:09:15', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\",\"law_logo\":\"\\/uploads\\/law_logo\\/1697623755_law_logo.png\"}', 'representative', 1, '0', '106.193.137.233', 1),
(36, '2023-10-18 10:09:20', 'Representative Updated [Representative Name: Simran Kaur]', '{\"name\":\"Simran Kaur\",\"bio\":\"RCIC. Simran Kaur is a dedicated, organized and efficient individual.\\r\\nShe is a skilled and reliable immigration consultant with experience in\\r\\nmanaging time sensitive issues. Being an RCIC, she advises and\\r\\nassists clients in all classes of Canadian immigration As a fully\\r\\nqualified RCIC, she will guide you through your immigration process\\r\\nand assist you with any immigration issues you may experience. He\\r\\nwill ensure that you are provided with the best immigration service\\r\\nand business guidance on your journey to Canada\",\"brand_id\":\"19\",\"linkedin_id\":\"dfdf\",\"license_number\":\"RCIC Immigration Consultant | CCRC Mem ID| R526406\",\"cba_number\":\"dfd123\",\"email\":\"ketul1@gmail.com\",\"password\":\"$2y$10$vlXFZCZGUgfLtlL7dc\\/Uc.dU4EaKW9lW2pUChJGxaORp6h70nTENW\",\"law_logo\":\"\\/uploads\\/law_logo\\/1697623760_law_logo.png\"}', 'representative', 5, '0', '106.193.137.233', 1),
(37, '2023-10-18 10:09:41', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"law_logo\":\"\\/uploads\\/law_logo\\/1697623781_law-society-logo.png\"}', 'representative', 6, '0', '106.193.137.233', 1),
(38, '2023-10-18 17:26:44', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '117.99.252.89', 18),
(39, '2023-10-18 17:33:06', 'Brand Updated [ID: 19, Info@canadamigration.org -> CanadaMigration]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>1.We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\n2.We will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\n3.We will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\n4.We will represent you in front of the Embassy of Canada in your country of<br \\/>\\r\\nresidence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '19', '117.99.252.89', 18),
(40, '2023-10-19 06:04:09', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '19,53', '49.15.247.91', 48),
(41, '2023-10-19 10:16:59', 'PDF Updated [Name: Piyush, piyushc.knp@gmail.com]', '{\"visa_type_id\":\"8,9,10\",\"recommended_visa_type\":\"9\",\"email\":\"piyushc.knp@gmail.com\",\"representative_id\":48,\"name\":\"Piyush\",\"credit_score\":\"300\",\"country\":\"India\",\"occupation\":\"Service\",\"education_level\":\"B.E.\",\"age\":\"29\",\"case_number\":\"ABC123\",\"is_sent_mail\":0,\"phone_no\":\"8956895689\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available\"}', 'visa-type', 35, '19', '157.33.107.121', 48),
(42, '2023-10-19 10:22:40', 'New PDF Added [Name: Laura Euridice Guajardo Valenzuela, euridicegv@icloud.com]', '{\"visa_type_id\":\"8,9\",\"recommended_visa_type\":\"8\",\"email\":\"euridicegv@icloud.com\",\"representative_id\":27,\"name\":\"Laura Euridice Guajardo Valenzuela\",\"credit_score\":\"345\",\"country\":\"Australia\",\"occupation\":\"hhh222222\",\"education_level\":\"degree\",\"age\":\"59\",\"case_number\":\"2345\",\"is_sent_mail\":0,\"phone_no\":\"52 81 2320 5525\",\"city\":\"Moore Park\",\"language_code\":\"en\",\"conclusion\":\"business\"}', 'visa-type', 49, '19,53', '106.193.137.233', 27),
(43, '2023-10-19 10:25:21', 'New PDF Added [Name: Laura Euridice Guajardo Valenzuela, euridicegv@icloud.com]', '{\"visa_type_id\":\"8,9\",\"recommended_visa_type\":\"8\",\"email\":\"euridicegv@icloud.com\",\"representative_id\":27,\"name\":\"Laura Euridice Guajardo Valenzuela\",\"credit_score\":\"345\",\"country\":\"India\",\"occupation\":\"hhh222222\",\"education_level\":\"degree\",\"age\":\"59\",\"case_number\":\"2345\",\"is_sent_mail\":0,\"phone_no\":\"52 81 2320 5525\",\"city\":\"Ahmedabad\",\"language_code\":\"en\",\"conclusion\":\"ddd\"}', 'visa-type', 50, '19,53', '106.193.137.233', 27),
(44, '2023-10-19 12:02:07', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '157.33.123.172', 1),
(45, '2023-10-19 12:04:15', 'New Smtp Setting Added [SMTP UserName: piyushc.knp@gmail.com]', '{\"brand_id\":\"53\",\"from_name\":\"ARP\",\"host\":\"smtp.gmail.com\",\"port\":\"465\",\"username\":\"piyushc.knp@gmail.com\",\"password\":\"yjcp hwhp yxte mepi\",\"encryption\":\"tls\",\"from_email_address\":\"piyushc.knp@gmail.com\",\"cc_email\":\"piyushc.knp@gmail.com\"}', 'smtp-setting', 3, '0', '157.33.123.172', 1),
(46, '2023-10-19 12:05:40', 'Smtp Setting Updated [SMTP UserName: piyushc.knp@gmail.com]', '{\"brand_id\":\"53\",\"from_name\":\"ARP\",\"host\":\"smtp.gmail.com\",\"port\":\"587\",\"username\":\"piyushc.knp@gmail.com\",\"password\":\"yjcp hwhp yxte mepi\",\"encryption\":\"tls\",\"from_email_address\":\"piyushc.knp@gmail.com\",\"cc_email\":\"piyushc.knp@gmail.com\"}', 'smtp-setting', 3, '0', '157.33.123.172', 1),
(47, '2023-10-19 12:05:40', 'Smtp Setting Updated [SMTP UserName: piyushc.knp@gmail.com]', '{\"brand_id\":\"53\",\"from_name\":\"ARP\",\"host\":\"smtp.gmail.com\",\"port\":\"587\",\"username\":\"piyushc.knp@gmail.com\",\"password\":\"yjcp hwhp yxte mepi\",\"encryption\":\"tls\",\"from_email_address\":\"piyushc.knp@gmail.com\",\"cc_email\":\"piyushc.knp@gmail.com\"}', 'smtp-setting', 3, '0', '157.33.123.172', 1),
(48, '2023-10-19 12:05:40', 'Smtp Setting Updated [SMTP UserName: piyushc.knp@gmail.com]', '{\"brand_id\":\"19\",\"from_name\":\"ARP\",\"host\":\"smtp.gmail.com\",\"port\":\"587\",\"username\":\"piyushc.knp@gmail.com\",\"password\":\"yjcp hwhp yxte mepi\",\"encryption\":\"tls\",\"from_email_address\":\"piyushc.knp@gmail.com\",\"cc_email\":\"piyushc.knp@gmail.com\"}', 'smtp-setting', 3, '0', '157.33.123.172', 1),
(49, '2023-10-19 12:05:40', 'Smtp Setting Updated [SMTP UserName: piyushc.knp@gmail.com]', '{\"brand_id\":\"53\",\"from_name\":\"ARP\",\"host\":\"smtp.gmail.com\",\"port\":\"587\",\"username\":\"piyushc.knp@gmail.com\",\"password\":\"yjcp hwhp yxte mepi\",\"encryption\":\"tls\",\"from_email_address\":\"piyushc.knp@gmail.com\",\"cc_email\":\"piyushc.knp@gmail.com\"}', 'smtp-setting', 3, '0', '157.33.123.172', 1),
(50, '2023-10-19 12:11:22', 'User Updated [User Name: ketul Patel, ketul@gmail.com]', '{\"name\":\"ketul Patel\",\"email\":\"ketul@gmail.com\",\"brand\":\"53\",\"level\":\"1\",\"password\":null,\"user_id\":\"45\"}', 'user', 45, '0', '157.33.123.172', 1),
(51, '2023-10-19 17:56:47', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.137.233', 18),
(52, '2023-10-19 18:11:00', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(53, '2023-10-19 18:16:13', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 9, '19', '106.193.137.233', 18),
(54, '2023-10-19 18:37:51', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(55, '2023-10-19 18:40:33', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(56, '2023-10-20 03:49:57', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.137.233', 18),
(57, '2023-10-20 03:51:20', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.137.233', 18),
(58, '2023-10-20 03:52:34', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.137.233', 18),
(59, '2023-10-20 04:29:36', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 9, '19', '106.193.137.233', 18),
(60, '2023-10-20 04:34:25', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(61, '2023-10-20 04:34:44', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(62, '2023-10-20 04:45:37', 'User Updated [User Name: Piyush Chouvhan, piyushc.knp@gmail.com]', '{\"name\":\"Piyush Chouvhan\",\"email\":\"piyushc.knp@gmail.com\",\"brand\":\"19\",\"level\":\"1\",\"password\":\"Piyush@123\",\"user_id\":\"33\"}', 'user', 33, '0', '49.15.245.82', 1),
(63, '2023-10-20 05:04:18', 'Representative Updated [Representative Name: Simran Kaur]', '{\"name\":\"Simran Kaur\",\"bio\":\"RCIC. Simran Kaur is a dedicated, organized and efficient individual.\\r\\nShe is a skilled and reliable immigration consultant with experience in\\r\\nmanaging time sensitive issues. Being an RCIC, she advises and\\r\\nassists clients in all classes of Canadian immigration As a fully\\r\\nqualified RCIC, she will guide you through your immigration process\\r\\nand assist you with any immigration issues you may experience. He\\r\\nwill ensure that you are provided with the best immigration service\\r\\nand business guidance on your journey to Canada\",\"brand_id\":\"19,53\",\"linkedin_id\":\"dfdf\",\"license_number\":\"RCIC Immigration Consultant | CCRC Mem ID| R526406\",\"cba_number\":\"dfd123\",\"email\":\"ketul1@gmail.com\",\"password\":\"$2y$10$vlXFZCZGUgfLtlL7dc\\/Uc.dU4EaKW9lW2pUChJGxaORp6h70nTENW\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1697778258_simran_kaur_sign.png\"}', 'representative', 5, '0', '49.15.245.109', 1),
(64, '2023-10-20 05:05:10', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 9, '19', '106.193.137.233', 18),
(65, '2023-10-20 05:08:07', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(66, '2023-10-20 05:09:41', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(67, '2023-10-20 06:37:47', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(68, '2023-10-20 06:50:04', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(69, '2023-10-20 06:51:07', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(70, '2023-10-20 06:51:32', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.137.233', 18),
(71, '2023-10-20 07:20:12', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 9, '19', '106.193.137.233', 18),
(72, '2023-10-20 10:34:59', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.146.228', 18),
(73, '2023-10-20 12:12:14', 'New PDF Added [Name: Laura Euridice Guajardo Valenzuela, euridicegv@icloud.com]', '{\"visa_type_id\":\"8,9\",\"recommended_visa_type\":\"8\",\"email\":\"euridicegv@icloud.com\",\"representative_id\":27,\"name\":\"Laura Euridice Guajardo Valenzuela\",\"credit_score\":\"345\",\"country\":\"India\",\"occupation\":\"hhh222222\",\"education_level\":\"degree\",\"age\":\"59\",\"case_number\":\"3456\",\"is_sent_mail\":0,\"phone_no\":\"52 81 2320 5525\",\"city\":\"Ahmedabad\",\"language_code\":\"en\",\"conclusion\":\"eeeeeeeeee\"}', 'visa-type', 51, '19,53', '106.193.146.228', 27),
(74, '2023-10-20 12:17:16', 'PDF Updated [Name: Piyush, piyushc.knp@gmail.com]', '{\"visa_type_id\":\"8,9,10\",\"recommended_visa_type\":\"9\",\"email\":\"piyushc.knp@gmail.com\",\"representative_id\":48,\"name\":\"Piyush\",\"credit_score\":\"550\",\"country\":\"India\",\"occupation\":\"Service\",\"education_level\":\"B.E.\",\"age\":\"29\",\"case_number\":\"ABC123\",\"is_sent_mail\":0,\"phone_no\":\"8956895689\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available\"}', 'visa-type', 35, '19,53', '49.15.245.109', 48),
(75, '2023-10-20 12:40:31', 'Brand Updated [ID: 19, Info@canadamigration.org -> CanadaMigration]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\nWe will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\nWe will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\nWe will represent you in front of the Embassy of Canada in your country of residence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '19', '106.193.146.228', 18),
(76, '2023-10-20 12:42:59', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\nWe will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\nWe will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\nWe will represent you in front of the Embassy of Canada in your country of residence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '106.193.146.228', 1),
(77, '2023-10-20 12:43:15', 'Brand Updated [Brand Name: CanadaMigrationss, Info@canadamigration.org]', '{\"name\":\"CanadaMigrationss\",\"about_en\":\"<p>We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\nWe will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\nWe will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\nWe will represent you in front of the Embassy of Canada in your country of residence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '106.193.146.228', 1),
(78, '2023-10-20 12:43:21', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\nWe will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\nWe will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<br \\/>\\r\\nWe will represent you in front of the Embassy of Canada in your country of residence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '106.193.146.228', 1),
(79, '2023-10-20 12:45:48', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\nWe will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\nWe will represent you in front of the Ministry of Immigration to get the permeant<br \\/>\\r\\nresidency.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '106.193.146.228', 1),
(80, '2023-10-20 12:46:12', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>We will guide you to collect all required documents and notarize them by our<br \\/>\\r\\nLawyers.<br \\/>\\r\\nWe will open you an account and submit your case to BC PNP Program.<br \\/>\\r\\nWe will represent you in front of the Ministry of Immigration to get the permeant residency.We will represent you in front of the Embassy of Canada in your country of residence.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '106.193.146.228', 1),
(81, '2023-10-20 12:47:07', 'New Brand Added [Brand Name: Ankita, sssssssss@gmail.com ]', '{\"name\":\"Ankita\",\"about_en\":\"<p>test<\\/p>\",\"email\":\"sssssssss@gmail.com\",\"phone_no\":\"5678976785\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"http:\\/\\/15.207.152.121\\/\",\"logo\":\"\\/uploads\\/1697806027_law_logo.png.png\"}', 'brand', 54, '0', '106.193.146.228', 1),
(82, '2023-10-20 12:47:12', 'Brand Updated [Brand Name: Ankita, sssssssss@gmail.com]', '{\"name\":\"Ankita\",\"about_en\":\"<p>test<\\/p>\",\"email\":\"sssssssss@gmail.com\",\"phone_no\":\"5678976785\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"http:\\/\\/15.207.152.121\\/\"}', 'brand', 54, '0', '106.193.146.228', 1);
INSERT INTO `activity_logs` (`id`, `datetime`, `description`, `additional_data`, `rel_type`, `rel_id`, `brand_id`, `ipaddress`, `added_by`) VALUES
(83, '2023-10-20 12:48:34', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '49.15.245.109', 1),
(84, '2023-10-20 12:50:48', 'New Brand Added [Brand Name: test Brand, testbrand@gmail.com ]', '{\"name\":\"test Brand\",\"about_en\":\"<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<\\/p>\",\"email\":\"testbrand@gmail.com\",\"phone_no\":\"9865235689\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"knp-tech.com\",\"logo\":\"\\/uploads\\/1697806248_logo.png.png\"}', 'brand', 55, '0', '49.15.245.109', 1),
(85, '2023-10-20 12:51:03', 'Brand Updated [Brand Name: test Brand, testbrand@gmail.com]', '{\"name\":\"test Brand\",\"about_en\":\"<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.<\\/p>\",\"email\":\"testbrand@gmail.com\",\"phone_no\":\"8956895689\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"knp-tech.com\"}', 'brand', 55, '0', '49.15.245.109', 1),
(86, '2023-10-20 12:52:11', 'Brand Updated [Brand Name: VisaCanada, visacanada@gmail.com]', '{\"name\":\"VisaCanada\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"visacanada@gmail.com\",\"phone_no\":\"9988558855\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/visacanada.com\"}', 'brand', 53, '0', '106.193.146.228', 1),
(87, '2023-10-20 12:56:56', 'User Updated [User Name: ketul Patel one, ketul@gmail.com]', '{\"name\":\"ketul Patel one\",\"email\":\"ketul@gmail.com\",\"brand\":\"53\",\"level\":\"1\",\"password\":null,\"user_id\":\"45\"}', 'user', 45, '0', '49.15.245.109', 1),
(88, '2023-10-20 12:57:23', 'User Updated [User Name: ketul Patel, ketul@gmail.com]', '{\"name\":\"ketul Patel\",\"email\":\"ketul@gmail.com\",\"brand\":\"53\",\"level\":\"1\",\"password\":\"Piyush@123456\",\"user_id\":\"45\"}', 'user', 45, '0', '49.15.245.109', 1),
(89, '2023-10-20 13:00:36', 'New User Added [User Name: test, test2010@mailinator.com]', '{\"name\":\"test\",\"email\":\"test2010@mailinator.com\",\"brand\":\"19\",\"level\":\"1\",\"password\":\"Piyush@123\",\"user_id\":null}', 'user', 66, '0', '49.15.245.109', 1),
(90, '2023-10-20 13:05:14', 'New Pipedrive Setting Added [Pipedrive URL: https://api.pipedrive.com/v1]', '{\"url\":\"https:\\/\\/api.pipedrive.com\\/v1\",\"brand_id\":\"19\",\"token\":\"02f14f76be9bce4fab8dfc1053f0c3d59490085a\"}', 'pipedeive-setting', 12, '0', '49.15.245.109', 1),
(91, '2023-10-20 13:05:14', 'New Pipedrive Setting Added [Pipedrive URL: https://api.pipedrive.com/v1]', '{\"url\":\"https:\\/\\/api.pipedrive.com\\/v1\",\"brand_id\":\"53\",\"token\":\"02f14f76be9bce4fab8dfc1053f0c3d59490085a\"}', 'pipedeive-setting', 13, '0', '49.15.245.109', 1),
(92, '2023-10-20 17:12:20', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.146.228', 18),
(93, '2023-10-20 17:51:03', 'New Visa Type Added [Visa Name: test]', '{\"name\":\"test\",\"brand_id\":\"19\"}', 'visa-type', 25, '19', '106.193.146.228', 18),
(94, '2023-10-21 16:44:10', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.226.236', 18),
(95, '2023-10-21 16:44:46', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 9, '19', '106.193.226.236', 18),
(96, '2023-10-21 16:46:17', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.226.236', 18),
(97, '2023-10-21 16:46:59', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.226.236', 18),
(98, '2023-10-21 16:47:33', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 9, '19', '106.193.226.236', 18),
(99, '2023-10-21 16:48:12', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.226.236', 18),
(100, '2023-10-21 16:52:31', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.226.236', 18),
(101, '2023-10-21 16:58:37', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.226.236', 18),
(102, '2023-10-21 17:13:46', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 10, '19', '106.193.226.236', 18),
(103, '2023-10-21 17:14:01', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 9, '19', '106.193.226.236', 18),
(104, '2023-10-21 17:14:15', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.226.236', 18),
(105, '2023-10-23 04:52:50', 'New PDF Added [Name: Laura Euridice Guajardo Valenzuela, euridicegv@icloud.com]', '{\"visa_type_id\":\"8,9,10\",\"recommended_visa_type\":\"8\",\"email\":\"euridicegv@icloud.com\",\"representative_id\":48,\"name\":\"Laura Euridice Guajardo Valenzuela\",\"credit_score\":\"550\",\"country\":\"Mexico\",\"occupation\":\"Service\",\"education_level\":\"Bachelor Degree\",\"age\":\"59\",\"case_number\":\"ABC2310\",\"is_sent_mail\":0,\"phone_no\":\"52 81 2320 5525\",\"city\":\"Mexico City\",\"language_code\":\"en\",\"conclusion\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.\"}', 'visa-type', 52, '19,53', '49.15.244.93', 48),
(106, '2023-10-23 05:09:54', 'PDF Updated [Name: Piyush Chouvhan, piyushgchouvhan@gmail.com]', '{\"visa_type_id\":\"8,9,10\",\"recommended_visa_type\":\"9\",\"email\":\"piyushgchouvhan@gmail.com\",\"representative_id\":48,\"name\":\"Piyush Chouvhan\",\"credit_score\":\"550\",\"country\":\"India\",\"occupation\":\"Sevice\",\"education_level\":\"Bachelor Degree\",\"age\":\"28\",\"case_number\":\"ABC2310\",\"is_sent_mail\":0,\"phone_no\":\"9922565656\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available\"}', 'visa-type', 43, '19,53', '49.15.244.93', 48),
(107, '2023-10-23 05:17:22', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<h3>Canada Migration is a Leading immigration consultancy which specializes in dealing with professional services related to immigration. We are private-owned Canadian Immigration Consultancy, based in Peterborough, Ontario, Canada.<\\/h3>\\r\\n\\r\\n<h3>CanadaMigration.org assists individuals and families around the world with their visa application and immigration process.<\\/h3>\\r\\n\\r\\n<h3>Most of Our legal team are practicing lawyers and the rest are licensed RCICs. We can handle your case from the initial interview to any potential administrative appeal or higher court appeals if required.<\\/h3>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '49.15.244.93', 1),
(108, '2023-10-23 05:20:41', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>Canada Migration is a Leading immigration consultancy which specializes in dealing with professional services related to immigration. We are private-owned Canadian Immigration Consultancy, based in Peterborough, Ontario, Canada.<\\/p>\\r\\n\\r\\n<p>CanadaMigration.org assists individuals and families around the world with their visa application and immigration process.<\\/p>\\r\\n\\r\\n<p>Most of Our legal team are practicing lawyers and the rest are licensed RCICs. We can handle your case from the initial interview to any potential administrative appeal or higher court appeals if required.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '49.15.244.93', 1),
(109, '2023-10-23 05:25:30', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '19,53', '49.15.244.93', 48),
(110, '2023-10-23 05:59:53', 'New PDF Added [Name: Kisingo Mubaraka, mubarakakisingo@gmail.com]', '{\"visa_type_id\":\"8,9\",\"recommended_visa_type\":\"8\",\"email\":\"mubarakakisingo@gmail.com\",\"representative_id\":27,\"name\":\"Kisingo Mubaraka\",\"credit_score\":\"345\",\"country\":\"ug\",\"occupation\":\"student\",\"education_level\":\"er\",\"age\":\"21\",\"case_number\":\"2345\",\"is_sent_mail\":0,\"phone_no\":\"256700601201\",\"city\":\"er\",\"language_code\":\"en\",\"conclusion\":\"ddddddddddddd\"}', 'visa-type', 53, '19,53', '106.193.187.182', 27),
(111, '2023-10-23 06:03:59', 'New PDF Added [Name: Kisingo Mubaraka, mubarakakisingo@gmail.com]', '{\"visa_type_id\":\"8,9\",\"recommended_visa_type\":\"8\",\"email\":\"mubarakakisingo@gmail.com\",\"representative_id\":27,\"name\":\"Kisingo Mubaraka\",\"credit_score\":\"567\",\"country\":\"ug\",\"occupation\":\"student\",\"education_level\":\"rr\",\"age\":\"21\",\"case_number\":\"5555555\",\"is_sent_mail\":0,\"phone_no\":\"256700601201\",\"city\":\"56\",\"language_code\":\"en\",\"conclusion\":\"test\"}', 'visa-type', 54, '19,53', '106.193.187.182', 27),
(112, '2023-10-23 07:06:04', 'New Visa Type Added [Visa Name: test]', '{\"name\":\"test\",\"brand_id\":\"19\"}', 'visa-type', 26, '19', '106.193.187.182', 18),
(113, '2023-10-23 07:06:09', 'Visa Type Updated [Visa Name: testr]', '{\"name\":\"testr\",\"brand_id\":\"19\"}', 'visa-type', 26, '19', '106.193.187.182', 18),
(114, '2023-10-23 07:29:52', 'New User Added [User Name: test user, testuser2310@mailinator.com]', '{\"name\":\"test user\",\"email\":\"testuser2310@mailinator.com\",\"brand\":\"53\",\"level\":\"1\",\"password\":\"piyush@12345\",\"user_id\":null}', 'user', 67, '0', '49.15.247.135', 1),
(115, '2023-10-23 07:31:03', 'User Updated [User Name: test user, testuser2310@mailinator.com]', '{\"name\":\"test user\",\"email\":\"testuser2310@mailinator.com\",\"brand\":\"53\",\"level\":\"1\",\"password\":\"piyush@123\",\"user_id\":\"67\"}', 'user', 67, '0', '49.15.247.135', 1),
(116, '2023-10-23 07:47:38', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"photo\":\"\\/uploads\\/representative\\/1698047258_jonathan_photo.png\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698047258_zonathan sign.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(117, '2023-10-23 07:54:01', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698047641_fake-hand-drawn-autographs-set-handwritten-signature-scribble-for-business-certificate-or-letter-isolated-illustration-vector.jpg\"}', 'representative', 6, '0', '49.15.247.135', 1),
(118, '2023-10-23 07:57:10', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698047830_jonsign.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(119, '2023-10-23 07:57:57', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"photo\":\"\\/uploads\\/representative\\/1698047877_jonpic.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(120, '2023-10-23 07:59:54', 'User Updated [User Name: Test Piyus, piyush2209@mailinator.com]', '{\"name\":\"Test Piyus\",\"email\":\"piyush2209@mailinator.com\",\"brand\":\"19\",\"level\":\"1\",\"password\":\"piyush@123\",\"user_id\":\"42\"}', 'user', 42, '0', '49.15.247.135', 1),
(121, '2023-10-23 08:16:08', 'New Visa Type Added [Visa Name: Express Entry Program]', '{\"name\":\"Express Entry Program\",\"brand_id\":\"19\"}', 'visa-type', 27, '19', '106.193.187.182', 18),
(122, '2023-10-23 08:16:24', 'New Visa Type Added [Visa Name: Work Permit - Temporary Visa]', '{\"name\":\"Work Permit - Temporary Visa\",\"brand_id\":\"19\"}', 'visa-type', 28, '19', '106.193.187.182', 18),
(123, '2023-10-23 09:14:58', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\",\"law_logo\":\"\\/uploads\\/law_logo\\/1698052498_law_logo.png\"}', 'representative', 1, '0', '106.193.187.182', 1),
(124, '2023-10-23 09:15:30', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698052530_stamp-img.png\"}', 'representative', 1, '0', '106.193.187.182', 1),
(125, '2023-10-23 09:16:15', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698052575_stamp-img.png\"}', 'representative', 1, '0', '106.193.187.182', 1),
(126, '2023-10-23 09:21:04', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698052864_stamp-img.png\"}', 'representative', 1, '0', '106.193.187.182', 1),
(127, '2023-10-23 09:21:17', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\"}', 'representative', 1, '0', '106.193.187.182', 1),
(128, '2023-10-23 09:21:36', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\",\"photo\":\"\\/uploads\\/representative\\/1698052896_Pooja-pic.png\"}', 'representative', 1, '0', '106.193.187.182', 1),
(129, '2023-10-23 09:21:59', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$jf.RLbMyh.2XvICquXtaOOvJWpKuaFKlYTuhhpzmLXnTS9LAs5Aqe\",\"law_logo\":\"\\/uploads\\/law_logo\\/1698052919_law_logo.png\"}', 'representative', 1, '0', '106.193.187.182', 1),
(130, '2023-10-23 09:53:54', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '49.15.247.135', 1),
(131, '2023-10-23 09:54:36', 'Representative Updated [Representative Name: Simran Kaur]', '{\"name\":\"Simran Kaur\",\"bio\":\"RCIC. Simran Kaur is a dedicated, organized and efficient individual.\\r\\nShe is a skilled and reliable immigration consultant with experience in\\r\\nmanaging time sensitive issues. Being an RCIC, she advises and\\r\\nassists clients in all classes of Canadian immigration As a fully\\r\\nqualified RCIC, she will guide you through your immigration process\\r\\nand assist you with any immigration issues you may experience. He\\r\\nwill ensure that you are provided with the best immigration service\\r\\nand business guidance on your journey to Canada\",\"brand_id\":\"19,53\",\"linkedin_id\":\"dfdf\",\"license_number\":\"RCIC Immigration Consultant | CCRC Mem ID| R526406\",\"cba_number\":\"dfd123\",\"email\":\"ketul1@gmail.com\",\"password\":\"$2y$10$vlXFZCZGUgfLtlL7dc\\/Uc.dU4EaKW9lW2pUChJGxaORp6h70nTENW\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698054876_jonsign.png\"}', 'representative', 5, '0', '49.15.247.135', 1),
(132, '2023-10-23 10:32:32', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '106.193.233.186', 1),
(133, '2023-10-23 10:38:16', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '106.193.162.107', 1),
(134, '2023-10-23 10:48:51', 'Brand Updated [Brand Name: VisaCanada, visacanada@gmail.com]', '{\"name\":\"VisaCanada\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"visacanada@gmail.com\",\"phone_no\":\"9988558855\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/visacanada.com\"}', 'brand', 53, '0', '106.193.162.107', 1),
(135, '2023-10-23 10:52:09', 'Brand Updated [Brand Name: VisaCanada dddddd, visacanada@gmail.com]', '{\"name\":\"VisaCanada dddddd\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"visacanada@gmail.com\",\"phone_no\":\"9988558855\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/visacanada.com\"}', 'brand', 53, '0', '106.193.162.107', 1),
(136, '2023-10-23 10:52:20', 'Brand Updated [Brand Name: VisaCanada, visacanada@gmail.com]', '{\"name\":\"VisaCanada\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"visacanada@gmail.com\",\"phone_no\":\"9988558855\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/visacanada.com\"}', 'brand', 53, '0', '106.193.162.107', 1),
(137, '2023-10-23 10:55:18', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '106.193.162.107', 1),
(138, '2023-10-23 11:07:56', 'Representative Updated [Representative Name: Simran Kaur]', '{\"name\":\"Simran Kaur\",\"bio\":\"RCIC. Simran Kaur is a dedicated, organized and efficient individual.\\r\\nShe is a skilled and reliable immigration consultant with experience in\\r\\nmanaging time sensitive issues. Being an RCIC, she advises and\\r\\nassists clients in all classes of Canadian immigration As a fully\\r\\nqualified RCIC, she will guide you through your immigration process\\r\\nand assist you with any immigration issues you may experience. He\\r\\nwill ensure that you are provided with the best immigration service\\r\\nand business guidance on your journey to Canada\",\"brand_id\":\"19,53\",\"linkedin_id\":\"dfdf\",\"license_number\":\"RCIC Immigration Consultant | CCRC Mem ID| R526406\",\"cba_number\":\"dfd123\",\"email\":\"ketul1@gmail.com\",\"password\":\"$2y$10$vlXFZCZGUgfLtlL7dc\\/Uc.dU4EaKW9lW2pUChJGxaORp6h70nTENW\"}', 'representative', 5, '0', '106.193.162.107', 1),
(139, '2023-10-23 11:08:12', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '106.193.162.107', 1),
(140, '2023-10-23 11:08:40', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '106.193.162.107', 1),
(141, '2023-10-23 11:08:58', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '106.193.162.107', 1),
(142, '2023-10-23 11:09:47', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"law_logo\":\"\\/uploads\\/law_logo\\/1698059387_law_logo.png\"}', 'representative', 1, '0', '106.193.162.107', 1),
(143, '2023-10-23 11:10:34', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698059434_stamp-img.png\"}', 'representative', 1, '0', '106.193.162.107', 1),
(144, '2023-10-23 11:10:45', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '106.193.162.107', 1),
(145, '2023-10-23 11:11:03', 'Representative Updated [Representative Name: Pooja Chawla ddd]', '{\"name\":\"Pooja Chawla ddd\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '106.193.162.107', 1),
(146, '2023-10-23 11:11:09', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '106.193.162.107', 1),
(147, '2023-10-23 11:13:13', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"photo\":\"\\/uploads\\/representative\\/1698059593_Jonatan-pic.png\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698059593_stamp-img.png\"}', 'representative', 6, '0', '106.193.162.107', 1),
(148, '2023-10-23 11:14:06', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\"}', 'representative', 6, '0', '49.15.247.135', 1);
INSERT INTO `activity_logs` (`id`, `datetime`, `description`, `additional_data`, `rel_type`, `rel_id`, `brand_id`, `ipaddress`, `added_by`) VALUES
(149, '2023-10-23 11:14:28', 'Representative Updated [Representative Name: Simran Kaur]', '{\"name\":\"Simran Kaur\",\"bio\":\"RCIC. Simran Kaur is a dedicated, organized and efficient individual.\\r\\nShe is a skilled and reliable immigration consultant with experience in\\r\\nmanaging time sensitive issues. Being an RCIC, she advises and\\r\\nassists clients in all classes of Canadian immigration As a fully\\r\\nqualified RCIC, she will guide you through your immigration process\\r\\nand assist you with any immigration issues you may experience. He\\r\\nwill ensure that you are provided with the best immigration service\\r\\nand business guidance on your journey to Canada\",\"brand_id\":\"19,53\",\"linkedin_id\":\"dfdf\",\"license_number\":\"RCIC Immigration Consultant | CCRC Mem ID| R526406\",\"cba_number\":\"dfd123\",\"email\":\"ketul1@gmail.com\",\"password\":\"$2y$10$vlXFZCZGUgfLtlL7dc\\/Uc.dU4EaKW9lW2pUChJGxaORp6h70nTENW\",\"photo\":\"\\/uploads\\/representative\\/1698059668_Simran-pic.png\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698059668_jonsign.png\"}', 'representative', 5, '0', '49.15.247.135', 1),
(150, '2023-10-23 11:15:28', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"photo\":\"\\/uploads\\/representative\\/1698059728_Pooja-pic.png\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698059728_jonsign.png\"}', 'representative', 1, '0', '49.15.247.135', 1),
(151, '2023-10-23 11:26:39', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\"}', 'representative', 1, '0', '49.15.247.135', 1),
(152, '2023-10-23 11:55:02', 'Brand Updated [Brand Name: VisaCanada, visacanada@gmail.com]', '{\"name\":\"VisaCanada\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"visacanada@gmail.com\",\"phone_no\":\"9988558855\",\"language_id\":\"en,fr\",\"about_fr\":\"\",\"website\":\"https:\\/\\/visacanada.com\"}', 'brand', 53, '0', '106.193.162.107', 1),
(153, '2023-10-23 11:55:15', 'Brand Updated [Brand Name: VisaCanada, visacanada@gmail.com]', '{\"name\":\"VisaCanada\",\"about_en\":\"<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\\r\\n\\r\\n<h3><strong>Approved and regulated professionals<\\/strong><\\/h3>\\r\\n\\r\\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.<\\/p>\\r\\n\\r\\n<p><strong>Improved customer portal<\\/strong><\\/p>\\r\\n\\r\\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.<\\/p>\",\"email\":\"visacanada@gmail.com\",\"phone_no\":\"9988558855\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/visacanada.com\"}', 'brand', 53, '0', '106.193.162.107', 1),
(154, '2023-10-23 12:33:02', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '49.15.247.135', 42),
(155, '2023-10-23 12:34:43', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '49.15.247.135', 42),
(156, '2023-10-23 12:37:15', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '49.15.247.135', 42),
(157, '2023-10-23 13:30:31', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>Canada Migration is a Leading immigration consultancy which specializes in dealing with professional services related to immigration. We are private-owned Canadian Immigration Consultancy, based in Peterborough, Ontario, Canada.<\\/p>\\r\\n\\r\\n<p>CanadaMigration.org assists individuals and families around the world with their visa application and immigration process.<\\/p>\\r\\n\\r\\n<p>Most of Our legal team are practicing lawyers and the rest are licensed RCICs. We can handle your case from the initial interview to any potential administrative appeal or higher court appeals if required.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '49.15.247.135', 1),
(158, '2023-10-23 13:33:56', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<h3>Canada Migration is a Leading immigration consultancy which specializes in dealing<br \\/>\\r\\nwith professional services related to immigration.<br \\/>\\r\\nWe are private owned Canadian Immigration Consultancy, based in Peterborough, Ontario, Canada.<br \\/>\\r\\nCanadaMigration.org assists individuals and families around the world with their visa application and immigration process.Most of Our legal team are practicing lawyers and the rest are licensed RCICs.<br \\/>\\r\\nWe can handle your case from the initial interview to any potential administrative appeal or higher court appeals if required.<\\/h3>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '106.193.162.107', 1),
(159, '2023-10-23 13:37:01', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>Canada Migration is a Leading immigration consultancy which specializes in dealing with professional services related to immigration. We are private-owned Canadian Immigration Consultancy, based in Peterborough, Ontario, Canada.<\\/p>\\r\\n\\r\\n<p>CanadaMigration.org assists individuals and families around the world with their visa application and immigration process.<\\/p>\\r\\n\\r\\n<p>Most of Our legal team are practicing lawyers and the rest are licensed RCICs. We can handle your case from the initial interview to any potential administrative appeal or higher court appeals if required.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '49.15.247.135', 1),
(160, '2023-10-23 13:37:06', 'Brand Updated [Brand Name: CanadaMigration, Info@canadamigration.org]', '{\"name\":\"CanadaMigration\",\"about_en\":\"<p>Canada Migration is a Leading immigration consultancy which specializes in dealing with professional services related to immigration. We are private-owned Canadian Immigration Consultancy, based in Peterborough, Ontario, Canada.<\\/p>\\r\\n\\r\\n<p>CanadaMigration.org assists individuals and families around the world with their visa application and immigration process.<\\/p>\\r\\n\\r\\n<p>Most of Our legal team are practicing lawyers and the rest are licensed RCICs. We can handle your case from the initial interview to any potential administrative appeal or higher court appeals if required.<\\/p>\",\"email\":\"Info@canadamigration.org\",\"phone_no\":\"1 289 801-7117\",\"language_id\":\"en\",\"about_fr\":\"\",\"website\":\"https:\\/\\/www.canadamigration.org\"}', 'brand', 19, '0', '49.15.247.135', 1),
(161, '2023-10-23 13:48:15', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '49.15.247.135', 33),
(162, '2023-10-23 13:49:32', 'User Updated [User Name: ketul Patel, ketul@gmail.com]', '{\"name\":\"ketul Patel\",\"email\":\"ketul@gmail.com\",\"brand\":\"53\",\"level\":\"1\",\"password\":\"Piyush@123\",\"user_id\":\"45\"}', 'user', 45, '0', '49.15.247.135', 1),
(163, '2023-10-23 14:03:02', 'New Representative Added [Representative Name: Piyush Chouvhan]', '{\"name\":\"Piyush Chouvhan\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of the Ontario Bar. He was called to the bar over 30 years ago. He has worked in law and in business including many years in banking and the past 4 years in immigration. He has an office in his hometown of Peterborough, Ontario. A graduate of U of Toronto Law he has intimate knowledge of immigration, having lived in 6 countries and experienced fresh starts many times in his life.\",\"brand_id\":\"19\",\"linkedin_id\":\"test\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush2310@gmail.com\",\"password\":\"$2y$10$SIddqY6kzZTB7sL7c6EKT.Vz4if6XcZeANsuPJKE2D\\/Y1EZWwyQRW\",\"photo\":\"\\/uploads\\/representative\\/1698069782_dummp profile - Copy.jpg\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698069782_fake-hand-drawn-autographs-set-handwritten-signature-scribble-for-business-certificate-or-letter-isolated-illustration-vector.jpg\",\"law_logo\":\"\\/uploads\\/law_logo\\/1698069782_logo.png\"}', 'representative', 11, '0', '49.15.247.135', 1),
(164, '2023-10-23 14:12:08', 'New Representative Added [Representative Name: test]', '{\"name\":\"test\",\"bio\":\"test\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ss\",\"license_number\":\"ss\",\"cba_number\":\"ss33\",\"email\":\"test21@gmail.com\",\"password\":\"$2y$10$zBkerlIYMVodWrL77uVcr.TdkqTuXe6rSPtPg7PqD4crv8XMWrcse\",\"photo\":\"\\/uploads\\/representative\\/1698070328_british.png\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698070328_british.png\",\"law_logo\":\"\\/uploads\\/law_logo\\/1698070328_law_logo.png\"}', 'representative', 12, '0', '106.193.162.107', 1),
(165, '2023-10-23 14:12:17', 'Representative Updated [Representative Name: test]', '{\"name\":\"test\",\"bio\":\"test\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ss\",\"license_number\":\"ss\",\"cba_number\":\"ss33\",\"email\":\"test21@gmail.com\",\"password\":\"$2y$10$zBkerlIYMVodWrL77uVcr.TdkqTuXe6rSPtPg7PqD4crv8XMWrcse\"}', 'representative', 12, '0', '106.193.162.107', 1),
(166, '2023-10-23 14:12:26', 'Representative Updated [Representative Name: testgggggggggggg]', '{\"name\":\"testgggggggggggg\",\"bio\":\"test\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ss\",\"license_number\":\"ss\",\"cba_number\":\"ss33\",\"email\":\"test21@gmail.com\",\"password\":\"$2y$10$zBkerlIYMVodWrL77uVcr.TdkqTuXe6rSPtPg7PqD4crv8XMWrcse\"}', 'representative', 12, '0', '106.193.162.107', 1),
(167, '2023-10-23 14:16:18', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"photo\":\"\\/uploads\\/representative\\/1698070578_jonpic.png\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698070578_jonsign.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(168, '2023-10-23 14:17:18', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698070638_jonsign.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(169, '2023-10-23 14:17:39', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"photo\":\"\\/uploads\\/representative\\/1698070659_jonpic.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(170, '2023-10-23 14:18:31', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"photo\":\"\\/uploads\\/representative\\/1698070711_jonpic.png\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698070711_jonsign.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(171, '2023-10-23 14:20:00', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698070800_law_logo.png\"}', 'representative', 1, '0', '106.193.162.107', 1),
(172, '2023-10-23 14:25:41', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698071141_british.png\"}', 'representative', 1, '0', '106.193.162.107', 1),
(173, '2023-10-23 14:27:56', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698071276_british.png\"}', 'representative', 1, '0', '106.193.162.107', 1),
(174, '2023-10-23 14:28:40', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698071320_stamp-img.png\"}', 'representative', 1, '0', '106.193.162.107', 1),
(175, '2023-10-23 14:29:13', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"photo\":\"\\/uploads\\/representative\\/1698071353_Simran-pic.png\"}', 'representative', 1, '0', '106.193.162.107', 1),
(176, '2023-10-23 14:32:11', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$wFvZzcmMvXZ\\/I6xuJf3uWeQkW1ASumKL5..x8iVzQeOcQGV73JjMq\",\"photo\":\"\\/uploads\\/representative\\/1698071531_Pooja-pic.png\"}', 'representative', 1, '0', '106.193.162.107', 1),
(177, '2023-10-23 14:35:04', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698071704_jonsign.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(178, '2023-10-23 14:35:21', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"photo\":\"\\/uploads\\/representative\\/1698071721_jonpic.png\",\"signature_photo\":\"\\/uploads\\/representative_signature\\/1698071721_jonsign.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(179, '2023-10-23 14:35:34', 'Representative Updated [Representative Name: Jonatan Zahav]', '{\"name\":\"Jonatan Zahav\",\"bio\":\"Adv. Jonatan Zahav is the Head of the Legal Team and a member of\\r\\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\\r\\nworked in law and in business including many years in banking and\\r\\nthe past 4 years in immigration. He has an office in his hometown of\\r\\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\\r\\nknowledge of immigration, having lived in 6 countries and experienced\\r\\nfresh starts many times in his life.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"fdfdf\",\"license_number\":\"Lawyer | LSO Membership | 22731N\",\"cba_number\":\"ABC123\",\"email\":\"piyush0210@mailinator.com\",\"password\":\"$2y$10$0LPY9UeLDbn6nbGtvEwaDu\\/8DoWgQWn3\\/3XDPbhl39r1.cVlernn6\",\"photo\":\"\\/uploads\\/representative\\/1698071734_jonpic.png\"}', 'representative', 6, '0', '49.15.247.135', 1),
(180, '2023-10-23 14:45:27', 'PDF Updated [Name: Piyush, piyushc.knp@gmail.com]', '{\"visa_type_id\":\"8,9,10\",\"recommended_visa_type\":\"9\",\"email\":\"piyushc.knp@gmail.com\",\"representative_id\":48,\"name\":\"Piyush\",\"credit_score\":\"550\",\"country\":\"India\",\"occupation\":\"Service\",\"education_level\":\"B.E.\",\"age\":\"29\",\"case_number\":\"ABC123\",\"is_sent_mail\":0,\"phone_no\":\"8956895689\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available\"}', 'visa-type', 35, '19,53', '49.15.247.135', 48),
(181, '2023-10-25 10:49:40', 'Representative Updated [Representative Name: Pooja Chawla]', '{\"name\":\"Pooja Chawla\",\"bio\":\"Pooja Chawla is in the immigration sector over the past\\r\\n10 years, she\\r\\nhas assisted clients with Express Entry, Visitor Visas, Student\\r\\nPermits, Spousal Sponsorships, and many other programs.\\r\\nShe is passionate about immigration and aim to use her knowledge to\\r\\nassist our clients achieve their immigration goals successfully. The\\r\\npathways to Canada are many and are confusing. Let me help you find\\r\\nthe right path.\",\"brand_id\":\"19,53\",\"linkedin_id\":\"ankita-patel\",\"license_number\":\"RCIC Immigration Consultant | CCRC Membership| R711558\",\"cba_number\":\"456ghj\",\"email\":\"ankitar@gmail.com\",\"password\":\"$2y$10$viYJYysOCncXWgiiE.RUouw0YISy3J3YOT0NENATz8H2g1YBZbeWy\"}', 'representative', 1, '0', '106.193.232.87', 1),
(182, '2023-10-25 12:51:05', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.232.87', 18),
(183, '2023-10-25 13:44:47', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.232.87', 18),
(184, '2023-10-25 13:45:03', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.232.87', 18),
(185, '2023-10-25 13:47:38', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 8, '19', '106.193.232.87', 18),
(186, '2023-10-25 14:12:10', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 1, '19', '106.193.232.87', 18),
(187, '2023-10-25 14:13:06', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 2, '19', '106.193.232.87', 18),
(188, '2023-10-25 14:14:33', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 2, '19', '106.193.232.87', 18),
(189, '2023-10-25 14:15:13', 'Visa Type Updated [Visa Name: British Columbia Provincial Nominee Program]', '{\"name\":\"British Columbia Provincial Nominee Program\",\"brand_id\":\"19\"}', 'visa-type', 3, '19', '106.193.232.87', 18),
(190, '2023-10-25 14:19:43', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 2, '19', '106.193.232.87', 18),
(191, '2023-10-25 14:20:27', 'Visa Type Updated [Visa Name: Alberta Immigration Rural Renewal Stream]', '{\"name\":\"Alberta Immigration Rural Renewal Stream\",\"brand_id\":\"19\"}', 'visa-type', 2, '19', '106.193.232.87', 18),
(192, '2023-10-25 14:34:08', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 1, '19', '106.193.232.87', 18),
(193, '2023-10-25 14:56:57', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 1, '19', '106.193.232.87', 18),
(194, '2023-10-26 05:21:59', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 1, '19', '106.193.232.87', 18),
(195, '2023-10-26 05:22:10', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 1, '19', '106.193.232.87', 18),
(196, '2023-10-26 05:23:34', 'Visa Type Updated [Visa Name: Atlantic High Skilled Program]', '{\"name\":\"Atlantic High Skilled Program\",\"brand_id\":\"19\"}', 'visa-type', 1, '19', '106.193.232.87', 18),
(197, '2023-10-30 06:39:41', 'New PDF Added [Name: Shubham Khatri, khatrishubham121@gmail.com]', '{\"visa_type_id\":\"4,5\",\"recommended_visa_type\":\"4\",\"email\":\"khatrishubham121@gmail.com\",\"representative_id\":27,\"name\":\"Shubham Khatri\",\"credit_score\":\"345\",\"country\":\"India\",\"occupation\":\"Support Amazon\",\"education_level\":\"Degree\",\"age\":\"24\",\"case_number\":\"23489\",\"is_sent_mail\":0,\"phone_no\":\"44 7459 100735\",\"city\":\"surat\",\"language_code\":\"en\",\"conclusion\":\"test\"}', 'visa-type', 55, '19,53', '103.206.138.159', 27),
(198, '2023-10-30 06:40:10', 'PDF Updated [Name: Shubham Khatri, khatrishubham121@gmail.com]', '{\"visa_type_id\":\"4,5\",\"recommended_visa_type\":\"4\",\"email\":\"khatrishubham121@gmail.com\",\"representative_id\":27,\"name\":\"Shubham Khatri\",\"credit_score\":\"345\",\"country\":\"India\",\"occupation\":\"Support Amazon\",\"education_level\":\"Degree\",\"age\":\"24\",\"case_number\":\"23489\",\"is_sent_mail\":0,\"phone_no\":\"44 7459 100735\",\"city\":\"surat\",\"language_code\":\"en\",\"conclusion\":\"test sssssssssssssss\"}', 'visa-type', 55, '19,53', '103.206.138.159', 27),
(199, '2023-10-30 07:52:52', 'New PDF Added [Name: Piyush Chouvhan, piyush3010@mailinator.com]', '{\"visa_type_id\":\"1,2\",\"recommended_visa_type\":\"1\",\"email\":\"piyush3010@mailinator.com\",\"representative_id\":48,\"name\":\"Piyush Chouvhan\",\"credit_score\":\"500\",\"country\":\"India\",\"occupation\":\"Software Engineer\",\"education_level\":\"Bachelor\'s degree \\/ Degree of 3 Years or More\",\"age\":\"28\",\"case_number\":\"328\",\"is_sent_mail\":0,\"phone_no\":\"919372395656\",\"city\":\"Amravati\",\"language_code\":\"fr\",\"conclusion\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum\"}', 'visa-type', 56, '19,53', '49.15.250.35', 48),
(200, '2023-10-30 11:49:51', 'New PDF Added [Name: Piyush Chouvhan, piyushgchouvhan@gmail.com]', '{\"visa_type_id\":\"1,2,3\",\"recommended_visa_type\":\"1\",\"email\":\"piyushgchouvhan@gmail.com\",\"representative_id\":48,\"name\":\"Piyush Chouvhan\",\"credit_score\":\"550\",\"country\":\"India\",\"occupation\":\"Engineer\",\"education_level\":\"Master\'s Degree\",\"age\":\"30\",\"case_number\":\"598\",\"is_sent_mail\":0,\"phone_no\":\"919865895689\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available\"}', 'visa-type', 57, '19,53', '49.15.250.57', 48),
(201, '2023-10-30 14:22:05', 'New PDF Added [Name: Piyush Chouvhan, piyush.chouvhan@gmail.com]', '{\"visa_type_id\":\"1,2,3\",\"recommended_visa_type\":\"3\",\"email\":\"piyush.chouvhan@gmail.com\",\"representative_id\":48,\"name\":\"Piyush Chouvhan\",\"credit_score\":\"550\",\"country\":\"India\",\"occupation\":\"Marketing Manager\",\"education_level\":\"PHD\",\"age\":\"28\",\"case_number\":\"5689\",\"is_sent_mail\":0,\"phone_no\":\"91895689568956\",\"city\":\"Amravati\",\"language_code\":\"fr\",\"conclusion\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\"}', 'visa-type', 58, '19,53', '49.15.246.127', 48),
(202, '2023-10-31 05:33:24', 'New PDF Added [Name: Piyush Chouvhan, champeshwari.knp@gmail.com]', '{\"visa_type_id\":\"1,2,3\",\"recommended_visa_type\":\"3\",\"email\":\"champeshwari.knp@gmail.com\",\"representative_id\":48,\"name\":\"Piyush Chouvhan\",\"credit_score\":\"550\",\"country\":\"India\",\"occupation\":\"Business Owner\",\"education_level\":\"Two or more Bachelor\'s \\/ Post secondary Degree\",\"age\":\"27\",\"case_number\":\"568\",\"is_sent_mail\":0,\"phone_no\":\"918956895892\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":\"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\"}', 'visa-type', 59, '19,53', '49.15.244.13', 48),
(203, '2023-11-02 07:28:54', 'New PDF Added [Name: Piyush Chouvhan, piyushc.knp@gmail.com]', '{\"visa_type_id\":\"1,2,3\",\"recommended_visa_type\":\"1\",\"email\":\"piyushc.knp@gmail.com\",\"representative_id\":48,\"name\":\"Piyush Chouvhan\",\"credit_score\":\"550\",\"country\":\"India\",\"occupation\":\"Business Owner\",\"education_level\":\"Bachelor\'s degree \\/ Degree of 3 Years or More\",\"age\":\"28\",\"case_number\":\"KNP007\",\"is_sent_mail\":0,\"phone_no\":\"918956895689\",\"city\":\"Amravati\",\"language_code\":\"en\",\"conclusion\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available\"}', 'visa-type', 60, '19,53', '49.15.248.92', 48);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(240) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_fr` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `email`, `phone_no`, `logo`, `about_en`, `language_id`, `website`, `about_fr`, `created_at`, `updated_at`) VALUES
(19, 'CanadaMigration', 'Info@canadamigration.org', '1 289 801-7117', '/uploads/1697448845_1697179517_footer-logo.png.png.png', '<p>Canada Migration is a Leading immigration consultancy which specializes in dealing with professional services related to immigration. We are private-owned Canadian Immigration Consultancy, based in Peterborough, Ontario, Canada.</p>\r\n\r\n<p>CanadaMigration.org assists individuals and families around the world with their visa application and immigration process.</p>\r\n\r\n<p>Most of Our legal team are practicing lawyers and the rest are licensed RCICs. We can handle your case from the initial interview to any potential administrative appeal or higher court appeals if required.</p>', 'en', 'https://www.canadamigration.org', '', '2023-10-07 16:05:48', '2023-10-23 13:37:01'),
(53, 'VisaCanada', 'visacanada@gmail.com', '9988558855', '/uploads/1697525219_logo.png.png', '<h3><strong>Approved and regulated professionals</strong></h3>\r\n\r\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.</p>\r\n\r\n<p><strong>Improved customer portal</strong></p>\r\n\r\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.</p>\r\n\r\n<h3><strong>Approved and regulated professionals</strong></h3>\r\n\r\n<p>With Visascanada.fr you can have peace of mind knowing that you are in the hands of professionals.&nbsp;Our collaborators are RCICs and licensed and regulated Canadian lawyers who help you optimize your application process and guide you to Canada.&nbsp;Your file will be managed in its entirety by a CanadaMigration representative, legally authorized to represent you under Canadian law.</p>\r\n\r\n<p><strong>Improved customer portal</strong></p>\r\n\r\n<p>As soon as you register, the easy-to-access Visascanada.fr customer portal allows you to follow the progress of your file on any computer or mobile phone.&nbsp;At the same time, our team manages your file using the most efficient technological systems in order to help you complete your documents and ensure that they are submitted to the IRCC on time.</p>', 'en', 'https://visacanada.com', '', '2023-10-17 06:46:59', '2023-10-23 11:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `orientation` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `code`, `orientation`, `created_at`, `updated_at`) VALUES
(4, 'English', 'en', 'ltr', '2023-08-10 17:22:31', '2023-08-10 17:22:31'),
(5, 'French', 'fr', 'ltr', '2023-08-10 17:23:53', '2023-08-11 12:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int NOT NULL,
  `brand_id` varchar(100) NOT NULL,
  `user_id` int NOT NULL,
  `user_type` varchar(100) NOT NULL COMMENT '1=SubAdmin,2=Representatives',
  `ipaddress` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `brand_id`, `user_id`, `user_type`, `ipaddress`, `country`, `datetime`, `updated_at`) VALUES
(1, '11', 27, 'Representatives', '', '', '2023-09-21 17:10:31', '2023-09-21 17:10:31'),
(2, '11', 18, 'SubAdmin', '', '', '2023-09-21 17:11:01', '2023-09-21 17:11:01'),
(3, '11', 18, 'SubAdmin', '', '', '2023-09-22 04:33:54', '2023-09-22 04:33:54'),
(4, '4', 33, 'SubAdmin', '', '', '2023-09-22 10:33:48', '2023-09-22 10:33:48'),
(5, '11', 27, 'Representatives', '', '', '2023-09-22 10:49:51', '2023-09-22 10:49:51'),
(6, '4', 33, 'SubAdmin', '', '', '2023-09-22 10:56:27', '2023-09-22 10:56:27'),
(7, '11', 18, 'SubAdmin', '', '', '2023-09-22 11:05:40', '2023-09-22 11:05:40'),
(8, '11', 27, 'Representatives', '', '', '2023-09-22 11:07:44', '2023-09-22 11:07:44'),
(9, '4', 39, 'SubAdmin', '', '', '2023-09-22 11:34:02', '2023-09-22 11:34:02'),
(10, '4', 40, 'SubAdmin', '', '', '2023-09-22 11:58:04', '2023-09-22 11:58:04'),
(11, '4', 33, 'SubAdmin', '', '', '2023-09-22 12:17:47', '2023-09-22 12:17:47'),
(15, '11', 27, 'Representatives', '', '', '2023-09-22 13:10:58', '2023-09-22 13:10:58'),
(18, '11', 27, 'Representatives', '', '', '2023-09-22 13:13:06', '2023-09-22 13:13:06'),
(19, '11', 27, 'Representatives', '', '', '2023-09-25 05:07:58', '2023-09-25 05:07:58'),
(20, '11', 27, 'Representatives', '', '', '2023-09-25 09:17:37', '2023-09-25 09:17:37'),
(21, '11', 27, 'Representatives', '', '', '2023-09-26 08:34:56', '2023-09-26 08:34:56'),
(22, '11', 27, 'Representatives', '', '', '2023-09-26 11:56:18', '2023-09-26 11:56:18'),
(23, '11', 27, 'Representatives', '', '', '2023-09-26 12:44:24', '2023-09-26 12:44:24'),
(24, '11', 27, 'Representatives', '', '', '2023-09-26 12:44:56', '2023-09-26 12:44:56'),
(26, '11', 27, 'Representatives', '', '', '2023-09-26 16:20:28', '2023-09-26 16:20:28'),
(27, '11', 27, 'Representatives', '', '', '2023-09-27 05:16:45', '2023-09-27 05:16:45'),
(28, '11', 18, 'SubAdmin', '', '', '2023-09-27 05:58:52', '2023-09-27 05:58:52'),
(29, '11', 27, 'Representatives', '', '', '2023-09-27 06:31:03', '2023-09-27 06:31:03'),
(30, '11', 27, 'Representatives', '', '', '2023-09-27 09:54:09', '2023-09-27 09:54:09'),
(31, '11', 27, 'Representatives', '', '', '2023-09-28 04:29:39', '2023-09-28 04:29:39'),
(32, '11', 27, 'Representatives', '', '', '2023-09-28 07:12:09', '2023-09-28 07:12:09'),
(33, '11', 18, 'SubAdmin', '', '', '2023-09-28 07:12:32', '2023-09-28 07:12:32'),
(34, '11', 27, 'Representatives', '', '', '2023-09-28 09:22:17', '2023-09-28 09:22:17'),
(35, '11', 27, 'Representatives', '', '', '2023-09-28 11:06:31', '2023-09-28 11:06:31'),
(37, '11', 27, 'Representatives', '', '', '2023-09-28 11:31:10', '2023-09-28 11:31:10'),
(38, '11', 27, 'Representatives', '', '', '2023-09-29 04:37:59', '2023-09-29 04:37:59'),
(39, '11', 27, 'Representatives', '', '', '2023-09-29 05:00:58', '2023-09-29 05:00:58'),
(40, '11', 42, 'SubAdmin', '', '', '2023-09-29 05:53:49', '2023-09-29 05:53:49'),
(41, '11', 42, 'SubAdmin', '', '', '2023-09-29 06:13:58', '2023-09-29 06:13:58'),
(42, '11', 46, 'Representatives', '', '', '2023-09-29 06:17:34', '2023-09-29 06:17:34'),
(43, '11', 46, 'Representatives', '', '', '2023-09-29 06:17:49', '2023-09-29 06:17:49'),
(44, '11', 42, 'SubAdmin', '', '', '2023-09-29 06:22:13', '2023-09-29 06:22:13'),
(45, '11', 46, 'Representatives', '', '', '2023-09-29 06:26:57', '2023-09-29 06:26:57'),
(46, '11', 18, 'SubAdmin', '', '', '2023-09-29 06:50:35', '2023-09-29 06:50:35'),
(47, '11', 27, 'Representatives', '', '', '2023-09-29 08:42:18', '2023-09-29 08:42:18'),
(53, '11', 18, 'SubAdmin', '', '', '2023-09-29 13:42:19', '2023-09-29 13:42:19'),
(58, '11', 46, 'Representatives', '', '', '2023-10-02 04:04:23', '2023-10-02 04:04:23'),
(59, '11', 42, 'SubAdmin', '', '', '2023-10-02 04:07:01', '2023-10-02 04:07:01'),
(60, '4', 48, 'Representatives', '', '', '2023-10-02 04:56:44', '2023-10-02 04:56:44'),
(62, '11', 42, 'SubAdmin', '', '', '2023-10-02 05:28:42', '2023-10-02 05:28:42'),
(63, '11', 42, 'SubAdmin', '', '', '2023-10-02 05:48:06', '2023-10-02 05:48:06'),
(64, '11', 18, 'SubAdmin', '', '', '2023-10-02 05:49:34', '2023-10-02 05:49:34'),
(65, '4', 48, 'Representatives', '', '', '2023-10-02 05:50:38', '2023-10-02 05:50:38'),
(66, '4,11', 48, 'Representatives', '', '', '2023-10-02 05:56:54', '2023-10-02 05:56:54'),
(67, '4,11', 48, 'Representatives', '', '', '2023-10-02 05:57:34', '2023-10-02 05:57:34'),
(68, '11', 18, 'SubAdmin', '', '', '2023-10-02 06:06:13', '2023-10-02 06:06:13'),
(70, '4,11', 48, 'Representatives', '', '', '2023-10-02 06:55:10', '2023-10-02 06:55:10'),
(72, '11', 18, 'SubAdmin', '', '', '2023-10-02 11:47:25', '2023-10-02 11:47:25'),
(73, '11', 18, 'SubAdmin', '', '', '2023-10-02 12:18:28', '2023-10-02 12:18:28'),
(77, '11', 42, 'SubAdmin', '', '', '2023-10-03 04:49:20', '2023-10-03 04:49:20'),
(78, '11', 46, 'Representatives', '', '', '2023-10-03 04:51:31', '2023-10-03 04:51:31'),
(79, '4', 45, 'SubAdmin', '', '', '2023-10-03 05:03:35', '2023-10-03 05:03:35'),
(80, '11', 46, 'Representatives', '', '', '2023-10-03 05:14:28', '2023-10-03 05:14:28'),
(81, '11', 46, 'Representatives', '', '', '2023-10-03 05:18:20', '2023-10-03 05:18:20'),
(82, '11', 18, 'SubAdmin', '', '', '2023-10-03 05:43:46', '2023-10-03 05:43:46'),
(86, '11', 18, 'SubAdmin', '', '', '2023-10-03 09:14:04', '2023-10-03 09:14:04'),
(90, '4', 27, 'Representatives', '', '', '2023-10-04 04:44:13', '2023-10-04 04:44:13'),
(91, '4', 27, 'Representatives', '', '', '2023-10-04 05:35:38', '2023-10-04 05:35:38'),
(92, '11', 18, 'SubAdmin', '', '', '2023-10-04 09:54:13', '2023-10-04 09:54:13'),
(93, '11', 27, 'Representatives', '', '', '2023-10-04 11:00:43', '2023-10-04 11:00:43'),
(98, '11', 18, 'SubAdmin', '', '', '2023-10-04 11:22:34', '2023-10-04 11:22:34'),
(100, '11', 27, 'Representatives', '', '', '2023-10-04 12:05:52', '2023-10-04 12:07:55'),
(101, '4', 18, 'SubAdmin', '', '', '2023-10-04 12:09:27', '2023-10-04 12:13:01'),
(102, '11,4', 27, 'Representatives', '', '', '2023-10-04 12:35:55', '2023-10-04 12:35:55'),
(103, '4', 45, 'SubAdmin', '', '', '2023-10-04 12:36:34', '2023-10-04 12:36:34'),
(104, '11,4', 27, 'Representatives', '', '', '2023-10-04 13:36:37', '2023-10-04 13:36:37'),
(105, '11', 18, 'SubAdmin', '', '', '2023-10-04 14:29:01', '2023-10-04 14:29:01'),
(106, '4', 45, 'SubAdmin', '', '', '2023-10-05 03:58:06', '2023-10-05 03:58:06'),
(107, '4,11', 48, 'Representatives', '', '', '2023-10-05 04:05:26', '2023-10-05 04:05:26'),
(108, '4', 45, 'SubAdmin', '', '', '2023-10-05 04:20:00', '2023-10-05 04:20:00'),
(109, '4', 48, 'Representatives', '', '', '2023-10-05 04:54:48', '2023-10-05 04:58:27'),
(110, '11', 18, 'SubAdmin', '', '', '2023-10-05 05:12:54', '2023-10-05 05:12:54'),
(111, '11,4', 27, 'Representatives', '', '', '2023-10-05 05:13:29', '2023-10-05 05:13:29'),
(112, '11', 18, 'SubAdmin', '', '', '2023-10-05 05:13:52', '2023-10-05 05:13:52'),
(113, '4', 45, 'SubAdmin', '', '', '2023-10-05 05:43:04', '2023-10-05 05:43:04'),
(114, '4', 52, 'SubAdmin', '', '', '2023-10-05 05:48:14', '2023-10-05 05:48:14'),
(115, '4', 45, 'SubAdmin', '', '', '2023-10-05 05:50:11', '2023-10-05 05:50:11'),
(116, '11', 52, 'SubAdmin', '', '', '2023-10-05 05:51:52', '2023-10-05 05:51:52'),
(117, '4,11', 48, 'Representatives', '', '', '2023-10-05 06:11:35', '2023-10-05 06:11:35'),
(118, '11,4', 27, 'Representatives', '', '', '2023-10-05 06:16:14', '2023-10-05 06:16:14'),
(119, '4', 45, 'SubAdmin', '', '', '2023-10-05 06:19:14', '2023-10-05 06:19:14'),
(120, '11,4', 27, 'Representatives', '', '', '2023-10-05 07:24:19', '2023-10-05 07:24:19'),
(121, '11,4', 27, 'Representatives', '', '', '2023-10-05 09:12:37', '2023-10-05 09:12:37'),
(122, '11,4', 27, 'Representatives', '', '', '2023-10-05 10:15:16', '2023-10-05 10:15:16'),
(123, '11,4', 27, 'Representatives', '', '', '2023-10-05 11:20:48', '2023-10-05 11:20:48'),
(124, '11,4', 27, 'Representatives', '', '', '2023-10-05 12:36:08', '2023-10-05 12:36:08'),
(125, '11,4', 27, 'Representatives', '', '', '2023-10-05 13:48:45', '2023-10-05 13:48:45'),
(126, '11,4', 27, 'Representatives', '', '', '2023-10-05 17:21:57', '2023-10-05 17:21:57'),
(127, '11', 18, 'SubAdmin', '', '', '2023-10-05 17:58:14', '2023-10-05 17:58:14'),
(128, '4', 45, 'SubAdmin', '', '', '2023-10-06 04:58:16', '2023-10-06 04:58:16'),
(129, '11', 48, 'Representatives', '', '', '2023-10-06 05:08:54', '2023-10-06 05:08:55'),
(130, '11', 27, 'Representatives', '', '', '2023-10-06 05:13:14', '2023-10-06 05:31:16'),
(131, '4', 45, 'SubAdmin', '', '', '2023-10-06 06:00:35', '2023-10-06 06:00:35'),
(132, '4', 45, 'SubAdmin', '', '', '2023-10-06 06:10:13', '2023-10-06 06:10:13'),
(133, '11', 48, 'Representatives', '', '', '2023-10-06 06:13:58', '2023-10-06 06:13:59'),
(134, '11', 27, 'Representatives', '', '', '2023-10-06 06:18:55', '2023-10-06 06:35:48'),
(135, '11', 18, 'SubAdmin', '', '', '2023-10-06 06:36:27', '2023-10-06 06:36:27'),
(136, '11', 48, 'Representatives', '', '', '2023-10-06 06:38:07', '2023-10-06 06:38:08'),
(137, '11', 18, 'SubAdmin', '', '', '2023-10-06 07:14:55', '2023-10-06 07:14:55'),
(138, '11', 27, 'Representatives', '', '', '2023-10-06 07:16:29', '2023-10-06 07:16:37'),
(139, '4', 45, 'SubAdmin', '', '', '2023-10-06 08:21:22', '2023-10-06 08:21:22'),
(140, '11', 48, 'Representatives', '', '', '2023-10-06 08:27:01', '2023-10-06 08:27:03'),
(141, '11', 18, 'SubAdmin', '', '', '2023-10-06 12:10:54', '2023-10-06 12:10:54'),
(142, '11,4', 27, 'Representatives', '', '', '2023-10-06 12:12:23', '2023-10-06 12:12:23'),
(143, '11', 18, 'SubAdmin', '', '', '2023-10-08 12:26:24', '2023-10-08 12:26:24'),
(144, '11', 18, 'SubAdmin', '', '', '2023-10-08 12:27:46', '2023-10-08 12:27:46'),
(145, '19,4', 27, 'Representatives', '', '', '2023-10-08 13:24:40', '2023-10-08 13:24:40'),
(146, '4', 27, 'Representatives', '', '', '2023-10-09 04:38:15', '2023-10-09 04:38:18'),
(147, '4', 49, 'SubAdmin', '', '', '2023-10-09 05:10:18', '2023-10-09 05:10:18'),
(148, '19', 48, 'Representatives', '', '', '2023-10-09 05:10:54', '2023-10-09 05:11:08'),
(149, '4', 52, 'SubAdmin', '', '', '2023-10-09 05:12:51', '2023-10-09 05:21:09'),
(150, '4', 27, 'Representatives', '', '', '2023-10-09 05:36:15', '2023-10-09 05:36:18'),
(151, '4', 27, 'Representatives', '', '', '2023-10-09 05:47:38', '2023-10-09 05:52:16'),
(152, '4', 27, 'Representatives', '', '', '2023-10-09 05:52:39', '2023-10-09 05:54:13'),
(153, '4', 27, 'Representatives', '', '', '2023-10-09 05:54:42', '2023-10-09 05:54:45'),
(154, '4', 49, 'SubAdmin', '', '', '2023-10-09 05:57:24', '2023-10-09 05:57:24'),
(155, '4', 49, 'SubAdmin', '', '', '2023-10-09 06:00:32', '2023-10-09 06:00:32'),
(156, '4', 49, 'SubAdmin', '', '', '2023-10-09 06:01:29', '2023-10-09 06:06:18'),
(157, '4', 27, 'Representatives', '', '', '2023-10-09 06:06:33', '2023-10-09 06:08:48'),
(158, '4', 27, 'Representatives', '', '', '2023-10-09 06:09:09', '2023-10-09 06:10:49'),
(159, '4', 27, 'Representatives', '', '', '2023-10-09 06:11:05', '2023-10-09 06:11:06'),
(160, '4', 27, 'Representatives', '', '', '2023-10-09 06:16:03', '2023-10-09 06:16:07'),
(161, '4', 27, 'Representatives', '', '', '2023-10-09 06:16:57', '2023-10-09 06:16:58'),
(162, '19', 48, 'Representatives', '', '', '2023-10-09 06:24:39', '2023-10-09 06:24:41'),
(163, '4', 45, 'SubAdmin', '', '', '2023-10-09 06:26:27', '2023-10-09 06:26:27'),
(164, '19', 48, 'Representatives', '', '', '2023-10-09 06:28:26', '2023-10-09 06:28:27'),
(165, '4', 27, 'Representatives', '', '', '2023-10-09 06:34:11', '2023-10-09 06:34:13'),
(166, '4', 27, 'Representatives', '', '', '2023-10-09 06:40:19', '2023-10-09 06:41:05'),
(167, '4', 27, 'Representatives', '', '', '2023-10-09 06:41:26', '2023-10-09 06:42:41'),
(168, '4', 27, 'Representatives', '', '', '2023-10-09 06:43:06', '2023-10-09 06:54:49'),
(169, '4', 27, 'Representatives', '', '', '2023-10-09 06:55:10', '2023-10-09 06:56:19'),
(170, '19', 42, 'SubAdmin', '', '', '2023-10-09 06:57:19', '2023-10-09 06:57:19'),
(171, '4', 48, 'Representatives', '', '', '2023-10-09 06:58:14', '2023-10-09 06:58:41'),
(172, '4', 27, 'Representatives', '', '', '2023-10-09 06:59:03', '2023-10-09 07:05:14'),
(173, '19', 48, 'Representatives', '', '', '2023-10-09 07:05:19', '2023-10-09 07:05:20'),
(174, '4', 48, 'Representatives', '', '', '2023-10-09 07:06:32', '2023-10-09 07:07:42'),
(175, '4', 45, 'SubAdmin', '', '', '2023-10-09 07:08:11', '2023-10-09 07:09:28'),
(176, '4', 27, 'Representatives', '', '', '2023-10-09 07:09:47', '2023-10-09 07:11:13'),
(177, '4', 27, 'Representatives', '', '', '2023-10-09 07:11:33', '2023-10-09 07:11:33'),
(178, '19', 27, 'Representatives', '', '', '2023-10-09 07:13:08', '2023-10-09 07:13:17'),
(179, '4', 27, 'Representatives', '', '', '2023-10-09 07:13:38', '2023-10-09 07:14:35'),
(180, '19', 48, 'Representatives', '', '', '2023-10-09 07:16:24', '2023-10-09 07:16:25'),
(181, '19', 48, 'Representatives', '', '', '2023-10-09 07:17:43', '2023-10-09 07:17:47'),
(182, '19', 18, 'SubAdmin', '', '', '2023-10-09 07:25:43', '2023-10-09 07:25:43'),
(183, '19', 48, 'Representatives', '', '', '2023-10-09 07:26:15', '2023-10-09 07:26:16'),
(184, '4', 45, 'SubAdmin', '', '', '2023-10-09 08:33:58', '2023-10-09 08:33:58'),
(185, '19', 48, 'Representatives', '', '', '2023-10-09 08:38:59', '2023-10-09 08:39:00'),
(186, '19', 48, 'Representatives', '', '', '2023-10-09 09:41:06', '2023-10-09 09:41:07'),
(187, '19', 48, 'Representatives', '', '', '2023-10-09 09:42:04', '2023-10-09 09:42:40'),
(188, '4', 45, 'SubAdmin', '', '', '2023-10-09 09:43:37', '2023-10-09 09:43:37'),
(189, '19', 48, 'Representatives', '', '', '2023-10-09 09:46:00', '2023-10-09 09:46:00'),
(190, '4', 45, 'SubAdmin', '', '', '2023-10-09 09:46:45', '2023-10-09 09:46:45'),
(191, '4', 45, 'SubAdmin', '', '', '2023-10-09 09:48:30', '2023-10-09 09:48:30'),
(192, '19', 48, 'Representatives', '', '', '2023-10-09 09:50:49', '2023-10-09 09:50:49'),
(193, '19', 48, 'Representatives', '', '', '2023-10-09 09:52:57', '2023-10-09 09:52:58'),
(194, '4', 27, 'Representatives', '', '', '2023-10-09 09:55:37', '2023-10-09 09:55:41'),
(195, '4,24', 59, 'Representatives', '', '', '2023-10-09 10:00:07', '2023-10-09 10:00:07'),
(196, '4', 45, 'SubAdmin', '', '', '2023-10-09 10:07:22', '2023-10-09 10:07:22'),
(197, '19', 18, 'SubAdmin', '', '', '2023-10-09 10:15:38', '2023-10-09 10:15:38'),
(198, '19', 60, 'SubAdmin', '', '', '2023-10-09 10:28:15', '2023-10-09 10:28:15'),
(199, '4,24', 59, 'Representatives', '', '', '2023-10-09 10:29:55', '2023-10-09 10:29:55'),
(200, '19', 60, 'SubAdmin', '', '', '2023-10-09 10:45:13', '2023-10-09 10:45:13'),
(201, '4', 27, 'Representatives', '', '', '2023-10-09 11:27:41', '2023-10-09 11:27:43'),
(202, '4', 27, 'Representatives', '', '', '2023-10-09 13:07:06', '2023-10-09 13:11:14'),
(203, '4', 27, 'Representatives', '106.213.176.66', 'IN', '2023-10-09 14:57:28', '2023-10-09 15:05:40'),
(204, '4', 27, 'Representatives', '103.240.34.122', 'IN', '2023-10-10 04:38:45', '2023-10-10 06:23:39'),
(205, '19', 18, 'SubAdmin', '106.213.176.66', 'IN', '2023-10-11 14:44:07', '2023-10-11 14:44:07'),
(206, '4,24', 59, 'Representatives', '106.213.176.66', 'IN', '2023-10-12 03:49:32', '2023-10-12 03:49:32'),
(207, '19', 18, 'SubAdmin', '106.213.176.66', 'IN', '2023-10-12 03:56:17', '2023-10-12 03:56:17'),
(208, '4', 27, 'Representatives', '103.240.34.122', 'IN', '2023-10-12 05:12:54', '2023-10-12 05:12:56'),
(209, '4', 33, 'SubAdmin', '49.15.249.13', 'IN', '2023-10-12 05:21:14', '2023-10-12 05:21:14'),
(210, '4', 33, 'SubAdmin', '49.15.249.13', 'IN', '2023-10-12 05:25:33', '2023-10-12 05:25:33'),
(211, '4', 33, 'SubAdmin', '49.15.249.13', 'IN', '2023-10-12 06:10:47', '2023-10-12 06:10:47'),
(212, '19', 48, 'Representatives', '49.15.249.13', 'IN', '2023-10-12 06:20:55', '2023-10-12 06:22:05'),
(213, '19,24', 48, 'Representatives', '49.15.249.13', 'IN', '2023-10-12 06:31:13', '2023-10-12 06:31:13'),
(214, '19', 48, 'Representatives', '49.15.249.13', 'IN', '2023-10-12 06:31:33', '2023-10-12 06:34:00'),
(215, '4', 33, 'SubAdmin', '49.15.249.13', 'IN', '2023-10-12 06:34:15', '2023-10-12 06:34:15'),
(216, '4', 27, 'Representatives', '106.213.176.66', 'IN', '2023-10-12 10:25:11', '2023-10-12 10:25:14'),
(217, '19', 18, 'SubAdmin', '106.213.176.66', 'IN', '2023-10-12 11:26:46', '2023-10-12 11:26:46'),
(218, '4', 27, 'Representatives', '106.213.176.66', 'IN', '2023-10-12 11:45:23', '2023-10-12 11:45:24'),
(219, '4', 27, 'Representatives', '103.240.34.122', 'IN', '2023-10-12 11:54:02', '2023-10-12 11:54:02'),
(220, '4', 27, 'Representatives', '106.213.176.66', 'IN', '2023-10-12 12:02:09', '2023-10-12 12:02:10'),
(221, '4', 27, 'Representatives', '106.213.176.66', 'IN', '2023-10-12 12:08:17', '2023-10-12 12:08:21'),
(222, '19', 18, 'SubAdmin', '106.213.176.66', 'IN', '2023-10-13 04:27:18', '2023-10-13 04:27:18'),
(223, '4', 27, 'Representatives', '106.213.176.66', 'IN', '2023-10-13 04:49:28', '2023-10-13 04:49:29'),
(224, '19', 18, 'SubAdmin', '106.213.176.66', 'IN', '2023-10-13 08:09:24', '2023-10-13 08:09:24'),
(225, '19', 27, 'Representatives', '49.34.220.221', 'IN', '2023-10-13 09:51:58', '2023-10-13 09:51:59'),
(226, '19', 33, 'SubAdmin', '49.15.248.6', 'IN', '2023-10-13 10:09:49', '2023-10-13 10:09:49'),
(227, '19', 48, 'Representatives', '49.15.248.6', 'IN', '2023-10-13 10:14:17', '2023-10-13 10:14:18'),
(228, '19', 18, 'SubAdmin', '49.34.220.221', 'IN', '2023-10-13 10:17:19', '2023-10-13 10:19:19'),
(229, '19', 27, 'Representatives', '103.240.34.122', 'IN', '2023-10-13 10:38:30', '2023-10-13 10:38:36'),
(230, '19', 33, 'SubAdmin', '49.15.248.118', 'IN', '2023-10-13 11:15:30', '2023-10-13 11:15:30'),
(231, '19', 48, 'Representatives', '49.15.248.118', 'IN', '2023-10-13 11:48:29', '2023-10-13 11:48:38'),
(232, '19', 46, 'Representatives', '49.15.248.118', 'IN', '2023-10-13 12:03:07', '2023-10-13 12:03:37'),
(233, '19', 48, 'Representatives', '49.15.248.118', 'IN', '2023-10-13 12:05:31', '2023-10-13 12:15:31'),
(234, '19', 33, 'SubAdmin', '49.15.248.118', 'IN', '2023-10-13 12:26:13', '2023-10-13 13:00:56'),
(235, '19', 27, 'Representatives', '106.222.14.10', 'IN', '2023-10-16 04:39:33', '2023-10-16 04:39:36'),
(236, '19', 27, 'Representatives', '152.58.34.3', 'IN', '2023-10-16 04:57:44', '2023-10-16 04:57:46'),
(237, '19', 18, 'SubAdmin', '106.222.14.10', 'IN', '2023-10-16 05:10:33', '2023-10-16 05:10:33'),
(238, '19', 27, 'Representatives', '106.222.14.10', 'IN', '2023-10-16 08:12:57', '2023-10-16 08:12:57'),
(239, '19', 16, 'SubAdmin', '103.251.59.39', 'IN', '2023-10-16 09:02:42', '2023-10-16 09:02:42'),
(240, '19', 18, 'SubAdmin', '106.222.14.10', 'IN', '2023-10-16 09:17:05', '2023-10-16 09:17:05'),
(241, '19', 27, 'Representatives', '103.251.59.39', 'IN', '2023-10-16 10:06:24', '2023-10-16 10:06:32'),
(242, '19', 16, 'SubAdmin', '103.251.59.39', 'IN', '2023-10-16 10:06:51', '2023-10-16 10:06:51'),
(243, '19', 16, 'SubAdmin', '103.251.59.39', 'IN', '2023-10-16 10:09:32', '2023-10-16 10:09:32'),
(244, '19', 18, 'SubAdmin', '106.222.14.10', 'IN', '2023-10-16 11:39:17', '2023-10-16 11:39:17'),
(245, '19', 27, 'Representatives', '152.58.34.3', 'IN', '2023-10-16 12:59:51', '2023-10-16 12:59:54'),
(246, '19', 27, 'Representatives', '117.97.195.162', 'IN', '2023-10-16 17:30:08', '2023-10-16 17:30:08'),
(247, '19', 18, 'SubAdmin', '117.97.195.162', 'IN', '2023-10-16 17:48:40', '2023-10-16 17:48:40'),
(248, '19', 18, 'SubAdmin', '103.240.79.54', 'IN', '2023-10-17 03:56:09', '2023-10-17 03:56:09'),
(249, '19', 18, 'SubAdmin', '103.240.79.54', 'IN', '2023-10-17 04:23:01', '2023-10-17 04:23:01'),
(250, '19', 18, 'SubAdmin', '103.240.79.54', 'IN', '2023-10-17 04:23:18', '2023-10-17 04:23:18'),
(251, '19', 27, 'Representatives', '103.240.79.54', 'IN', '2023-10-17 04:23:36', '2023-10-17 04:23:37'),
(252, '19', 42, 'SubAdmin', '49.15.248.40', 'IN', '2023-10-17 06:21:23', '2023-10-17 06:21:23'),
(253, '19', 18, 'SubAdmin', '103.240.79.54', 'IN', '2023-10-17 06:51:57', '2023-10-17 06:51:57'),
(254, '19', 48, 'Representatives', '49.15.248.40', 'IN', '2023-10-17 06:52:29', '2023-10-17 06:52:41'),
(255, '19', 27, 'Representatives', '103.240.79.54', 'IN', '2023-10-17 07:21:01', '2023-10-17 07:21:02'),
(256, '19', 18, 'SubAdmin', '103.240.79.54', 'IN', '2023-10-17 07:50:26', '2023-10-17 07:50:26'),
(257, '19', 27, 'Representatives', '103.240.79.54', 'IN', '2023-10-17 10:29:05', '2023-10-17 10:29:06'),
(258, '19', 48, 'Representatives', '49.15.248.40', 'IN', '2023-10-17 11:19:05', '2023-10-17 11:19:05'),
(259, '19', 18, 'SubAdmin', '103.240.79.54', 'IN', '2023-10-17 12:13:35', '2023-10-17 12:13:35'),
(260, '19', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-18 04:42:48', '2023-10-18 04:42:58'),
(261, '19', 48, 'Representatives', '49.15.244.94', 'IN', '2023-10-18 05:10:17', '2023-10-18 05:10:18'),
(262, '19', 42, 'SubAdmin', '49.15.244.94', 'IN', '2023-10-18 05:57:52', '2023-10-18 05:57:52'),
(263, '19', 48, 'Representatives', '49.15.244.94', 'IN', '2023-10-18 07:41:37', '2023-10-18 07:42:39'),
(264, '19', 42, 'SubAdmin', '49.15.244.94', 'IN', '2023-10-18 07:45:00', '2023-10-18 07:45:00'),
(265, '19,53', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-18 10:56:41', '2023-10-18 10:56:41'),
(266, '19', 18, 'SubAdmin', '106.193.137.233', 'IN', '2023-10-18 13:20:16', '2023-10-18 13:20:16'),
(267, '19', 48, 'Representatives', '49.15.250.53', 'IN', '2023-10-18 13:56:53', '2023-10-18 13:59:04'),
(268, '19,53', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-18 13:59:27', '2023-10-18 13:59:27'),
(269, '19', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-18 14:00:07', '2023-10-18 14:09:19'),
(270, '19', 48, 'Representatives', '49.15.250.53', 'IN', '2023-10-18 14:09:44', '2023-10-18 14:13:55'),
(271, '19', 18, 'SubAdmin', '117.99.252.89', 'IN', '2023-10-18 17:18:51', '2023-10-18 17:18:51'),
(272, '19,53', 48, 'Representatives', '49.15.247.91', 'IN', '2023-10-19 05:30:41', '2023-10-19 05:30:41'),
(273, '19,53', 27, 'Representatives', '150.107.241.244', 'IN', '2023-10-19 05:43:30', '2023-10-19 05:43:30'),
(274, '19', 18, 'SubAdmin', '106.193.137.233', 'IN', '2023-10-19 05:43:38', '2023-10-19 05:43:38'),
(275, '19', 48, 'Representatives', '49.15.247.91', 'IN', '2023-10-19 05:50:07', '2023-10-19 05:50:29'),
(276, '19', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-19 05:51:38', '2023-10-19 05:51:57'),
(277, '19', 33, 'SubAdmin', '49.15.247.91', 'IN', '2023-10-19 05:51:59', '2023-10-19 05:53:12'),
(278, '19', 48, 'Representatives', '49.15.247.91', 'IN', '2023-10-19 05:53:24', '2023-10-19 06:03:28'),
(279, '19', 33, 'SubAdmin', '49.15.247.91', 'IN', '2023-10-19 06:04:38', '2023-10-19 06:04:38'),
(280, '19', 48, 'Representatives', '49.15.247.91', 'IN', '2023-10-19 07:47:09', '2023-10-19 09:21:01'),
(281, '19,53', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-19 10:14:39', '2023-10-19 10:14:39'),
(282, '19,53', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-19 10:19:22', '2023-10-19 10:19:22'),
(283, '19', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-19 10:20:56', '2023-10-19 10:21:18'),
(284, '19', 33, 'SubAdmin', '157.33.107.121', 'IN', '2023-10-19 10:23:17', '2023-10-19 10:23:17'),
(285, '19', 46, 'Representatives', '157.33.107.121', 'IN', '2023-10-19 11:06:02', '2023-10-19 11:06:04'),
(286, '19', 48, 'Representatives', '157.33.123.172', 'IN', '2023-10-19 11:50:44', '2023-10-19 11:50:44'),
(287, '19,53', 48, 'Representatives', '157.33.123.172', 'IN', '2023-10-19 12:02:21', '2023-10-19 12:02:21'),
(288, '53', 45, 'SubAdmin', '157.33.123.172', 'IN', '2023-10-19 12:11:35', '2023-10-19 12:11:35'),
(289, '19', 33, 'SubAdmin', '157.33.123.172', 'IN', '2023-10-19 12:12:44', '2023-10-19 12:12:44'),
(290, '19,53', 48, 'Representatives', '157.33.123.172', 'IN', '2023-10-19 12:37:31', '2023-10-19 12:37:31'),
(291, '19,53', 48, 'Representatives', '157.33.123.172', 'IN', '2023-10-19 12:37:58', '2023-10-19 12:37:58'),
(292, '19,53', 48, 'Representatives', '157.33.123.172', 'IN', '2023-10-19 12:39:51', '2023-10-19 12:39:51'),
(293, '19,53', 48, 'Representatives', '157.33.123.172', 'IN', '2023-10-19 12:40:08', '2023-10-19 12:40:08'),
(294, '19', 18, 'SubAdmin', '106.193.137.233', 'IN', '2023-10-19 17:42:48', '2023-10-19 17:42:48'),
(295, '19,53', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-19 18:19:23', '2023-10-19 18:19:23'),
(296, '19', 18, 'SubAdmin', '106.193.137.233', 'IN', '2023-10-20 03:49:34', '2023-10-20 03:49:34'),
(297, '19', 33, 'SubAdmin', '49.15.245.109', 'IN', '2023-10-20 04:45:50', '2023-10-20 04:45:50'),
(298, '19', 46, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 05:01:48', '2023-10-20 05:01:49'),
(299, '19', 48, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 05:06:59', '2023-10-20 05:23:51'),
(300, '19', 33, 'SubAdmin', '49.15.245.109', 'IN', '2023-10-20 05:28:31', '2023-10-20 05:28:31'),
(301, '53', 46, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 06:25:05', '2023-10-20 06:25:19'),
(302, '53', 45, 'SubAdmin', '49.15.245.109', 'IN', '2023-10-20 06:25:31', '2023-10-20 06:25:31'),
(303, '19', 33, 'SubAdmin', '49.15.245.109', 'IN', '2023-10-20 06:27:24', '2023-10-20 06:27:24'),
(304, '19,53', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-20 06:30:14', '2023-10-20 06:30:14'),
(305, '19,53', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-20 06:31:26', '2023-10-20 06:31:26'),
(306, '19', 33, 'SubAdmin', '145.239.255.68', 'GB', '2023-10-20 06:38:53', '2023-10-20 06:38:53'),
(307, '19,53', 48, 'Representatives', '145.239.255.68', 'GB', '2023-10-20 06:39:25', '2023-10-20 06:39:25'),
(308, '19', 33, 'SubAdmin', '49.15.245.109', 'IN', '2023-10-20 06:41:11', '2023-10-20 06:41:11'),
(309, '19,53', 48, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 06:52:27', '2023-10-20 06:52:27'),
(310, '19,53', 27, 'Representatives', '106.193.137.233', 'IN', '2023-10-20 07:07:04', '2023-10-20 07:07:04'),
(311, '19,53', 27, 'Representatives', '152.59.36.45', 'IN', '2023-10-20 08:16:19', '2023-10-20 08:16:19'),
(312, '19,53', 27, 'Representatives', '152.59.36.45', 'IN', '2023-10-20 08:49:02', '2023-10-20 08:49:02'),
(313, '19,53', 27, 'Representatives', '152.59.36.45', 'IN', '2023-10-20 08:50:41', '2023-10-20 08:50:41'),
(314, '19,53', 27, 'Representatives', '106.193.146.228', 'IN', '2023-10-20 10:19:21', '2023-10-20 10:19:21'),
(315, '19', 18, 'SubAdmin', '106.193.146.228', 'IN', '2023-10-20 10:53:05', '2023-10-20 10:53:05'),
(316, '19', 18, 'SubAdmin', '106.193.146.228', 'IN', '2023-10-20 11:08:30', '2023-10-20 11:08:30'),
(317, '19', 48, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 11:41:26', '2023-10-20 11:58:27'),
(318, '19,53', 48, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 11:59:25', '2023-10-20 11:59:25'),
(319, '19,53', 48, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 12:00:37', '2023-10-20 12:00:37'),
(320, '19,53', 27, 'Representatives', '106.193.146.228', 'IN', '2023-10-20 12:04:49', '2023-10-20 12:04:49'),
(321, '19,53', 48, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 12:13:50', '2023-10-20 12:13:50'),
(322, '19,53', 48, 'Representatives', '49.15.245.109', 'IN', '2023-10-20 12:14:26', '2023-10-20 12:14:26'),
(323, '19', 18, 'SubAdmin', '106.193.146.228', 'IN', '2023-10-20 12:40:20', '2023-10-20 12:40:20'),
(324, '19,53', 27, 'Representatives', '106.193.146.228', 'IN', '2023-10-20 13:15:30', '2023-10-20 13:15:30'),
(325, '19', 18, 'SubAdmin', '106.193.146.228', 'IN', '2023-10-20 17:11:12', '2023-10-20 17:11:12'),
(326, '19,53', 27, 'Representatives', '106.193.146.228', 'IN', '2023-10-20 17:16:50', '2023-10-20 17:16:50'),
(327, '19', 18, 'SubAdmin', '106.193.226.236', 'IN', '2023-10-21 16:39:17', '2023-10-21 16:39:17'),
(328, '19', 18, 'SubAdmin', '106.193.226.236', 'IN', '2023-10-21 16:41:14', '2023-10-21 16:41:14'),
(329, '19,53', 27, 'Representatives', '106.193.187.182', 'IN', '2023-10-23 04:28:12', '2023-10-23 04:28:12'),
(330, '19,53', 48, 'Representatives', '49.15.244.93', 'IN', '2023-10-23 04:44:06', '2023-10-23 04:44:06'),
(331, '19,53', 48, 'Representatives', '49.15.244.93', 'IN', '2023-10-23 04:46:21', '2023-10-23 04:46:21'),
(332, '19,53', 48, 'Representatives', '49.15.244.93', 'IN', '2023-10-23 04:47:32', '2023-10-23 04:47:32'),
(333, '19,53', 48, 'Representatives', '49.15.244.93', 'IN', '2023-10-23 04:47:48', '2023-10-23 04:47:48'),
(334, '19', 42, 'SubAdmin', '49.15.244.93', 'IN', '2023-10-23 05:05:09', '2023-10-23 05:05:09'),
(335, '19', 48, 'Representatives', '49.15.244.93', 'IN', '2023-10-23 05:08:03', '2023-10-23 05:43:00'),
(336, '19,53', 27, 'Representatives', '106.193.187.182', 'IN', '2023-10-23 05:49:19', '2023-10-23 05:49:19'),
(337, '19', 42, 'SubAdmin', '49.15.248.251', 'IN', '2023-10-23 06:49:58', '2023-10-23 06:49:58'),
(338, '19', 18, 'SubAdmin', '106.193.187.182', 'IN', '2023-10-23 07:05:54', '2023-10-23 07:05:54'),
(339, '19', 42, 'SubAdmin', '49.15.249.92', 'IN', '2023-10-23 07:13:37', '2023-10-23 07:13:37'),
(340, '53', 67, 'SubAdmin', '49.15.247.135', 'IN', '2023-10-23 07:31:35', '2023-10-23 07:31:35'),
(341, '19', 48, 'Representatives', '49.15.247.135', 'IN', '2023-10-23 07:49:18', '2023-10-23 07:49:20'),
(342, '19', 42, 'SubAdmin', '49.15.247.135', 'IN', '2023-10-23 08:00:02', '2023-10-23 08:00:02'),
(343, '19', 18, 'SubAdmin', '106.193.187.182', 'IN', '2023-10-23 09:46:20', '2023-10-23 09:46:20'),
(344, '19,53', 46, 'Representatives', '49.15.247.135', 'IN', '2023-10-23 09:50:07', '2023-10-23 09:50:07'),
(345, '19,53', 27, 'Representatives', '49.15.247.135', 'IN', '2023-10-23 09:54:49', '2023-10-23 09:54:49'),
(346, '19,53', 27, 'Representatives', '49.15.247.135', 'IN', '2023-10-23 09:58:23', '2023-10-23 09:58:23'),
(347, '53', 46, 'Representatives', '49.15.247.135', 'IN', '2023-10-23 10:00:57', '2023-10-23 10:31:45'),
(348, '19', 42, 'SubAdmin', '49.15.247.135', 'IN', '2023-10-23 11:36:52', '2023-10-23 11:36:52'),
(349, '19', 48, 'Representatives', '49.15.247.135', 'IN', '2023-10-23 12:39:39', '2023-10-23 13:29:20'),
(350, '19', 33, 'SubAdmin', '49.15.247.135', 'IN', '2023-10-23 13:37:47', '2023-10-23 13:37:47'),
(351, '19', 48, 'Representatives', '49.15.247.135', 'IN', '2023-10-23 13:38:34', '2023-10-23 13:42:22'),
(352, '53', 45, 'SubAdmin', '49.15.247.135', 'IN', '2023-10-23 13:49:36', '2023-10-23 13:49:36'),
(353, '19', 33, 'SubAdmin', '49.15.247.135', 'IN', '2023-10-23 14:11:16', '2023-10-23 14:11:16'),
(354, '19,53', 48, 'Representatives', '49.15.247.135', 'IN', '2023-10-23 14:11:33', '2023-10-23 14:11:33'),
(355, '19', 33, 'SubAdmin', '49.15.247.135', 'IN', '2023-10-23 14:15:10', '2023-10-23 14:25:38'),
(356, '19', 18, 'SubAdmin', '106.193.162.107', 'IN', '2023-10-23 14:35:04', '2023-10-23 14:35:04'),
(357, '19', 18, 'SubAdmin', '106.193.162.107', 'IN', '2023-10-23 14:54:20', '2023-10-23 14:54:20'),
(358, '19,53', 48, 'Representatives', '49.15.249.142', 'IN', '2023-10-25 10:41:50', '2023-10-25 10:41:50'),
(359, '19', 27, 'Representatives', '106.193.232.87', 'IN', '2023-10-25 10:49:53', '2023-10-25 10:50:28'),
(360, '19,53', 27, 'Representatives', '106.193.232.87', 'IN', '2023-10-25 12:07:15', '2023-10-25 12:07:15'),
(361, '19', 18, 'SubAdmin', '106.193.232.87', 'IN', '2023-10-25 12:50:09', '2023-10-25 12:50:09'),
(362, '19,53', 27, 'Representatives', '106.193.232.87', 'IN', '2023-10-25 14:24:16', '2023-10-25 14:24:16'),
(363, '19', 18, 'SubAdmin', '106.193.232.87', 'IN', '2023-10-26 04:58:44', '2023-10-26 04:58:44'),
(364, '19', 48, 'Representatives', '82.166.224.121', 'IL', '2023-10-29 08:27:38', '2023-10-29 08:27:50'),
(365, '19,53', 48, 'Representatives', '152.57.129.221', 'IN', '2023-10-30 05:41:54', '2023-10-30 05:41:54'),
(366, '19,53', 48, 'Representatives', '103.251.59.115', 'IN', '2023-10-30 06:28:20', '2023-10-30 06:28:20'),
(367, '19,53', 27, 'Representatives', '103.206.138.159', 'IN', '2023-10-30 06:35:46', '2023-10-30 06:35:46'),
(368, '19,53', 48, 'Representatives', '152.57.150.126', 'IN', '2023-10-30 06:52:07', '2023-10-30 06:52:07'),
(369, '19', 48, 'Representatives', '49.15.250.57', 'IN', '2023-10-30 11:44:51', '2023-10-30 12:20:10'),
(370, '19', 33, 'SubAdmin', '152.57.35.168', 'IN', '2023-10-30 12:24:46', '2023-10-30 12:25:08'),
(371, '19', 27, 'Representatives', '103.206.138.159', 'IN', '2023-10-30 12:26:07', '2023-10-30 12:54:43'),
(372, '19,53', 46, 'Representatives', '152.57.35.168', 'IN', '2023-10-30 13:04:51', '2023-10-30 13:04:51'),
(373, '19', 33, 'SubAdmin', '152.57.35.168', 'IN', '2023-10-30 13:09:42', '2023-10-30 13:22:40'),
(374, '19,53', 48, 'Representatives', '152.57.35.168', 'IN', '2023-10-30 13:34:29', '2023-10-30 13:34:29'),
(375, '19,53', 48, 'Representatives', '152.57.35.168', 'IN', '2023-10-30 13:35:44', '2023-10-30 13:35:44'),
(376, '19', 33, 'SubAdmin', '49.15.246.127', 'IN', '2023-10-30 14:34:20', '2023-10-30 14:34:20'),
(377, '19', 33, 'SubAdmin', '49.15.246.127', 'IN', '2023-10-30 14:39:55', '2023-10-30 14:39:55'),
(378, '19,53', 48, 'Representatives', '49.15.244.13', 'IN', '2023-10-31 04:29:27', '2023-10-31 04:29:27'),
(379, '19', 48, 'Representatives', '49.15.244.13', 'IN', '2023-10-31 04:30:20', '2023-10-31 04:34:20'),
(380, '19', 27, 'Representatives', '106.193.184.65', 'IN', '2023-10-31 12:23:14', '2023-10-31 12:23:31'),
(381, '19,53', 27, 'Representatives', '103.240.34.122', 'IN', '2023-10-31 14:03:16', '2023-10-31 14:03:16'),
(382, '19,53', 48, 'Representatives', '49.15.250.185', 'IN', '2023-11-01 05:41:02', '2023-11-01 05:41:02'),
(383, '19,53', 27, 'Representatives', '106.193.184.65', 'IN', '2023-11-01 09:26:15', '2023-11-01 09:26:15'),
(384, '19,53', 27, 'Representatives', '106.193.184.65', 'IN', '2023-11-01 13:10:26', '2023-11-01 13:10:26'),
(385, '19,53', 48, 'Representatives', '82.166.224.121', 'IL', '2023-11-02 07:10:52', '2023-11-02 07:10:52'),
(386, '19,53', 48, 'Representatives', '49.15.248.92', 'IN', '2023-11-02 07:12:31', '2023-11-02 07:12:31'),
(387, '19', 48, 'Representatives', '49.15.248.92', 'IN', '2023-11-02 07:13:44', '2023-11-02 07:15:38'),
(388, '19,53', 27, 'Representatives', '106.193.184.65', 'IN', '2023-11-02 07:17:22', '2023-11-02 07:17:22'),
(389, '19', 18, 'SubAdmin', '106.193.184.65', 'IN', '2023-11-02 07:18:14', '2023-11-02 07:18:14'),
(390, '19,53', 48, 'Representatives', '49.15.248.92', 'IN', '2023-11-02 07:22:50', '2023-11-02 07:22:50'),
(391, '19,53', 48, 'Representatives', '49.15.248.92', 'IN', '2023-11-02 07:27:24', '2023-11-02 07:27:24'),
(392, '19', 33, 'SubAdmin', '49.15.248.92', 'IN', '2023-11-02 07:49:39', '2023-11-02 07:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_07_27_105854_create_brand_table', 2),
(5, '2023_08_07_103859_create_language_table', 3),
(6, '2023_08_07_134539_create_visa_type_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ankitad.knp@gmail.com', '541650', '2023-10-11 16:04:21'),
('ankitad.knp@gmail.com', '496148', '2023-10-11 16:05:37'),
('ankitad.knp@gmail.com', '593221', '2023-10-11 16:06:44'),
('ankitad.knp@gmail.com', '372079', '2023-10-11 16:08:10'),
('ankitad.knp@gmail.com', '502036', '2023-10-11 16:08:25'),
('ankitad.knp@gmail.com', '479289', '2023-10-11 16:09:16'),
('ankitad.knp@gmail.com', '260580', '2023-10-11 16:09:38'),
('ankitad.knp@gmail.com', 't0RNsRbQedPKonhWgAwvZXfNDcpGucQ2U0Mcgy5PNNHDwqlwBHXajQwU1GIFy60M', NULL),
('ankitad.knp@gmail.com', 'ahAPuv7KY7PXiu1YuHPsjUk2GDSXMGnQk6R8Hlv0nZL1jpFbtLHAyCaLBUiDQSO6', NULL),
('ankitad.knp@gmail.com', 'm7fMqjqLBdEBj7XU0CCUKtzaIFPHo3vRZojW4BM8ivu8vARN9i2pD0hHS67isPX0', NULL),
('ankitad.knp@gmail.com', '4seUOLuA7l1UvvSfHcR0C2VaNp3SmvuTJ5TIeSsPstfuL8KxYRAkki3IGq3sEvjB', NULL),
('ankitad.knp@gmail.com', 'JClEaMZ3wN1UxJwRcIQWzO7zHSfx03JXqDmk3r5dbAjH8xroyh8mYHZoyTxmD1EZ', NULL),
('ankitad.knp@gmail.com', 'n0fIjcJI4wnGSILq2ZITnxV73NkhpfTCCwknGan1LcyO0DyIZgfrRn2KxOxMTgic', NULL),
('ankitad.knp@gmail.com', 'N3ycPzQ6KAKLm3Bjn2vT1jW8FGJ3BEePmczNfcwbWe1Mi1gPwENTYlSgtfVYUceF', NULL),
('piyushc.knp@gmail.com', 'BuxWpQluRjpVSOIRfD5hmiS1DZbkEVqFCWvtM1EM3zs9gkdnKHfyUjRYYjONkMPv', NULL),
('piyush0210@mailinator.com', '8d3QcGrLZ8XtnRrygG5qqHZKVwM3f5k55ECYxLWTeygVppdFzofD8IArdcZ3cQ9p', NULL),
('piyushc.knp@gmail.com', 'MRoPdzph06vqVtNmrSd0WgfxLKSk4f7YPxOSmrXX9AHelNUSnCajmRzrf1yiAvBD', NULL),
('piyushc.knp@gmail.com', '0OG9KDEuLSA5qirFkKS5ptVHPQWELtw9opyGWsp78K8Zu0O1nvjOpdURT037TVhJ', NULL),
('piyushc.knp@gmail.com', 'XKnmG1f5pKEuYKSpT4L4hCNa3ZQAIdEzfb98ZjV4PYSkG21FO3FEsW2cKpyLXWJj', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `language_id` int NOT NULL,
  `html` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pdf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `brand_name`, `language_id`, `html`, `pdf`, `created_at`, `updated_at`) VALUES
(7, 'visacanada', 5, 'ccc', '', '2023-09-26 16:15:23', '2023-09-26 16:15:23'),
(38, 'canadamigration', 4, '<p>Canada Migration PDF</p>', NULL, '2023-10-05 09:31:46', '2023-10-05 11:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `pipedrive_setting`
--

CREATE TABLE `pipedrive_setting` (
  `id` int NOT NULL,
  `brand_id` int NOT NULL,
  `url` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pipedrive_setting`
--

INSERT INTO `pipedrive_setting` (`id`, `brand_id`, `url`, `token`, `created_at`, `updated_at`) VALUES
(1, 12, 'https://dev.slotsdisco.com/', 'ssdddd', '2023-09-22 09:03:59', '2023-09-22 12:45:49'),
(4, 11, 'https://api.pipedrive.com/v1', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-09-22 10:12:50', '2023-09-28 12:07:16'),
(5, 14, 'https://www.knp-tech.com/', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-09-22 12:45:02', '2023-09-22 12:45:16'),
(6, 12, 'https://www.knp-tech.com/', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-09-22 12:45:02', '2023-09-22 12:45:02'),
(7, 16, 'https://www.knp-tech.com/', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-09-22 13:04:42', '2023-09-22 13:04:42'),
(8, 23, 'https://api.pipedrive.com/v1', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-10-09 08:36:07', '2023-10-09 08:36:07'),
(9, 19, 'https://api.pipedrive.com/v1', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-10-09 08:36:07', '2023-10-09 08:36:07'),
(10, 24, 'https://api.pipedrive.com/v1', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-10-09 09:57:24', '2023-10-09 09:57:24'),
(11, 4, 'https://api.pipedrive.com/v1', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-10-12 10:28:16', '2023-10-12 10:28:16'),
(12, 19, 'https://api.pipedrive.com/v1', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-10-20 13:05:14', '2023-10-20 13:05:14'),
(13, 53, 'https://api.pipedrive.com/v1', '02f14f76be9bce4fab8dfc1053f0c3d59490085a', '2023-10-20 13:05:14', '2023-10-20 13:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `representative`
--

CREATE TABLE `representative` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signature_photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bio` text NOT NULL,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `law_logo` text NOT NULL,
  `brand_id` varchar(100) NOT NULL,
  `linkedin_id` varchar(150) NOT NULL,
  `license_number` varchar(150) DEFAULT NULL,
  `cba_number` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `representative`
--

INSERT INTO `representative` (`id`, `name`, `email`, `password`, `signature_photo`, `bio`, `photo`, `law_logo`, `brand_id`, `linkedin_id`, `license_number`, `cba_number`, `created_at`, `updated_at`) VALUES
(1, 'Pooja Chawla', 'ankitar@gmail.com', '$2y$10$viYJYysOCncXWgiiE.RUouw0YISy3J3YOT0NENATz8H2g1YBZbeWy', '/uploads/representative_signature/1698071320_stamp-img.png', 'Pooja Chawla is in the immigration sector over the past\r\n10 years, she\r\nhas assisted clients with Express Entry, Visitor Visas, Student\r\nPermits, Spousal Sponsorships, and many other programs.\r\nShe is passionate about immigration and aim to use her knowledge to\r\nassist our clients achieve their immigration goals successfully. The\r\npathways to Canada are many and are confusing. Let me help you find\r\nthe right path.', '/uploads/representative/1698071531_Pooja-pic.png', '/uploads/law_logo/1698059387_law_logo.png', '19,53', 'ankita-patel', 'RCIC Immigration Consultant | CCRC Membership| R711558', '456ghj', '2023-08-11 09:34:22', '2023-10-25 10:49:40'),
(5, 'Simran Kaur', 'ketul1@gmail.com', '$2y$10$vlXFZCZGUgfLtlL7dc/Uc.dU4EaKW9lW2pUChJGxaORp6h70nTENW', '/uploads/representative_signature/1698059668_jonsign.png', 'RCIC. Simran Kaur is a dedicated, organized and efficient individual.\r\nShe is a skilled and reliable immigration consultant with experience in\r\nmanaging time sensitive issues. Being an RCIC, she advises and\r\nassists clients in all classes of Canadian immigration As a fully\r\nqualified RCIC, she will guide you through your immigration process\r\nand assist you with any immigration issues you may experience. He\r\nwill ensure that you are provided with the best immigration service\r\nand business guidance on your journey to Canada', '/uploads/representative/1698059668_Simran-pic.png', '/uploads/law_logo/1697623760_law_logo.png', '19,53', 'dfdf', 'RCIC Immigration Consultant | CCRC Mem ID| R526406', 'dfd123', '2023-09-22 13:07:29', '2023-10-23 11:14:28'),
(6, 'Jonatan Zahav', 'piyush0210@mailinator.com', '$2y$10$0LPY9UeLDbn6nbGtvEwaDu/8DoWgQWn3/3XDPbhl39r1.cVlernn6', '/uploads/representative_signature/1698071721_jonsign.png', 'Adv. Jonatan Zahav is the Head of the Legal Team and a member of\r\nthe Ontario Bar. He was called to the bar over 30 years ago. He has\r\nworked in law and in business including many years in banking and\r\nthe past 4 years in immigration. He has an office in his hometown of\r\nPeterborough, Ontario. A graduate of U of Toronto Law he has intimate\r\nknowledge of immigration, having lived in 6 countries and experienced\r\nfresh starts many times in his life.', '/uploads/representative/1698071734_jonpic.png', '/uploads/law_logo/1697623781_law-society-logo.png', '19,53', 'fdfdf', 'Lawyer | LSO Membership | 22731N', 'ABC123', '2023-10-02 04:56:25', '2023-10-23 14:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `sent_mail`
--

CREATE TABLE `sent_mail` (
  `id` int NOT NULL,
  `language_code` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `representative_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `credit_score` int DEFAULT NULL,
  `visa_type_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `recommended_visa_type` int NOT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `education_level` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `occupation` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  `case_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `pdf_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_sent_mail` int NOT NULL COMMENT '1=sent,0=no sent',
  `conclusion` longtext,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sent_mail`
--

INSERT INTO `sent_mail` (`id`, `language_code`, `representative_id`, `name`, `email`, `credit_score`, `visa_type_id`, `recommended_visa_type`, `country`, `education_level`, `occupation`, `age`, `case_number`, `city`, `phone_no`, `pdf_file`, `is_sent_mail`, `conclusion`, `created_at`, `updated_at`) VALUES
(1, 'en', 27, 'Ankita', 'ankitad.knp@gmail.com', 200, '1,2,3', 2, 'India', 'Bachelor', 'Business', 24, '2345F', 'Ahmedabad', '7898909087', 'generated_pdf_1698844244.pdf', 1, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '2023-09-25 13:59:54', '2023-11-01 13:11:22'),
(59, 'en', 48, 'Piyush Chouvhan', 'champeshwari.knp@gmail.com', 550, '1,2,3', 3, 'India', 'Two or more Bachelor\'s / Post secondary Degree', 'Business Owner', 27, '568', 'Amravati', '918956895892', 'generated_pdf_1698730414.pdf', 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2023-10-31 05:33:24', '2023-10-31 05:34:10'),
(60, 'en', 48, 'Piyush Chouvhan', 'piyushc.knp@gmail.com', 550, '1,2,3', 1, 'India', 'Bachelor\'s degree / Degree of 3 Years or More', 'Business Owner', 28, 'KNP007', 'Amravati', '918956895689', 'generated_pdf_1698910146.pdf', 1, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '2023-11-02 07:28:54', '2023-11-02 07:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_setting`
--

CREATE TABLE `smtp_setting` (
  `id` int NOT NULL,
  `brand_id` int NOT NULL,
  `host` varchar(100) NOT NULL,
  `port` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `encryption` enum('tls','ssl') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `from_email_address` varchar(200) NOT NULL,
  `cc_email` varchar(255) DEFAULT NULL,
  `from_name` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `smtp_setting`
--

INSERT INTO `smtp_setting` (`id`, `brand_id`, `host`, `port`, `username`, `password`, `encryption`, `from_email_address`, `cc_email`, `from_name`, `created_at`, `updated_at`) VALUES
(1, 19, 'smtp.gmail.com', 587, 'test.knptech@gmail.com', 'ppbwrnahuycthdvv', 'tls', 'test.knptech@gmail.com', 'ankitad.knp@gmail.com', 'ARP', '2023-09-27 15:48:55', '2023-10-16 08:14:07'),
(3, 53, 'smtp.gmail.com', 587, 'piyushc.knp@gmail.com', 'yjcp hwhp yxte mepi', 'tls', 'piyushc.knp@gmail.com', 'piyushc.knp@gmail.com', 'ARP', '2023-10-19 12:04:15', '2023-10-19 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL COMMENT '0=SuperAdmin,1=SubAdmin,2=Representatives',
  `brand_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `brand_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$rJyaFS4XgMkTqdd37pJUGO3E5Tl5Fx27tsqBUNDnXoNGyJ63snWzi', 0, '0', 'mXalo1x1lal9r5SbE3hTHiKAFEPae8OptNSHWIB3zNy3zNigw7qQ9OFK6Fmg', '2023-07-27 03:24:13', '2023-07-28 01:57:24'),
(18, 'ankita', 'ankita@gmail.com', NULL, '$2y$10$ddjix5uwVeUNylumyNLzTup04RR66zDsDEpM0cDqIM5CVc3J9ib4.', 1, '19', NULL, '2023-07-27 04:50:03', '2023-09-19 05:13:56'),
(27, 'Pooja Chawla', 'ankitar@gmail.com', NULL, '$2y$10$Mps5jIDlmrC5TqjweRqwUOYdatYO.zgJ6wlysSP8W5NIJURxnoEDW', 2, '19,53', 'BsoNiIB4rivuGqvFF9FbXXqECD0e5UCWI8HJubSw5uo03mR2U4e6eDQ52Ub2', '2023-08-11 09:34:22', '2023-10-25 10:49:40'),
(33, 'Piyush Chouvhan', 'piyushc.knp@gmail.com', NULL, '$2y$10$7s/usLlqOqY7qpHMHVtHv.us3aU1wwuAD40pk0rLxG8mZr6QKTZgu', 1, '19', NULL, '2023-09-21 14:31:11', '2023-10-20 06:27:15'),
(42, 'Test Piyus', 'piyush2209@mailinator.com', NULL, '$2y$10$RTfIMIh/5JLNnMTZQUmvvuT01we064gaBdeTf6pJcHQyVTAZl19TW', 1, '19', NULL, '2023-09-22 12:10:11', '2023-10-23 07:59:54'),
(45, 'ketul Patel', 'ketul@gmail.com', NULL, '$2y$10$sYjH6xNqlzMwozfw3Jy1eOI9tdilT7YNl1r1gNdYold5mmhU3gn9W', 1, '53', 'sBD9u75zFdCg5U1zoOTsHaibNgZP5rPYLpEz0koazesMKamZK4tD1tosjXax', '2023-09-22 13:06:28', '2023-10-23 13:49:32'),
(46, 'Simran Kaur', 'ketul1@gmail.com', NULL, '$2y$10$KRYHVpwyLwJyKvmcvZom8OqclCaT/7GM4JvEZMdZpL3QIACZzDZt2', 2, '19,53', 'hEZih7avrfcHeXEnXdtEjrdJQ5hmKWAqxX3YzX0SNeng5zawRrSzcMnJPRI5', '2023-09-22 13:07:29', '2023-10-20 05:04:18'),
(48, 'Jonatan Zahav', 'piyush0210@mailinator.com', NULL, '$2y$10$F5ypdPc5UAFF.e6ser/MYeb9EIIAm95wiCN6dvKgDaDi4PCHedoiC', 2, '19,53', 'MqDzAVmM4MOYhyMZLiFKWBeEhGM9xhlxJSLu4zZDVOijWnge9XHclTL9n1tT', '2023-10-02 04:56:25', '2023-10-23 11:10:45'),
(59, 'ankita_repre', 'ankitad.knp@gmail.com', NULL, '$2y$10$xbh4za9IzXnR5QX.pwp5DO3jCjMwpXUwfI7G3xLyN/VVxvDI3HwEq', 2, '19', NULL, '2023-10-09 09:59:48', '2023-10-12 03:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `visa_type`
--

CREATE TABLE `visa_type` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visa_type`
--

INSERT INTO `visa_type` (`id`, `name`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Atlantic High Skilled Program', 19, '2023-10-25 19:34:06', '2023-10-25 19:34:06'),
(2, 'Alberta Immigration Rural Renewal Stream', 19, '2023-10-25 19:34:32', '2023-10-25 19:34:32'),
(3, 'British Columbia Provincial Nominee Program', 19, '2023-10-25 19:34:45', '2023-10-25 19:34:45'),
(4, 'Work Permit -Temporary Visa', 19, '2023-10-25 19:36:08', '2023-10-25 19:36:08'),
(5, 'Express Entry Program', 19, '2023-10-25 19:36:39', '2023-10-25 19:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `visa_type_details`
--

CREATE TABLE `visa_type_details` (
  `id` int NOT NULL,
  `visa_type_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `language_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `visa_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `value` text NOT NULL,
  `is_image` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visa_type_details`
--

INSERT INTO `visa_type_details` (`id`, `visa_type_id`, `brand_id`, `language_code`, `visa_key`, `value`, `is_image`, `created_at`, `updated_at`) VALUES
(1, 1, 19, 'en', 'Description', '<p>The Atlantic Immigration Program is designed to welcome additional newcomers to the Atlantic Canada region to fill the needs of local employers and communities. The program allows designated local employers to identify, recruit and retain global talent.</p>\r\n\r\n<p>The program also has the goals of supporting population growth, developing a skilled workforce, and increasing employment rates in the region. The Atlantic Immigration Program offers permanent residence to skilled workers that want to settle in:</p>\r\n\r\n<ul>\r\n	<li>Nova Scotia.</li>\r\n	<li>New Brunswick</li>\r\n	<li>Newfoundland and Labrador.</li>\r\n	<li>Prince Edward Island</li>\r\n</ul>', 0, '2023-10-19 17:48:37', '2023-10-25 14:07:12'),
(2, 1, 19, 'en', 'How does This Program work?', '<p>The Atlantic Immigration Program is an employer driven program that facilitates the hiring of foreign nationals. All principal applicants arriving in Canada under the program must have a job offer from a designated employer and an individualized settlement plan for themselves and their family.</p>\r\n\r\n<p>Once a designated employer finds a candidate who meets their employment needs and the program criteria, that employer will need to first offer them a job. Employers do not need to go through the process of obtaining a Labour Market Impact Assessment (LMIA).</p>\r\n\r\n<p><br />\r\nOnce the candidate has accepted the job, the employer will connect the candidate with a designated settlement service provider organization for a needs assessment and to develop a settlement plan. Employers will also support the long term integration of the new immigrant and his or her family, if applicable, so they can reach the goals of their settlement plan once they arrive in Canada.</p>\r\n\r\n<p><br />\r\nEmployers that need to fill a job vacancy quickly will have access to a temporary work permit, so that the candidate and his or her family can come to Canada as soon as possible.</p>', 0, '2023-10-19 17:48:37', '2023-10-25 14:07:14'),
(3, 1, 19, 'en', 'Candidate Requirements', '<p>Have the required work experience:1,560 hours in the last 5 years <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nMeet educational requirements: Minimum one<br />\r\nyear post secondary educational - <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nMeet language requirements: Minimum CLB 5 - <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nHave the required settlement funds: Minimum 15,124$(CAD) -&nbsp;<br />\r\n<span style=\"color:#e74c3c\">Approved</span>.</p>', 0, '2023-10-19 17:48:37', '2023-10-25 14:07:18'),
(4, 1, 19, 'en', 'Highest paying cities for Sales Managers near Canada', '/uploads/visa/1698245817_Highest-paying-cities-for-Sales.png', 1, '2023-10-19 17:48:37', '2023-10-25 14:56:57'),
(5, 1, 19, 'en', 'Main Advantages', '<ul>\r\n	<li>You get a permeant residency card for life!</li>\r\n	<li>High Success Ratio!</li>\r\n</ul>', 0, '2023-10-19 17:48:37', '2023-10-25 14:07:24'),
(6, 1, 19, 'en', 'Time Frame', '<p>12 - 15 Months</p>', 0, '2023-10-19 17:48:37', '2023-10-25 14:07:27'),
(7, 1, 19, 'en', 'Our Service', '<p>We will open your family an account and submit your case to the Atlantic High-Skilled Program.<br />\r\nWe will assist you in Job Search and represent to you In<br />\r\nfront of Canadian company to get the best possible work conditions!<br />\r\nWe will represent you in front of the Ministry of Immigration.<br />\r\nWe will represent you in front of the Embassy of Canada in your country of residence.</p>', 0, '2023-10-19 17:48:37', '2023-10-25 14:07:30'),
(19, 2, 19, 'en', 'Description', '<p>The Alberta Immigration Rural Renewal Stream aims to attract skilled Canada immigration newcomers to rural areas of the Canadian province.</p>\r\n\r\n<p><br />\r\nMr. Abdul Samad Shamshad Ali is a High Qualified candidate and a job offer from an<br />\r\nAlberta employer in a designated rural Alberta community can apply for Canada permanent residence through the Alberta Advantage Immigration Program (AAIP).</p>\r\n\r\n<p><br />\r\nCommunities must have a population below100,000 and be outside the Calgary and Edmonton census metropolitan areas to become designated.</p>', 0, '2023-10-19 18:16:01', '2023-10-25 14:07:41'),
(20, 2, 19, 'en', 'The Rural Renewal Stream has a 2-step process', '<p>1. Community designation: Community recruits&nbsp;newcomers to meet labor needs.<br />\r\n2. Submit the AAIP application under the Rural Renewal Stream.</p>', 0, '2023-10-19 18:16:01', '2023-10-25 14:07:50'),
(21, 2, 19, 'en', 'Candidate Requirements', '<p>Endorsement of Candidate letter from designated community.<br />\r\nFull-time, permanent job offer for minimum of 12 months and 30 hours per week (see below for ineligible<br />\r\nValid licensing, registration and certification as required by the position - <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nMinimum of 12 months full time work experience in an eligible occupation within the last 18 months -&nbsp; <span style=\"color:#e74c3c\">Approved</span><br />\r\nMeet language requirements - <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nMinimum of Canadian high school education or equivalent - <span style=\"color:#e74c3c\">Approved</span><br />\r\nHave the required settlement funds - <span style=\"color:#e74c3c\">Approved</span>.</p>', 0, '2023-10-19 18:16:01', '2023-10-25 14:07:54'),
(22, 2, 19, 'en', 'Main Advantages', '<ul>\r\n	<li>Small community.</li>\r\n	<li>You get a Permeant Residency for all your family.</li>\r\n</ul>', 0, '2023-10-19 18:16:01', '2023-10-25 14:07:56'),
(23, 2, 19, 'en', 'Corporate sales manager: salaries per region', '/uploads/visa/1698243627_salaries-per-region-img.png', 1, '2023-10-19 18:16:01', '2023-10-25 14:20:27'),
(24, 2, 19, 'en', 'Time Frame', '<p>12 - 15 Months</p>', 0, '2023-10-19 18:16:01', '2023-10-25 14:08:02'),
(25, 2, 19, 'en', 'Our Service', '<p>1. We will assist to get an Endorsement of Candidate letter from designated community.<br />\r\n2. We will open your family an account and submit your case to Rural Renewal Stream<br />\r\n3. We will assist you to find a Job and we will represent you in front of a Canadian employer to get LMIA.<br />\r\n4. We will represent you in front of the Ministry of Immigration.<br />\r\n5. We will represent you in front of the Embassy of Canada in your country of residence.</p>', 0, '2023-10-19 18:16:01', '2023-10-25 14:08:05'),
(45, 3, 19, 'en', 'Description', '<p>The BC Provincial Nominee Program (BC PNP) is an economic immigration program administered by the Government of British Columbia s Immigration Programs Branch.BC PNP has supported more than6,000 workers to be nominated for permanent<br />\r\nresidence since its launch in May 2017 . BC PNP helps ensure B.C. can continue to attract and retain the talent needed to sustain and grow the Medical &amp; Health sector in the province.</p>', 0, '2023-10-20 06:51:07', '2023-10-25 14:08:15'),
(46, 3, 19, 'en', 'corporate sales managers salary in Canada', '/uploads/visa/1698243313_corporate-sales-managers-salary-in-Canada-img.png', 1, '2023-10-20 06:51:07', '2023-10-25 14:15:13'),
(47, 3, 19, 'en', 'How does This Program work?', '<p>Interested candidates must follow a two stage process.<br />\r\n1. Step 1: Satisfy eligibility criteria of the BC PNP.<br />\r\n2. Step 2: Create an Express Entry profile.<br />\r\n3. Step 3: BC PNP identifies candidates in the Express Entry pool.<br />\r\n4. Step 4: Receive a NOI from the BC PNP.<br />\r\n5.Step 5: Apply to the BC PNP under the Human Capital Priorities Stream within 45 calendar days after receiving a NOI from British Colombia.<br />\r\n6. Step 6: If nominated, candidates obtain a Nomination Approval Letter and an BC PNP Certificate of Nomination by email. Candidates have 30 calendar days to accept<br />\r\nthe nomination in the Express Entry system.<br />\r\n7. Step 7: If a nomination is accepted, Express Entry candidates are awarded an<br />\r\nadditional 600 CRS points and an Invitation to Apply (ITA) for permanent residence<br />\r\nat a future draw from the pool.<br />\r\n8.Step 8: Apply for Canadian permanent residence to IRCC within 60 days of receiving the ITA.</p>', 0, '2023-10-20 06:51:07', '2023-10-25 14:08:40'),
(48, 3, 19, 'en', 'Main Advantages', '<ul>\r\n	<li>You get a Permeant Residency for all your family.</li>\r\n	<li>The best education in Canada.</li>\r\n</ul>', 0, '2023-10-20 06:51:07', '2023-10-25 14:08:23'),
(49, 3, 19, 'en', 'Candidate Requirements', '<p>Interested candidates must meet all requirements must be met at the time of<br />\r\nsubmission of application and at the time BC PNP assesses the application.<br />\r\nThe candidates must work in an eligible occupation -&nbsp; <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nLanguage Requirements - <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nEducation Requirements - <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nWork Experience Requirements - <span style=\"color:#e74c3c\">Approved</span>.<br />\r\nHave the required settlement funds &gt;20,450 $ - <span style=\"color:#e74c3c\">Approved</span>.</p>', 0, '2023-10-20 06:51:07', '2023-10-25 14:08:26'),
(50, 3, 19, 'en', 'Time Frame', '<p>9 - 12 Months</p>', 0, '2023-10-20 06:51:07', '2023-10-25 14:08:29'),
(51, 3, 19, 'en', 'Our Service', '<p>1. We will guide you to collect all required documents and notarize them by our Lawyers.<br />\r\n2.We will open you an account and submit your case to BC PNP Program.<br />\r\n3. We will represent you in front of the Ministry of Immigration to get the permeant residency.<br />\r\n4. We will represent you in front of the Embassy of Canada in your country of residence.</p>', 0, '2023-10-20 06:51:07', '2023-10-25 14:08:32'),
(54, 3, 19, 'en', 'Service Cost', '/uploads/visa/1698243313_british.png', 1, '2023-10-20 06:51:32', '2023-10-25 14:15:13'),
(56, 2, 19, 'en', 'Service Cost', '/uploads/visa/1698243186_albelta.png', 1, '2023-10-20 07:20:12', '2023-10-25 14:13:06'),
(59, 1, 19, 'en', 'Service Cost', '/uploads/visa/1698297814_Atlantic.png', 1, '2023-10-26 05:23:34', '2023-10-26 05:23:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `language_code_unique` (`code`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipedrive_setting`
--
ALTER TABLE `pipedrive_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representative`
--
ALTER TABLE `representative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_mail`
--
ALTER TABLE `sent_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_setting`
--
ALTER TABLE `smtp_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visa_type`
--
ALTER TABLE `visa_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa_type_details`
--
ALTER TABLE `visa_type_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pipedrive_setting`
--
ALTER TABLE `pipedrive_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `representative`
--
ALTER TABLE `representative`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sent_mail`
--
ALTER TABLE `sent_mail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `smtp_setting`
--
ALTER TABLE `smtp_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `visa_type`
--
ALTER TABLE `visa_type`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visa_type_details`
--
ALTER TABLE `visa_type_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
