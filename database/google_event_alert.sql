-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2025 at 08:58 AM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `google_event_alert`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `login_oauth_uid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_calendar_token` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_refresh_token` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `login_oauth_uid`, `first_name`, `last_name`, `email_address`, `phone_number`, `profile_picture`, `google_calendar_token`, `google_refresh_token`, `created_at`, `updated_at`) VALUES
(1, '112052529189066576745', 'Akhin', 'Joy', 'akhin@weamse.com', '8296607603', 'https://lh3.googleusercontent.com/a/ACg8ocK2xs7TuGQL5bI2pb5p-bL68ovV0Bi76V3m5wgL3O6Bw8t-qQ=s96-c', 'ya29.a0AeXRPp4FKTEaQusxBolK-dvpJKO-qwQhnn7UHjCu5LaNuccL5m8z13iUY9sR1fGxZqTdvlerDXZwMJ4wMDWsOcEEtpKxKWr6brWAUhLHvb2KtnJ9ts53j9PbRPqhEvk6hP9SmLyPLmWscVAXzZtCrau6daVIyplmioNC_uXfaCgYKAWASARISFQHGX2MisZ01MXk1aqKJV8mxxeIvMw0175', '1//0gg6J8ZiGleVACgYIARAAGBASNwF-L9IrX3PifNphX0kz5nIreipZzNx5VGK9WeoO0qmmKhT0Wj3jyEwWjleJrRAq6-6srvPGvTs', '2025-03-01 12:21:51', '2025-03-01 13:14:38'),
(2, '106547813886929402667', 'Akhi', 'n', 'akhinkjoy123@gmail.com', '8296607603', 'https://lh3.googleusercontent.com/a/ACg8ocKHGjIqi9PKGuQUmck_3iJ8D0HdBK7o6-7bBS7xhMXVyAGZXko8=s96-c', 'ya29.a0AeXRPp4-_gg4KlaEYBacHXiaP8nBZKPzO8DGP8fPZxKKGTgb4n8P01yjy9A9OEOGqv9LwWEVn5PjALe2WUQ9M8LLl3tVRIDQa9BN4bV0ESOFJpbpxAtkd0g3_10eGx18rKJIbHie9LQ7HPezzJRXDp4ovcucgeRRCQ7fHeQSaCgYKAVMSARISFQHGX2MiehWoZlhQUd5y7qxjCIFg_Q0175', '1//0gaIjBdUyquzeCgYIARAAGBASNwF-L9Ir3QFmMQEGQSrZqaB043Ol70pjyfix8yrDBcfs5bxr2gAycacCs2X8pMf0SSoKa50JpA8', '2025-03-01 13:16:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
