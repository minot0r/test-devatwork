CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` timestamp NULL DEFAULT NULL,
  `status` enum('high','low') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('F','M','/') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `name`, `surname`, `birth_date`, `status`, `gender`) VALUES
(1, 'Emmalee', 'Hills', '2023-03-24 00:36:57', 'high', 'M'),
(2, 'Otis', 'Leannon', '2023-05-09 03:07:27', 'low', 'M'),
(3, 'Devin', 'Lueilwitz', '2023-07-28 23:17:43', 'low', 'M'),
(4, 'Ettie', 'Heidenreich', '2023-08-13 11:41:08', 'high', 'M'),
(5, 'Jada', 'Senger', '2023-04-16 04:49:40', 'high', 'F'),
(6, 'Mathew', 'Flatley', '2023-04-30 13:01:12', 'low', 'F'),
(7, 'Veda', 'Mosciski', '2022-12-27 04:41:45', 'high', 'M'),
(8, 'Savion', 'Denesik', '2023-07-03 03:26:08', 'low', 'F'),
(9, 'Modesto', 'Auer', '2023-05-24 04:07:57', 'low', 'M'),
(10, 'Hollie', 'Harber', '2023-08-29 03:06:52', 'low', 'M'),
(11, 'Palma', 'Botsford', '2023-04-20 22:57:04', 'low', 'F'),
(12, 'Reece', 'Grady', '2023-06-30 20:29:24', 'high', 'F'),
(13, 'Raegan', 'Sanford', '2022-12-05 10:13:36', 'high', 'F'),
(14, 'Camron', 'Schaden', '2023-08-30 18:03:04', 'high', 'M'),
(15, 'Citlalli', 'O\'Hara', '2023-10-12 23:07:26', 'high', 'M'),
(16, 'Vernice', 'Osinski', '2023-08-21 08:38:44', 'low', 'F'),
(17, 'Emilie', 'Erdman', '2023-02-07 12:49:58', 'high', 'M'),
(18, 'Werner', 'Schmidt', '2023-02-20 13:48:40', 'high', 'M'),
(19, 'Kelley', 'Nicolas', '2023-08-04 13:44:49', 'low', 'M'),
(20, 'Santos', 'Conn', '2023-05-11 22:42:10', 'low', 'M'),
(21, 'Kenyatta', 'Wilderman', '2023-10-13 16:11:56', 'high', 'M'),
(22, 'Mohammed', 'Cartwright', '2023-10-01 01:10:43', 'high', 'M'),
(23, 'Tatum', 'Wisozk', '2023-08-12 12:43:00', 'high', 'M'),
(24, 'Lilla', 'Howell', '2022-12-01 11:47:31', 'high', 'M'),
(25, 'Bonnie', 'Walter', '2023-03-20 00:00:57', 'low', 'M'),
(26, 'Tiana', 'Dooley', '2023-07-16 12:46:58', 'high', 'M'),
(27, 'Sherwood', 'Mertz', '2022-11-17 22:07:04', 'low', 'F'),
(28, 'Kianna', 'McDermott', '2022-11-25 17:32:21', 'high', 'M'),
(29, 'Pablo', 'Herman', '2023-01-30 05:07:21', 'high', 'M'),
(30, 'Ulices', 'Breitenberg', '2022-12-04 02:32:08', 'low', 'M'),
(31, 'Sylvester', 'Hammes', '2023-06-26 08:28:35', 'high', 'F'),
(32, 'Imani', 'Hilll', '2023-11-09 20:39:44', 'high', 'M'),
(33, 'Antoinette', 'Runte', '2023-07-28 10:35:20', 'low', 'F'),
(34, 'Joy', 'Feest', '2023-09-18 15:57:05', 'high', 'F'),
(35, 'Giles', 'Stark', '2023-10-17 18:44:15', 'low', 'M'),
(36, 'Mireya', 'Trantow', '2023-02-23 08:36:31', 'low', 'F'),
(37, 'Destany', 'Gulgowski', '2023-06-27 08:32:56', 'low', 'M'),
(38, 'Madisen', 'Aufderhar', '2023-09-19 16:49:59', 'high', 'M'),
(39, 'Leanna', 'Marquardt', '2023-01-29 17:23:53', 'high', 'M'),
(40, 'Philip', 'Quitzon', '2023-07-10 02:38:10', 'low', 'F'),
(41, 'Deshawn', 'Carroll', '2022-11-23 00:24:43', 'low', 'F'),
(42, 'Ebony', 'Hilll', '2022-12-25 15:23:34', 'low', 'F'),
(43, 'Rupert', 'Langworth', '2023-06-15 07:53:56', 'high', 'M'),
(44, 'Deven', 'Waelchi', '2023-01-29 22:58:37', 'low', 'F'),
(45, 'Brielle', 'Reichel', '2022-12-03 10:05:00', 'high', 'F'),
(46, 'Jackeline', 'Langworth', '2023-10-31 10:22:25', 'low', 'F'),
(47, 'Fermin', 'Schroeder', '2023-01-30 18:22:32', 'low', 'F'),
(48, 'Una', 'Grant', '2023-05-24 19:27:03', 'low', 'F'),
(49, 'Daren', 'Nicolas', '2022-11-17 09:39:18', 'low', 'F'),
(50, 'Krystal', 'McKenzie', '2023-03-31 12:00:06', 'low', 'F'),
(51, 'Wallace', 'Prosacco', '2023-07-15 23:53:54', 'high', 'M'),
(52, 'Okey', 'Botsford', '2023-10-31 16:35:32', 'low', 'F'),
(53, 'Joey', 'Prosacco', '2023-05-12 21:28:34', 'low', 'M'),
(54, 'Delphia', 'Miller', '2023-05-21 11:31:01', 'high', 'M'),
(55, 'Chanelle', 'Yost', '2023-11-07 21:13:25', 'low', 'F'),
(56, 'Birdie', 'Frami', '2023-02-19 03:05:27', 'high', 'F'),
(57, 'Grayson', 'Mills', '2023-08-17 08:31:59', 'high', 'M'),
(58, 'Elliott', 'Batz', '2023-01-28 22:27:20', 'low', 'F'),
(59, 'Maxine', 'Hills', '2023-10-30 10:45:41', 'high', 'M'),
(60, 'Miles', 'Fahey', '2022-12-16 04:32:59', 'high', 'F'),
(61, 'Orie', 'Moen', '2023-10-01 11:47:03', 'high', 'M'),
(62, 'Abelardo', 'Treutel', '2023-03-14 10:12:27', 'high', 'F'),
(63, 'Gilda', 'D\'Amore', '2023-04-15 02:41:05', 'low', 'F'),
(64, 'Margarett', 'Kovacek', '2023-08-11 08:04:57', 'high', 'M'),
(65, 'Terrence', 'McCullough', '2023-08-16 13:00:43', 'low', 'F'),
(66, 'Bryon', 'Witting', '2023-09-23 21:07:42', 'low', 'F'),
(67, 'Lurline', 'Bednar', '2023-06-06 07:31:39', 'low', 'M'),
(68, 'Saige', 'Kunze', '2023-09-05 14:03:13', 'low', 'M'),
(69, 'Richmond', 'Windler', '2023-08-16 06:51:09', 'high', 'F'),
(70, 'Braden', 'Glover', '2023-07-16 18:28:26', 'low', 'F'),
(71, 'Garth', 'Hartmann', '2023-07-14 18:50:08', 'high', 'F'),
(72, 'Caterina', 'McKenzie', '2022-11-22 17:40:03', 'high', 'M'),
(73, 'Merritt', 'Hirthe', '2023-02-14 14:45:58', 'high', 'M'),
(74, 'Gage', 'Schroeder', '2023-05-09 07:48:07', 'high', 'F'),
(75, 'Dashawn', 'Hahn', '2022-11-23 13:48:21', 'high', 'F'),
(76, 'Bennett', 'Cummerata', '2023-04-15 14:58:20', 'high', 'F'),
(77, 'Kellen', 'Runolfsdottir', '2023-02-16 06:02:17', 'low', 'F'),
(78, 'Rhiannon', 'Daniel', '2022-12-26 19:32:17', 'high', 'M'),
(79, 'Shawn', 'Stark', '2023-05-21 03:44:37', 'high', 'F'),
(80, 'Cooper', 'Reilly', '2023-04-05 08:28:26', 'high', 'F'),
(81, 'Alfredo', 'Keebler', '2023-06-22 14:23:45', 'low', 'F'),
(82, 'Liliane', 'Greenfelder', '2023-08-29 19:25:34', 'low', 'M'),
(83, 'Samantha', 'Wilkinson', '2023-02-05 02:14:08', 'low', 'M'),
(84, 'Clement', 'Considine', '2023-10-31 12:09:12', 'low', 'F'),
(85, 'Alexa', 'Waters', '2023-06-21 01:57:53', 'high', 'M'),
(86, 'Mac', 'Walter', '2023-06-19 08:42:52', 'low', 'F'),
(87, 'Antonette', 'Hahn', '2023-05-09 22:26:47', 'low', 'M'),
(88, 'Leif', 'Gutmann', '2022-12-18 18:11:12', 'high', 'M'),
(89, 'Horacio', 'Steuber', '2022-11-29 12:16:49', 'high', 'M'),
(90, 'Lorna', 'Schuppe', '2023-09-20 04:04:10', 'high', 'F'),
(91, 'Wilhelm', 'Rice', '2023-09-30 05:23:08', 'low', 'M'),
(92, 'Jordyn', 'Doyle', '2022-12-27 21:31:42', 'high', 'F'),
(93, 'Leopoldo', 'Cruickshank', '2023-04-26 07:29:09', 'high', 'M'),
(94, 'Ross', 'Hartmann', '2023-05-29 09:56:48', 'high', 'F'),
(95, 'Donato', 'Collier', '2023-11-10 03:11:30', 'high', 'M'),
(96, 'Reymundo', 'Emmerich', '2023-09-24 01:07:03', 'low', 'M'),
(97, 'Leopold', 'Bode', '2023-05-26 14:51:19', 'high', 'F'),
(98, 'Beryl', 'Emmerich', '2023-01-30 06:22:15', 'high', 'M'),
(99, 'Don', 'Nolan', '2023-08-29 18:38:20', 'high', 'F'),
(100, 'Justine', 'Crona', '2023-11-04 15:56:56', 'high', 'F');
