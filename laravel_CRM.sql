-- Adminer 4.8.1 MySQL 8.0.37-0ubuntu0.20.04.3 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` bigint NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `fullname`, `email`, `phone`, `avatar`, `otp`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Reajul Hasan Raju',	'login@rhraju.com',	'+8801628446291',	NULL,	0,	'$2y$12$AfL2NcOu4j8bZ/CXIo.xDeuE7Bvx2w3s6RDRLHVjX6/f4LqVO98Am',	NULL,	'2024-05-18 13:06:17',	'2024-05-18 13:06:17')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `fullname` = VALUES(`fullname`), `email` = VALUES(`email`), `phone` = VALUES(`phone`), `avatar` = VALUES(`avatar`), `otp` = VALUES(`otp`), `password` = VALUES(`password`), `remember_token` = VALUES(`remember_token`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_id` bigint NOT NULL,
  `type` enum('personal','corporate') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'personal',
  `status` enum('active','inactive','restricted') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`),
  UNIQUE KEY `customers_personal_id_unique` (`personal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customers` (`id`, `fullname`, `email`, `phone`, `personal_id`, `type`, `status`, `avatar`, `address`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2,	'Paul Jefferson',	'paul@rhraju.com',	'+8801987338945',	1313625,	'personal',	'active',	NULL,	NULL,	'$2y$12$WCXHjHUTMmCDAWx5CmsEXOL5cI9xDHCqTK0vuTuQu2yT9KyOcPh/G',	NULL,	'2024-06-25 19:45:51',	'2024-06-25 14:05:19'),
(3,	'Iris Ashley',	'ashley@rhraju.com',	'+8801875409823',	2442158,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$Npkia/Y8g9.UxsuD0XMpferO6Fl61QakI.y1fTyKFunrSkYSKAhC.',	NULL,	'2024-06-25 19:45:51',	'2024-06-25 19:45:51'),
(4,	'Hamish Frost',	'frost@rhraju.com',	'+8801829647837',	1452448,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$.ByZv3/3dPXhiL.kMg/wZOsT9Kssa6BE14IBhgsBM6SQlQYAjubiu',	NULL,	'2024-06-25 19:45:51',	'2024-06-25 19:45:51'),
(5,	'Lucian Perez',	'perez@rhraju.com',	'+8801827466589',	1638460,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$DH.8gS4ISMO9tA2lHX/Sduy56CdE5YE.F9lasO8JIpokTiwRvmTGW',	NULL,	'2024-06-25 19:45:51',	'2024-06-25 19:45:51'),
(6,	'Jessica Bond',	'jessica@rhraju.com',	'+8801364775839',	8718921,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$GMhIbbGLssfqZzAY75rWIesbl2uRDwmq4tWD7eKVBL9CD5TjnXH5m',	NULL,	'2024-06-25 19:45:51',	'2024-06-25 19:45:51'),
(7,	'Natalie Portman',	'natalie@rhraju.com',	'+8801374883999',	4826604,	'personal',	'inactive',	NULL,	'36 Broadway Avenue, Dhaka -1202',	'$2y$12$yUt1VrMVlQp5ZlRmAC6saOJ.LCpmThsbn6whAlFn0hGdiKnXttUwy',	NULL,	'2024-06-25 19:45:51',	'2024-06-25 14:02:10'),
(8,	'Channing Hendrix',	'hendrix@rhraju.com',	'+8801829558459',	2003621,	'personal',	'active',	NULL,	NULL,	'$2y$12$EQwEs5Gmy0pzIKmG53rEw.pd2ypJJ4vTFRp.n0r3b56R7xSgKqK5u',	NULL,	'2024-06-25 19:45:51',	'2024-06-25 14:01:13'),
(9,	'Pete Murphy',	'pete@rhraju.com',	'+8801928665334',	6005978,	'personal',	'active',	NULL,	'365 Broadway R/A, Dhaka - 1202',	'$2y$12$ICoMjr9OFLoOmVLMcdh2Wu7AdGEv0ppHCqmaTPNqUv2E5G37HYJ2q',	NULL,	'2024-06-25 19:45:51',	'2024-06-25 19:45:51'),
(10,	'Sydney Rose',	'rose@mailinator.com',	'+8801765483954',	5035583,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$wxgLC2LdP515TYjstHBJhODlyUX85r6a/alNo4Z72HwknpQCh9e4e',	NULL,	'2024-03-25 15:20:44',	'2024-03-25 15:20:44'),
(11,	'Ava Carter',	'tixu@mailinator.com',	'+8801423849834',	2615154,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$qACxe5AkcswHbqSEfQR53ek4nz4.OpO/kzNdCIdubcxUz8/rieaLO',	NULL,	'2024-03-25 15:21:24',	'2024-03-25 15:21:24'),
(12,	'Nadine Tyler',	'xudomu@mailinator.com',	'+8801928366274',	1499994,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$gFVcR8fft0EpiDaHbjdvaes6s5lT8DOveDK/7s.Qxzg2xEG9YcpeK',	NULL,	'2024-03-25 15:21:56',	'2024-03-25 15:21:56'),
(13,	'Lamar Waller',	'suluhopi@mailinator.com',	'+8801675652468',	3032624,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$.BuBeoEwnrtWJOEJ.zBaKuINpxVxecLBLlXE0aLhpDdKN8NtnANXq',	NULL,	'2024-04-25 15:25:27',	'2024-04-25 15:25:27'),
(14,	'Jamal Mayer',	'mugihilap@mailinator.com',	'+8801643125219',	4408658,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$xZi1DE2pGjPw6Iq/7QzOIu3gXpNx4q22F0vL2dldVlEl428dp7tkO',	NULL,	'2024-04-25 15:25:32',	'2024-04-25 15:25:32'),
(15,	'Garrett Odom',	'qozosyge@mailinator.com',	'+8801242787937',	4614278,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$2syl2EfVmhVECndzqZS.AOicGu6EjuZWsE4wrWRdlD.mUOqFd3Xfm',	NULL,	'2024-04-25 15:25:41',	'2024-04-25 15:25:41'),
(16,	'Salvador Kirkland',	'tocikebybi@mailinator.com',	'+8801748338362',	9703063,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$W7F9hQpY/f.WjpKPJyg7jeSoa268kH8odwHdM8nTR6/M9IvwOH7HK',	NULL,	'2024-05-25 15:25:47',	'2024-05-25 15:25:47'),
(17,	'Mikayla Jennings',	'puzixufa@mailinator.com',	'+8801419571428',	9870993,	'personal',	'inactive',	NULL,	NULL,	'$2y$12$zbzverYRqYXjXSNSC3reW.lQD0Uh96xCkxEwrq/zMY1A4JmGtw8HK',	NULL,	'2024-05-25 15:25:53',	'2024-05-25 15:25:53')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `fullname` = VALUES(`fullname`), `email` = VALUES(`email`), `phone` = VALUES(`phone`), `personal_id` = VALUES(`personal_id`), `type` = VALUES(`type`), `status` = VALUES(`status`), `avatar` = VALUES(`avatar`), `address` = VALUES(`address`), `password` = VALUES(`password`), `remember_token` = VALUES(`remember_token`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2024_03_20_103858_create_admins_table',	1),
(2,	'2024_03_20_105422_create_notices_table',	1),
(3,	'2024_03_20_110228_create_customers_table',	1),
(4,	'2024_03_20_110651_create_plans_table',	1),
(5,	'2024_03_20_114526_create_subscriptions_table',	1),
(6,	'2024_03_20_115154_create_tickets_table',	1),
(7,	'2024_03_20_145622_create_staffs_table',	1),
(8,	'2024_03_20_150413_create_tasks_table',	1),
(9,	'2024_03_20_161112_create_sessions_table',	1),
(10,	'2024_06_09_183812_create_orders_table',	2),
(11,	'2024_06_16_145139_create_orders_table',	3)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `migration` = VALUES(`migration`), `batch` = VALUES(`batch`);

DROP TABLE IF EXISTS `notices`;
CREATE TABLE `notices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notices_admin_id_foreign` (`admin_id`),
  CONSTRAINT `notices_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `notices` (`id`, `admin_id`, `title`, `description`, `notice_img`, `created_at`, `updated_at`) VALUES
