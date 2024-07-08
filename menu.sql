-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-07-08 14:09:03
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `menu`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `eat_history`
--

CREATE TABLE `eat_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `total_kcal` int(11) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `eat_date` date NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `eat_history`
--

INSERT INTO `eat_history` (`id`, `user_id`, `main_id`, `sub_id`, `total_kcal`, `category`, `eat_date`, `create_date_time`, `update_date_time`, `is_deleted`) VALUES
(225, 6, 1, 7, 438, 0, '2024-07-08', '2024-07-08 21:04:22', '2024-07-08 21:04:22', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `kcal` int(11) NOT NULL,
  `recipe` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `main`
--

INSERT INTO `main` (`id`, `name`, `category`, `kcal`, `recipe`) VALUES
(1, '鶏の唐揚げ', 0, 303, 'https://cookpad.com/search/鶏の唐揚げ'),
(2, '肉じゃが', 0, 170, 'https://cookpad.com/search/肉じゃが'),
(3, 'とんかつ', 0, 463, 'https://cookpad.com/search/とんかつ'),
(5, 'てんぷら', 0, 167, 'https://cookpad.com/search/てんぷら'),
(6, 'サバの味噌煮', 0, 141, 'https://cookpad.com/search/サバの味噌煮'),
(7, '親子丼', 0, 684, 'https://cookpad.com/search/親子丼'),
(8, '牛丼', 0, 771, 'https://cookpad.com/search/牛丼'),
(9, '筑前煮', 0, 211, 'https://cookpad.com/search/筑前煮'),
(10, '筑前煮', 0, 211, 'https://cookpad.com/search/筑前煮'),
(11, 'アジの塩焼き', 0, 82, 'https://cookpad.com/search/アジの塩焼き'),
(12, 'ハンバーグ', 1, 268, 'https://cookpad.com/search/ハンバーグ'),
(13, 'ステーキ', 1, 355, 'https://cookpad.com/search/ステーキ'),
(14, 'オムライス', 1, 850, 'https://cookpad.com/search/オムライス'),
(15, 'カレーライス', 1, 859, 'https://cookpad.com/search/カレーライス'),
(16, 'マカロニグラタン', 1, 488, 'https://cookpad.com/search/マカロニグラタン'),
(17, 'ビーフシチュー', 1, 594, 'https://cookpad.com/search/ビーフシチュー'),
(18, 'ナポリタン', 1, 590, 'https://cookpad.com/search/ナポリタン'),
(19, 'ロールキャベツ', 1, 333, 'https://cookpad.com/search/ロールキャベツ'),
(20, 'チャーハン', 2, 708, 'https://cookpad.com/search/チャーハン'),
(21, '麻婆豆腐', 2, 341, 'https://cookpad.com/search/麻婆豆腐'),
(22, '酢豚', 2, 242, 'https://cookpad.com/search/酢豚'),
(23, '油淋鶏', 2, 965, 'https://cookpad.com/search/油淋鶏'),
(24, '八宝菜', 2, 353, 'https://cookpad.com/search/八宝菜'),
(25, '醤油ラーメン', 2, 470, 'https://cookpad.com/search/醤油ラーメン'),
(26, 'チンジャオロース', 2, 318, 'https://cookpad.com/search/チンジャオロース'),
(27, 'ホイコーロー', 2, 249, 'https://cookpad.com/search/ホイコーロー'),
(28, 'エビチリ', 2, 212, 'https://cookpad.com/search/エビチリ'),
(29, '焼きそば', 2, 469, 'https://cookpad.com/search/焼きそば');

-- --------------------------------------------------------

--
-- テーブルの構造 `sub`
--

CREATE TABLE `sub` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `kcal` int(11) NOT NULL,
  `recipe` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `sub`
--

INSERT INTO `sub` (`id`, `name`, `category`, `kcal`, `recipe`) VALUES
(1, '小松菜のおひたし', 0, 17, 'https://cookpad.com/search/小松菜のおひたし'),
(2, '里芋の煮物 ', 0, 83, 'https://cookpad.com/search/里芋の煮物'),
(3, '卵焼き', 0, 145, 'https://cookpad.com/search/卵焼き'),
(4, '茶碗蒸し', 0, 142, 'https://cookpad.com/search/茶碗蒸し'),
(5, 'ほうれん草の胡麻和え', 0, 61, 'https://cookpad.com/search/ほうれん草の胡麻和え'),
(7, 'ひじきの煮物', 0, 135, 'https://cookpad.com/search/ひじきの煮物'),
(8, '豆腐とわかめの味噌汁', 0, 56, 'https://cookpad.com/search/豆腐とわかめの味噌汁'),
(9, '揚げ出し豆腐', 0, 61, 'https://cookpad.com/search/揚げ出し豆腐'),
(10, 'ポテトサラダ', 1, 113, 'https://cookpad.com/search/ポテトサラダ'),
(11, 'ミネストローネ', 1, 67, 'https://cookpad.com/search/ミネストローネ'),
(12, '野菜サラダ', 1, 10, 'https://cookpad.com/search/野菜サラダ'),
(13, '餃子', 2, 236, 'https://cookpad.com/search/餃子'),
(14, '春巻き', 2, 292, 'https://cookpad.com/search/春巻き'),
(15, 'トマトと卵の炒め物', 2, 155, 'https://cookpad.com/search/トマトと卵の炒め物'),
(16, '中華スープ', 2, 54, 'https://cookpad.com/search/中華スープ'),
(17, 'もやしサラダ', 2, 104, 'https://cookpad.com/search/もやしサラダ'),
(18, '春雨サラダ', 2, 132, 'https://cookpad.com/search/春雨サラダ'),
(19, '水餃子', 2, 196, 'https://cookpad.com/search/水餃子');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `name`, `is_deleted`, `create_date_time`, `update_date_time`) VALUES
(6, 'sample@gmail.com', '$2y$10$hy6gE8fmFa7bgQ.XIj4DO.1nrymrRdVdwsmvd0y1mVEBkAURJ08PC', 'sample', 0, '2024-07-08 21:04:02', '2024-07-08 21:04:02');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `eat_history`
--
ALTER TABLE `eat_history`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `eat_history`
--
ALTER TABLE `eat_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- テーブルの AUTO_INCREMENT `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- テーブルの AUTO_INCREMENT `sub`
--
ALTER TABLE `sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
