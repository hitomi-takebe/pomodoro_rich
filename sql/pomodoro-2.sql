-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2025 年 1 月 12 日 07:19
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `pomodoro`
--

CREATE TABLE `pomodoro` (
  `id` int(12) NOT NULL,
  `todo` text NOT NULL,
  `ref` text NOT NULL,
  `next` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `pomodoro`
--

INSERT INTO `pomodoro` (`id`, `todo`, `ref`, `next`, `date`) VALUES
(9, 'あ', 'あああ', 'う', '2025-01-02 13:58:58'),
(13, 'あ', 'uu', 'eee', '2025-01-02 13:59:38'),
(25, 's', 'sss', 'ssss', '2025-01-02 13:16:23'),
(30, '', '', '', '2025-01-02 14:00:50'),
(31, '', '', '', '2025-01-02 14:00:53'),
(32, 'っw', 'ああ', 'あああ', '2025-01-02 14:01:08');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `pomodoro`
--
ALTER TABLE `pomodoro`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `pomodoro`
--
ALTER TABLE `pomodoro`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