(1,	1,	'Service Drop Alert!!!',	'There will be a scheduled maintenance from Monday 11.59 PM to Tuesday 6.00 AM. Please be patient.\r\n\r\n- EarthLink LLC',	NULL,	'2024-04-18 14:40:30',	'2024-04-18 12:59:34'),
(2,	1,	'Important Update on Our Services and Upcoming Maintenance',	'To ensure the reliability and performance of our network, we will be conducting maintenance on our systems. This maintenance is essential to upgrade our infrastructure and improve service quality.\r\n\r\nStart: 25th June, 2035 (11:00 AM)\r\nEnd: 26th June, 2035 (3:30 PM)\r\n\r\n- EarthLink LLC',	NULL,	'2024-05-02 14:45:34',	'2024-05-02 14:45:34'),
(3,	1,	'Urgent: Reset Your WiFi Now',	'We have detected a potential issue with your network. Please reset your WiFi immediately to ensure continued connectivity and security.',	NULL,	'2024-05-18 13:07:35',	'2024-05-18 13:07:35'),
(5,	1,	'Urgent Service Interruption Notice',	'We are currently experiencing unexpected service interruptions due to a critical system fault. Our team is actively working to resolve the issue, and we appreciate your patience.',	NULL,	'2024-06-02 15:00:53',	'2024-06-02 15:00:53'),
(6,	1,	'Service Drop Alert',	'There will be a scheduled maintenance from Monday 11:59 PM to Tuesday 6.00 AM. Stay with us!',	NULL,	'2024-06-24 12:58:22',	'2024-06-24 12:58:22')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `admin_id` = VALUES(`admin_id`), `title` = VALUES(`title`), `description` = VALUES(`description`), `notice_img` = VALUES(`notice_img`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` bigint unsigned NOT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `payment_method` enum('cash','mfs','credit_card') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customer_id_foreign` (`customer_id`),
  KEY `orders_plan_id_foreign` (`plan_id`),
  CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `customer_id`, `address`, `plan_id`, `total_price`, `payment_method`, `created_at`, `updated_at`) VALUES
