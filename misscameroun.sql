-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 09, 2019 at 07:12 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `misscameroun`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL COMMENT 'id d une candidat',
  `nom` varchar(50) NOT NULL COMMENT 'nom d une candidate',
  `prenom` varchar(50) NOT NULL COMMENT 'prénom d une candidate',
  `date-nais` date NOT NULL COMMENT 'date de naissance dune candidate',
  `lieu-nais` varchar(50) NOT NULL COMMENT 'lieu de naissance dune candidate',
  `email` varchar(50) NOT NULL COMMENT 'email d une candidate',
  `numtel` varchar(50) NOT NULL COMMENT 'num tel d une candidate ',
  `niveau-etude` enum('premiere annee','deuxieme annee','troisieme annee','licence','quatrieme annee','cinquieme annee','Master2','doctorante','Doctorat') NOT NULL COMMENT 'niveau d étude d une candidate',
  `region-origine` enum('Adamoua','Centre','Extreme-nord','Est','Littoral','Ouest','Sud','Nord','Sud-ouest','Nord-ouest') NOT NULL COMMENT 'région d origine d une candidate',
  `region-concours` enum('Adamoua','Centre','Extreme-nord','Est','Littoral','Ouest','Sud','Nord','Sud-ouest','Nord-ouest','Null') DEFAULT NULL COMMENT 'région du concours d une candidate',
  `paysderesidence` varchar(50) NOT NULL DEFAULT 'Cameroun',
  `annee` int(11) NOT NULL DEFAULT '2019' COMMENT 'année du concours',
  `shortdesc` varchar(200) NOT NULL,
  `longdesc` text NOT NULL,
  `finaliste` tinyint(1) DEFAULT '0',
  `facebook-link` varchar(200) NOT NULL,
  `instagram-link` varchar(200) NOT NULL,
  `twitter-link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `nom`, `prenom`, `date-nais`, `lieu-nais`, `email`, `numtel`, `niveau-etude`, `region-origine`, `region-concours`, `paysderesidence`, `annee`, `shortdesc`, `longdesc`, `finaliste`, `facebook-link`, `instagram-link`, `twitter-link`) VALUES
(1, 'noumbie', 'arnold', '1992-03-25', 'douala', 'noumbie01@gmail.com', '+237694523657', 'premiere annee', 'Adamoua', 'Null', 'cameroun', 2019, 'enctype=\"multipart/form-data\" enctype=\"multipart/f', 'enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\" enctype=\"multipart/form-data\"', 0, 'https://www.cccc.cm', 'https://www.cccc.cm', 'https://www.cccc.cm'),
(11, 'jehemle', 'karen', '1996-04-21', 'douala', 'noumbie01e@gmail.com', '+237694523657e', 'premiere annee', 'Adamoua', 'Null', 'cameroun', 2019, 'Faites une description de vous Faites une descript', 'Faites une description de vous Faites une description de vous Faites une description de vous Faites une description de vous Faites une description de vous Faites une description de vous Faites une description de vous Faites une description de vous Faites une description de vous Faites une description de vous', 0, 'https://www.cccc.cmx', 'https://www.cccc.cmx', 'https://www.cccc.cmx');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `title`, `slug`) VALUES
(1, NULL, NULL, 'Category 1', 'category-1'),
(2, NULL, NULL, 'Category 2', 'category-2'),
(3, NULL, NULL, 'Category 3', 'category-3');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `name`, `email`, `message`) VALUES
(1, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 'Edd Kovacek', 'marty50@example.org', 'I shall fall right THROUGH the earth! How funny it\'ll seem to see if there were TWO little shrieks, and more puzzled, but she was now the right words,\' said poor Alice, and tried to get an.'),
(2, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 'Albertha Daugherty', 'nathan26@example.com', 'Normans--\" How are you getting on now, my dear?\' it continued, turning to the rose-tree, she went to the company generally, \'You are all dry, he is gay as a partner!\' cried the Mock Turtle, suddenly.'),
(3, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 'Ferne Rogahn', 'grant.blanca@example.net', 'FIT you,\' said the Duchess, \'chop off her knowledge, as there was a very short time the Mouse with an anxious look at the bottom of a bottle. They all sat down a very short time the Queen was.'),
(4, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 'Tyrique Rempel', 'ramona.ledner@example.org', 'Heads below!\' (a loud crash)--\'Now, who did that?--It was Bill, the Lizard) could not taste theirs, and the Dormouse began in a long, low hall, which was the White Rabbit, who was talking. \'How CAN.'),
(5, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 'Mr. Elwyn Smitham', 'mante.noelia@example.net', 'YOU with us!\"\' \'They were learning to draw,\' the Dormouse fell asleep instantly, and neither of the soldiers did. After these came the guests, mostly Kings and Queens, and among them Alice.'),
(6, '2019-07-06 17:03:15', '2019-07-06 17:03:15', 'Softagonopoulos', 'ward.ashlee@example.com', 'Alice dodged behind a great interest in questions of eating and drinking. \'They lived on treacle,\' said the King exclaimed, turning to the dance. \'\"What matters it how far we go?\" his scaly friend.');

-- --------------------------------------------------------

--
-- Table structure for table `ingoings`
--

CREATE TABLE `ingoings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ingoing_id` int(10) UNSIGNED NOT NULL,
  `ingoing_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingoings`
--

INSERT INTO `ingoings` (`id`, `created_at`, `updated_at`, `ingoing_id`, `ingoing_type`) VALUES
(6, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 6, 'App\\Models\\User'),
(7, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 7, 'App\\Models\\User'),
(8, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 8, 'App\\Models\\User'),
(9, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 9, 'App\\Models\\User'),
(10, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 10, 'App\\Models\\User'),
(11, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 11, 'App\\Models\\User'),
(12, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 12, 'App\\Models\\User'),
(13, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 13, 'App\\Models\\User'),
(14, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 14, 'App\\Models\\User'),
(15, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 15, 'App\\Models\\User'),
(16, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 16, 'App\\Models\\User'),
(17, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 17, 'App\\Models\\User'),
(18, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 18, 'App\\Models\\User'),
(19, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 19, 'App\\Models\\User'),
(20, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 20, 'App\\Models\\User'),
(21, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 21, 'App\\Models\\User'),
(23, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 1, 'App\\Models\\Contact'),
(24, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 2, 'App\\Models\\Contact'),
(25, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 3, 'App\\Models\\Contact'),
(26, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 4, 'App\\Models\\Contact'),
(27, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 5, 'App\\Models\\Contact'),
(28, '2019-07-06 17:03:15', '2019-07-06 17:03:15', 6, 'App\\Models\\Contact'),
(29, '2019-07-06 17:03:15', '2019-07-06 17:03:15', 1, 'App\\Models\\Post');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_02_01_233219_create_users_table', 1),
(3, '2017_03_10_233219_create_categories_table', 1),
(4, '2017_03_10_233219_create_posts_table', 1),
(5, '2017_03_10_233220_create_comments_table', 1),
(6, '2017_03_10_233220_create_contacts_table', 1),
(7, '2017_03_10_233220_create_ingoings_table', 1),
(8, '2017_03_10_233220_create_notifications_table', 1),
(9, '2017_03_10_233220_create_post_tag_table', 1),
(10, '2017_03_10_233220_create_tags_table', 1),
(11, '2017_03_18_145906_create_category_post_table', 1),
(12, '2017_03_18_145916_create_foreign_keys', 1),
(13, '2018_08_31_172300_add_confirmation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parametre`
--

