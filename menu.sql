-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-10-23 18:51:49
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.0.19

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
CREATE DATABASE IF NOT EXISTS `menu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `menu`;

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
(225, 6, 1, 7, 438, 0, '2024-07-08', '2024-07-08 21:04:22', '2024-07-08 21:04:22', 1),
(226, 6, 19, 12, 343, 1, '2024-10-24', '2024-10-24 00:11:38', '2024-10-24 00:11:38', 0),
(227, 6, 5, 2, 250, 0, '2024-10-31', '2024-10-24 00:11:56', '2024-10-24 00:11:56', 0);

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
(6, 'sample@sample.com', '$2y$10$unNHu8gHbjiHw6hd8ijgm.5j3KlHgO8CvKPfFgr/ly0jM9c2e82Ya', 'sample', 0, '2024-07-08 21:04:02', '2024-07-08 21:04:02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

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
--
-- データベース: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- テーブルのデータのダンプ `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"menu\",\"table\":\"sub\"},{\"db\":\"menu\",\"table\":\"eat_history\"},{\"db\":\"menu\",\"table\":\"main\"},{\"db\":\"menu\",\"table\":\"users\"},{\"db\":\"shop\",\"table\":\"mst_product\"},{\"db\":\"shop\",\"table\":\"mst_staff\"},{\"db\":\"todo\",\"table\":\"todo_items\"},{\"db\":\"todo\",\"table\":\"users\"},{\"db\":\"shop\",\"table\":\"users\"},{\"db\":\"shop\",\"table\":\"todo_items\"}]');

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- テーブルのデータのダンプ `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'php_work', 'todo_items', '{\"sorted_col\":\"`todo_items`.`expiration_date` DESC\"}', '2022-10-17 05:22:32'),
('root', 'shop', 'mst_staff', '{\"sorted_col\":\"`mst_staff`.`code` ASC\"}', '2022-07-24 09:46:36'),
('root', 'todo', 'users', '{\"sorted_col\":\"`users`.`first_name` ASC\"}', '2022-11-14 04:57:15');

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- テーブルのデータのダンプ `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-12-21 15:43:06', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"ja\"}');

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- テーブルの構造 `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- テーブルのインデックス `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- テーブルのインデックス `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- テーブルのインデックス `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- テーブルのインデックス `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- テーブルのインデックス `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- テーブルのインデックス `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- テーブルのインデックス `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- テーブルのインデックス `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- テーブルのインデックス `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- テーブルのインデックス `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- テーブルのインデックス `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- テーブルのインデックス `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- テーブルのインデックス `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- テーブルのインデックス `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- テーブルのインデックス `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- テーブルのインデックス `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- テーブルのインデックス `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- データベース: `php_work`
--
CREATE DATABASE IF NOT EXISTS `php_work` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `php_work`;

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_items`
--

CREATE TABLE `todo_items` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `expiration_date` date DEFAULT NULL COMMENT '期限日',
  `todo_item` varchar(100) DEFAULT NULL COMMENT 'TODO 項目',
  `is_completed` tinyint(4) DEFAULT 0 COMMENT '完了'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `todo_items`
--

INSERT INTO `todo_items` (`id`, `expiration_date`, `todo_item`, `is_completed`) VALUES
(6, '2022-10-10', '買い物', 0),
(9, '2022-10-24', 'プログラミング', 1),
(10, '2022-10-24', 'ドライブ', 0),
(14, '2022-10-24', '遊ぶ', 1),
(31, '2022-10-24', '買い物', 1),
(35, '2022-11-14', 'a', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`) VALUES
(2, 'a', '$2y$10$WczVeY5ZkCtTI586aTw32ez9MGtqV.2PoxXwxx36BPTlxVb4tCQ3O', 'a'),
(3, 'k', '$2y$10$CrCwL/kLFfNc/TsTeAz8ROHGswytP6D1KcCONohodw7AabQt3cuEG', 'a'),
(4, 'k@gmail.com', '$2y$10$ZdGcAPvdxrf4fc.lJjkFiuh8CicganIHNh9V/1ppOQFvsSohoezSu', 'a'),
(5, 'kaaaa', '$2y$10$sMDkkvyGakMqxBDFIKhe6uVLq6iVm2ETnu1WFg.POyUsHSEGJnLE6', 'a'),
(6, 'aa', '$2y$10$gO73hMlrUCM5s7jJTocgv.veOH./lc7KNW.jhbfnWTu8UFLJXfwFq', 'aa'),
(7, 'aaa', '$2y$10$B8nyqoTPr0FpBNqWQ2pFReMY3eLCf92SF5nqpXCwsXdsGdKF.Vxu2', 'aaa'),
(9, 'k_uga@miraino-katachih2.co.jp', '$2y$10$t5iKZxlV0FdxQnNusEvXDeTCjhToHEfulVSsiXCusWUk/Kt3cQpj2', '宇賀');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `todo_items`
--
ALTER TABLE `todo_items`
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
-- テーブルの AUTO_INCREMENT `todo_items`
--
ALTER TABLE `todo_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=36;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- データベース: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_product`
--