(1,	9,	'35 Suborno R/A, Bahaddarhat, Chittagong, Chittagong, Bangladesh-4206',	3,	1050.00,	'cash',	'2024-05-24 09:44:13',	'2024-05-24 09:44:13'),
(2,	7,	'Shymoli R/A, Pahatali, Baro-Quarter, Chittagong, Bangladesh-4202',	2,	850.00,	'cash',	'2024-06-24 13:08:56',	'2024-06-24 13:08:56'),
(3,	8,	'365 W,  H Block, Halishahar, Chittagong, Bangladesh-4202',	4,	1150.00,	'cash',	'2024-06-25 09:20:27',	'2024-06-25 09:20:27'),
(4,	2,	'35 Suborno R/A, Bahaddarhat, Chittagong, Chittagong, Bangladesh-4202',	3,	1050.00,	'cash',	'2024-06-25 14:03:28',	'2024-06-25 14:03:28')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `customer_id` = VALUES(`customer_id`), `address` = VALUES(`address`), `plan_id` = VALUES(`plan_id`), `total_price` = VALUES(`total_price`), `payment_method` = VALUES(`payment_method`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `plans`;
CREATE TABLE `plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `billing_cycle` enum('monthly','yearly','semi-annual') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dspeed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uspeed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `plans` (`id`, `name`, `price`, `billing_cycle`, `plan_img`, `dspeed`, `uspeed`, `limit`, `description`, `created_at`, `updated_at`) VALUES
(1,	'Silver Pack',	650.00,	'monthly',	NULL,	'15 MBPS',	'50 MBPS',	'150 GB',	'Not Ideal For: Gaming, Streaming',	'2024-05-18 13:16:58',	'2024-05-18 13:16:58'),
(2,	'Gold Pack',	850.00,	'monthly',	NULL,	'25 MBPS',	'50 MBPS',	'230 GB',	'Not Ideal For: Gaming, Streaming',	'2024-05-18 13:17:18',	'2024-05-18 13:17:18'),
(3,	'Platinum Pack',	1050.00,	'monthly',	NULL,	'40 MBPS',	'100 MBPS',	'300 GB',	'Ideal For: Gaming, Streaming',	'2024-05-18 13:17:36',	'2024-05-18 13:17:36'),
(4,	'Corporate Pack',	1150.00,	'monthly',	NULL,	'45 MBPS',	'100 MBPS',	'500 GB',	'Ideal For: Conference, Streaming',	'2024-05-18 13:18:45',	'2024-05-18 13:18:57')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `price` = VALUES(`price`), `billing_cycle` = VALUES(`billing_cycle`), `plan_img` = VALUES(`plan_img`), `dspeed` = VALUES(`dspeed`), `uspeed` = VALUES(`uspeed`), `limit` = VALUES(`limit`), `description` = VALUES(`description`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kxo1WoshYXL7EFJiiCz7Zae1meICdqAWFpmyS0zU',	NULL,	'127.0.0.1',	'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:126.0) Gecko/20100101 Firefox/126.0',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoibm1FcWgyOElCN2NneTBXOHFLOTBxRmlHcllkSEV4VUpIbEc0UWVtYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hbGwtc3Vic2NyaXB0aW9ucyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1719345919),
('rqThu6XTjAp6uJrGFGjyGZQPWeBBMD8II8gXEa15',	NULL,	'127.0.0.1',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXdFNWxoN0NsT2hHMlM0Rm1VMml4UXZoVFNNdldmYUNVd2pDa2gwSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1719351470)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `ip_address` = VALUES(`ip_address`), `user_agent` = VALUES(`user_agent`), `payload` = VALUES(`payload`), `last_activity` = VALUES(`last_activity`);

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('default','engineer','sales','technician','field_worker') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `salary` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staffs_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `staffs` (`id`, `fullname`, `email`, `phone`, `avatar`, `position`, `salary`, `created_at`, `updated_at`) VALUES
(2,	'Adrien Emerson',	'emerson@rhraju.com',	'+8801879556433',	NULL,	'sales',	35000.00,	'2024-05-18 13:11:43',	'2024-06-24 11:01:08'),
(4,	'Daniel Atkins',	'atkins@rhraju.com',	'+8801779578345',	NULL,	'field_worker',	28000.00,	'2024-05-18 13:12:56',	'2024-05-18 13:12:56'),
(5,	'Mark Salas',	'salas@rhraju.com',	'+88015839027456',	NULL,	'field_worker',	28300.00,	'2024-05-18 13:13:17',	'2024-05-18 13:15:20'),
(6,	'Fitzgerald Stein',	'stein@rhraju.com',	'+88018092749245',	NULL,	'technician',	32500.00,	'2024-05-18 13:14:38',	'2024-05-18 13:14:38')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `fullname` = VALUES(`fullname`), `email` = VALUES(`email`), `phone` = VALUES(`phone`), `avatar` = VALUES(`avatar`), `position` = VALUES(`position`), `salary` = VALUES(`salary`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `plan_id` bigint unsigned NOT NULL,
  `start_date` date NOT NULL,
  `next_billing_date` date NOT NULL,
  `status` enum('active','inactive','restricted') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `total_cost` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_customer_id_foreign` (`customer_id`),
  KEY `subscriptions_plan_id_foreign` (`plan_id`),
  CONSTRAINT `subscriptions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `subscriptions` (`id`, `customer_id`, `plan_id`, `start_date`, `next_billing_date`, `status`, `total_cost`, `created_at`, `updated_at`) VALUES
(2,	9,	3,	'2024-04-24',	'2024-05-24',	'active',	1050.00,	'2024-04-24 09:44:33',	'2024-04-24 13:05:03'),
(3,	7,	2,	'2024-05-24',	'2024-06-24',	'inactive',	850.00,	'2024-05-24 13:08:56',	'2024-05-24 14:02:10'),
(4,	8,	4,	'2024-06-25',	'2024-07-25',	'active',	1150.00,	'2024-06-25 09:20:27',	'2024-06-25 14:01:13'),
(5,	2,	3,	'2024-06-25',	'2024-07-25',	'active',	1050.00,	'2024-06-25 14:03:28',	'2024-06-25 14:05:19'),
(6,	16,	4,	'2024-04-25',	'2024-05-25',	'inactive',	1150.00,	'2024-05-25 14:40:30',	'2024-05-25 13:28:12'),
(7,	17,	3,	'2024-04-25',	'2024-05-25',	'inactive',	1050.00,	'2024-05-25 14:40:30',	'2024-05-25 13:28:12'),
(9,	17,	3,	'2024-03-25',	'2024-04-25',	'inactive',	1050.00,	'2024-03-25 14:40:30',	'2024-03-25 13:28:12'),
(10,	13,	3,	'2024-05-24',	'2024-06-24',	'active',	1050.00,	'2024-05-24 09:44:33',	'2024-05-24 13:05:03'),
(11,	12,	3,	'2024-02-25',	'2024-03-25',	'active',	1050.00,	'2024-02-25 14:03:28',	'2024-02-25 14:05:19')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `customer_id` = VALUES(`customer_id`), `plan_id` = VALUES(`plan_id`), `start_date` = VALUES(`start_date`), `next_billing_date` = VALUES(`next_billing_date`), `status` = VALUES(`status`), `total_cost` = VALUES(`total_cost`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint unsigned NOT NULL,
  `admin_id` bigint unsigned NOT NULL,
  `ticket_id` bigint unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_staff_id_foreign` (`staff_id`),
  KEY `tasks_admin_id_foreign` (`admin_id`),
  KEY `tasks_ticket_id_foreign` (`ticket_id`),
  CONSTRAINT `tasks_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `tasks_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `tasks_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `ticket_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','closed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_customer_id_foreign` (`customer_id`),
  CONSTRAINT `tickets_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tickets` (`id`, `customer_id`, `ticket_id`, `title`, `description`, `ticket_img`, `status`, `created_at`, `updated_at`) VALUES
(5,	7,	'TKT-0625-7-2505',	'General Enquiries',	'I would like to know more about your premium subscription plans. Could you please provide me with the details and pricing?',	NULL,	'active',	'2024-06-25 09:07:21',	'2024-06-25 10:17:08'),
(6,	9,	'TKT-0625-9-7224',	'Filing a Complaint',	'I am dissatisfied with the recent service I received. The response time was very slow and did not resolve my issue.',	NULL,	'active',	'2024-06-25 09:17:55',	'2024-06-25 09:17:55'),
(7,	8,	'TKT-0625-8-4549',	'Billing Issues',	'The panel crashes every time I try to purchase a subscription. Can you help me troubleshoot and fix this problem?',	NULL,	'closed',	'2024-06-25 09:19:36',	'2024-06-25 10:16:21'),
(8,	2,	'TKT-0625-2-5995',	'Feature Requests',	'I love the new interface, but it would be great if you could add a dark mode option. It\'s easier on the eyes during night time.',	NULL,	'closed',	'2024-06-25 09:31:36',	'2024-06-25 10:16:22'),
(9,	2,	'TKT-0625-2-8005',	'Billing Issues',	'I was charged twice for my last purchase. Can you please assist with a refund?',	NULL,	'closed',	'2024-06-25 09:33:49',	'2024-06-25 10:16:24'),
(10,	7,	'TKT-0625-7-9946',	'Technical Support',	'I\'m having trouble setting up the subscription I purchased. Can you provide step-by-step instructions?',	NULL,	'closed',	'2024-06-25 09:34:45',	'2024-06-25 10:16:26')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `customer_id` = VALUES(`customer_id`), `ticket_id` = VALUES(`ticket_id`), `title` = VALUES(`title`), `description` = VALUES(`description`), `ticket_img` = VALUES(`ticket_img`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

-- 2024-06-25 21:38:04