CREATE TABLE `parametre` (
  `id` int(11) NOT NULL,
  `annee` date NOT NULL,
  `status` enum('régional','final','diaspora','') NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures-path`
--

CREATE TABLE `pictures-path` (
  `id` int(11) NOT NULL,
  `chemin` varchar(200) NOT NULL,
  `id-candidate` int(11) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pictures-path`
--

INSERT INTO `pictures-path` (`id`, `chemin`, `id-candidate`, `type`) VALUES
(1, '11oy18zgs7ci.jpeg', 11, '44'),
(2, '11mq3yzbhto5.png', 11, 'portrait');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `slug`, `seo_title`, `excerpt`, `body`, `meta_description`, `meta_keywords`, `active`, `user_id`, `image`) VALUES
(1, '2019-07-06 17:03:15', '2019-07-06 17:03:15', 'Post 1', 'post-1', 'Post 1', 'Sequi qui modi distinctio laudantium. Non voluptas in similique quia corrupti deleniti commodi in. Quasi quod omnis non illo recusandae voluptas corporis. Fugiat fugit hic deleniti sapiente rem reiciendis iusto.', 'Itaque autem aut dolores molestias. Esse aut corporis dolorum ducimus.\n\nCum nemo dicta fuga. Non dolor officiis sit eum. Est molestiae quia fuga. Quod modi qui similique et. Et non omnis nulla quae qui sint consectetur.\n\nMolestiae omnis exercitationem iste dolores repellendus. Eveniet eligendi quae quasi perspiciatis quam. Cumque sed numquam corrupti aut.\n\nEt quisquam nihil soluta tempora repudiandae. Numquam optio quisquam qui amet id quis est. Sit dolorum quisquam aut consequatur necessitatibus quia.\n\nEa suscipit explicabo nesciunt dolor distinctio est. Alias rem quasi quo delectus id ut. Quidem voluptatem et nobis autem dolore eius.\n\nDolores cumque nisi ut est sed et placeat. Ducimus est cumque vel et. Explicabo adipisci eveniet dicta atque id rerum minima est.\n\nIllum laborum expedita minus in neque voluptatem. Iure voluptas id nobis blanditiis. Id veniam incidunt magnam repellat tempora quisquam qui. Esse quo nobis debitis illum quod.\n\nVoluptatibus maiores deleniti numquam tempore maxime. Eligendi deserunt placeat consequatur perspiciatis autem. Ut optio delectus consectetur eos architecto.', 'Qui ipsam eveniet quibusdam et magnam doloribus aut.', 'dolor,repellat,repellat', 1, 1, '/files/img01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `tag`) VALUES
(1, NULL, NULL, 'Tag1'),
(2, NULL, NULL, 'Tag2'),
(3, NULL, NULL, 'Tag3'),
(4, NULL, NULL, 'Tag4'),
(5, NULL, NULL, 'Tag5'),
(6, NULL, NULL, 'Tag6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('user','redac','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomcomplet` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nom du user',
  `picturepath` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numtel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `name`, `email`, `password`, `remember_token`, `role`, `valid`, `confirmed`, `confirmation_code`, `nomcomplet`, `picturepath`, `numtel`) VALUES
(1, '2019-07-06 17:03:09', '2019-07-06 17:03:09', 'GreatAdmin', 'admin@la.fr', '$2y$10$n30B6tEzP9GCU2AUZKsv/uNylLvwyVdAnUpQy6zkxAZnJbniNJmuC', 'XgocY3iFgpWxqt51p3rzeYmH5kx2vxj9dKNdlU4UIdzabnc25fJ8r1HMg7UU', 'admin', 1, 1, NULL, '', NULL, NULL),
(2, '2019-07-06 17:03:09', '2019-07-06 17:03:09', 'GreatRedactor', 'redac@la.fr', '$2y$10$0ErXWJZa7.H6wGLcTCgscu1tsmKPpsb1UBQxP8F3.OKBQhxIeWgcG', 'VW0Qdmz2Rz', 'redac', 1, 1, NULL, '', NULL, NULL),
(3, '2019-07-06 17:03:09', '2019-07-06 17:03:09', 'Walker', 'walker@la.fr', '$2y$10$xUDnps5TtiPMKzxdAsWjr.7.6d5F71/4VQl7p8mYWq2INql8BiNXS', 'PziZ9xSbL6', 'user', 1, 1, NULL, '', NULL, NULL),
(4, '2019-07-06 17:03:09', '2019-07-06 17:03:09', 'Slacker', 'slacker@la.fr', '$2y$10$kQaQ5te7B2wPSGKnPCsi9uCk/jSoOC316TXAZKIbiKhqfCebGWe2m', 'gKKL1xUTFt', 'user', 1, 1, NULL, '', NULL, NULL),
(5, '2019-07-06 17:03:09', '2019-07-06 17:03:09', 'Worker', 'worker@la.fr', '$2y$10$xJox3q4lAtoRJrTbMhwApOvZARhjXYew1qdF3sW13aFkAlSfS/Dxe', 'FnqxiHNsv7', 'user', 0, 1, NULL, '', NULL, NULL),
(6, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Edythe Hauck', 'schaefer.breanna@example.net', '$2y$10$K3qtVDWnd89rYia6uxZrCu8i41GlfMYS9DSeXku1J83q8tLfZcsFq', 'broNgAOVLV', 'user', 1, 1, NULL, '', NULL, NULL),
(7, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Dr. Jackie Douglas', 'emma.ortiz@example.com', '$2y$10$KuBGeMbsV5hMYw3klibOpuZYewbyO6zJg78CxaC7xyiFa3p/OW2VK', 'vWLcwosW2p', 'user', 0, 1, NULL, '', NULL, NULL),
(8, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Prof. Aimee Emard Sr.', 'icie.cole@example.org', '$2y$10$GitnfPLzezeD1jAJkQbisuf4ShG.R.56LsZFVQrk/5O95l26Tt6Se', 'MvOFLKu4JA', 'user', 0, 0, NULL, '', NULL, NULL),
(9, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Chadrick Hodkiewicz', 'sabrina.larkin@example.net', '$2y$10$WowRez8S8IEfLuqavnZP6ekKvTx42TkRIKvd//uOBVbHmC8VrxaLu', '8gyP2zXJm6', 'user', 1, 0, NULL, '', NULL, NULL),
(10, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Dr. Lonny Carroll Jr.', 'bashirian.brody@example.org', '$2y$10$IeW58lIsx93zcudcgUBVHOl8hWaY.xiyDCOuFl5KzXvu68ySm/zmi', 'pzrBdjDLzc', 'user', 0, 0, NULL, '', NULL, NULL),
(11, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Shemar Macejkovic', 'ward.shayna@example.net', '$2y$10$fuc1.btPE4ZYliiibhWsv.mCE3ng.Oqgr/t26xkxv/TJRQuS2LNaa', 'T1yKuzEP97', 'user', 1, 0, NULL, '', NULL, NULL),
(12, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Leta McClure', 'sonny.carter@example.net', '$2y$10$Ha0pisDcW.CCHbezgQrhJecnE5K12nss7xdwnuRFVTH4mDr2A6x1C', 'LzlARlFRNv', 'user', 1, 0, NULL, '', NULL, NULL),
(13, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Prof. Mafalda Shields', 'jeramie.stehr@example.com', '$2y$10$8gjqonYc3GJkQdrLfmOeaOIVcyMM.LDqdrkJmTiG5fSoA4MxxGToa', 'LhtVLMWiEC', 'user', 0, 0, NULL, '', NULL, NULL),
(14, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Mr. Richie Gibson', 'van26@example.com', '$2y$10$by30jELQ99QBMdbI3shoEuDbqHEXeYnV6H886hkVOcflgxy3Orcuy', 'm1rrtfjb9p', 'user', 0, 0, NULL, '', NULL, NULL),
(15, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Mr. Santa Bins DDS', 'ndach@example.org', '$2y$10$Tutrc6aItH/618rkKDk50OFm4KtkYBA276/JeIVo1vNMBLKWv9Req', 'W4eDndtv0O', 'user', 1, 1, NULL, '', NULL, NULL),
(16, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Yadira Torphy III', 'cummings.dusty@example.net', '$2y$10$A5qCUdZz8lt773t./qOLcu9kWhw8AyjwGZwwsVdxPJS54GimxPfqm', 'wrrUtzqxJA', 'user', 0, 1, NULL, '', NULL, NULL),
(17, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Frank Bartoletti', 'ibrakus@example.com', '$2y$10$UvzurdV45vuAghqI1t46c./uBRjI58EC2mGBzQM8R4zyLqQPit6Ti', 'qbuh8HnGll', 'user', 1, 0, NULL, '', NULL, NULL),
(18, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Prof. Luis Donnelly', 'domenica.breitenberg@example.com', '$2y$10$8u0cf.yb8FYKjCJjZoZcweoxek8S8PhcoRsrTZkD/iJOHw3U.AaSC', 'YDW76lg7b8', 'user', 0, 1, NULL, '', NULL, NULL),
(19, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Maximillian Bode', 'stephanie.wolff@example.net', '$2y$10$1X7oa0/Q.21QQ2MvG5AUZuTPFo5InAhEeqBmGGHStESNWWAWbUCky', 'qFCU1mFBE4', 'user', 1, 1, NULL, '', NULL, NULL),
(20, '2019-07-06 17:03:11', '2019-07-06 17:03:11', 'Geoffrey Mraz III', 'lblanda@example.net', '$2y$10$VOwtjl3DEZa5Tu4oTmNvkuJ2w3I0XKTl86XXzJ97HxmKRMCZQFuxm', 'iFm0ItequO', 'user', 1, 1, NULL, '', NULL, NULL),
(21, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 'Sorditofublos', 'sordi@la.fr', '$2y$10$brjfHda.b9FYwjaycTSqmenJZCfGHEq6aTn0.asOdshXOutvhUKbG', '8xsT7hludE', 'user', 1, 1, NULL, '', NULL, NULL),
(22, '2019-07-06 17:03:13', '2019-07-06 17:03:13', 'Martinobinus', 'martin@la.fr', '$2y$10$60MvOapwPwl/XV.QNkP8/eFAc3NZNAGxQpk0k9ohQwPkhnwE/sCnS', 'B5yr6x8Sv6', 'user', 0, 0, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `id-candidate` int(11) NOT NULL,
  `id-user` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `device-id` varchar(250) NOT NULL,
  `nbre-vote` int(11) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT 'forfait , simple',
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numtel` (`numtel`),
  ADD UNIQUE KEY `facebook-link` (`facebook-link`),
  ADD UNIQUE KEY `instagram-link` (`instagram-link`),
  ADD UNIQUE KEY `twitter-link` (`twitter-link`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_category_id_foreign` (`category_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_parent_id_index` (`parent_id`),
  ADD KEY `comments_lft_index` (`lft`),
  ADD KEY `comments_rgt_index` (`rgt`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingoings`
--
ALTER TABLE `ingoings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingoings_ingoing_id_index` (`ingoing_id`),
  ADD KEY `ingoings_ingoing_type_index` (`ingoing_type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures-path`
--
ALTER TABLE `pictures-path`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-candidate` (`id-candidate`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_unique` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `picturepath` (`picturepath`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-candidate` (`id-candidate`),
  ADD KEY `id-user` (`id-user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id d une candidat', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingoings`
--
ALTER TABLE `ingoings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `parametre`
--
ALTER TABLE `parametre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures-path`
--
ALTER TABLE `pictures-path`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pictures-path`
--
ALTER TABLE `pictures-path`
  ADD CONSTRAINT `pictures-path_ibfk_1` FOREIGN KEY (`id-candidate`) REFERENCES `candidates` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`id-candidate`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`id-user`) REFERENCES `candidates` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