CREATE TABLE `mst_product` (
  `code` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `gazou` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_product`
--

INSERT INTO `mst_product` (`code`, `name`, `price`, `gazou`) VALUES
(1, 'にんじん 3本', 180, 'ダウンロード.jfif'),
(2, 'たまねぎ', 200, 'img_vegetable_Onions01.jpg'),
(3, '野菜盛り合わせ', 800, 'ダウンロード.jfif');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_staff`
--

CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(1, 'ろくまる', '767179c7a2bff19651ce97d294c30cfb'),
(2, 'K', 'd7b7a94d79ba9f7df33860efa5319db4'),
(35, '宇賀万喜', 'd7b7a94d79ba9f7df33860efa5319db4'),
(37, 'goku', '093f65e080a295f8076b1c5722a46aa2'),
(38, 'mame', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`code`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `mst_product`
--
ALTER TABLE `mst_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- データベース: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- データベース: `todo`
--
CREATE DATABASE IF NOT EXISTS `todo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `todo`;

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_items`
--

CREATE TABLE `todo_items` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザーID\r\n',
  `item_name` varchar(100) DEFAULT NULL COMMENT '項目名',
  `registration_date` date DEFAULT NULL COMMENT '登録日',
  `expire_date` date DEFAULT NULL COMMENT '期限日',
  `finished_date` date DEFAULT NULL COMMENT '完了日\r\nNULLのとき、未完了とする。',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '削除フラグ\r\n0:未削除\r\n1:削除済み',
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時\r\nレコードの登録日時',
  `update_date_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '更新日時\r\nレコードの更新日時 on update CURRENT_TIMESTAMP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `todo_items`
--

INSERT INTO `todo_items` (`id`, `user_id`, `item_name`, `registration_date`, `expire_date`, `finished_date`, `is_deleted`, `create_date_time`, `update_date_time`) VALUES
(1, 1, 'サン', '2022-11-18', '2022-11-15', '2022-11-18', 1, '2022-11-18 20:40:38', '2022-11-18 20:40:38'),
(2, 1, '散歩', '2022-11-18', '2022-11-28', NULL, 0, '2022-11-18 20:40:49', '2022-11-18 20:40:49'),
(3, 1, 'サ', '2022-11-18', '2022-11-15', NULL, 1, '2022-11-18 20:41:07', '2022-11-18 20:41:07'),
(4, 1, '映画', '2022-11-18', '2022-11-19', '2022-11-21', 0, '2022-11-18 20:56:06', '2022-11-18 20:56:06'),
(5, 1, 's', '2022-11-18', '2022-11-18', '2022-11-18', 1, '2022-11-18 20:56:15', '2022-11-18 20:56:15'),
(6, 3, 'テス', '2022-11-18', '2022-11-17', NULL, 0, '2022-11-18 21:02:27', '2022-11-18 21:02:27'),
(7, 1, 'テスト', '2022-11-18', '2022-11-21', '2022-11-21', 0, '2022-11-18 21:16:06', '2022-11-18 21:16:06'),
(8, 3, '(仮)', '2022-11-18', '2022-11-23', NULL, 0, '2022-11-19 00:15:25', '2022-11-19 00:15:25'),
(9, 2, '散歩', '2022-11-21', '2022-11-22', NULL, 0, '2022-11-21 13:59:11', '2022-11-21 13:59:11'),
(10, 1, '買い物', '2022-11-21', '2022-11-21', NULL, 0, '2022-11-21 14:12:18', '2022-11-21 14:12:18');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user` varchar(50) NOT NULL COMMENT 'ログインユーザー名\r\nプログラム側で一意であるように制御します。',
  `pass` varchar(255) NOT NULL COMMENT 'ログインパスワード\r\npassword_hash()関数を使って暗号化します。\r\nパスワードの整合性はpassword_verify()関数を使います。',
  `family_name` varchar(50) NOT NULL COMMENT 'ユーザー姓',
  `first_name` varchar(50) NOT NULL COMMENT 'ユーザー名',
  `is_admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '管理者権限\r\n0:管理者権限なし\r\n1:管理者権限あり',
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '削除フラグ\r\n0:未削除\r\n1:削除済み',
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '登録日時\r\nレコードの登録日時',
  `update_date_time` datetime NOT NULL DEFAULT current_timestamp() COMMENT '更新日時\r\nレコードの更新日時 on update CURRENT_TIMESTAMP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `family_name`, `first_name`, `is_admin`, `is_deleted`, `create_date_time`, `update_date_time`) VALUES
(1, 'katachi1', '$2y$10$8G4XkhIWxTBm3OBgLxg4ZuYSR8A/GHroUHR57PZGyyaq.gyz3jf9W', '宇賀', '万喜', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'test1', '$2y$10$eSePpwz2hteTQZNXO1BvFeI.VCSGF/YqGdpZda/sHQDQWzAJoehYi', 'テスト', '花子', 0, 0, '2022-11-14 11:01:06', '2022-11-14 11:01:06'),
(3, 'test2', '$2y$10$btIzYtozzeEJ2J53ZU/Qz.YBK61RilXtGcVJkrZfz1r/fS8R72F.i', 'テスト', '太郎', 0, 0, '2022-11-14 11:01:06', '2022-11-14 11:01:06');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `todo_items`
--
ALTER TABLE `todo_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_todo_items_user_id` (`user_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `todo_items`
--
ALTER TABLE `todo_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;
--
-- データベース: `work`
--
CREATE DATABASE IF NOT EXISTS `work` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `work`;

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(50) NOT NULL COMMENT '名前',
  `email` varchar(255) NOT NULL COMMENT 'メールアドレス'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ユーザーテーブル';

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(1, '宇賀', 'ugauga@example.com'),
(2, 'しろ', 'shiro@example.com'),
(3, 'ドラえもん', 'doraemon@example.com');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
