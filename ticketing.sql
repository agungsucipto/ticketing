-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2023 pada 16.44
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1702136532);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/default/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/default/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/menu/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/menu/create', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/menu/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/menu/update', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/menu/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/create', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/get-users', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/update', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/permission/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/assign', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/create', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/delete', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/get-users', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/remove', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/update', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/role/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/route/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/route/assign', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/route/create', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/route/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/route/remove', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/rule/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/rule/create', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/rule/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/rule/update', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/rule/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/activate', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/delete', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/login', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/logout', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/signup', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/admin/user/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/default/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/default/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/default/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/user/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/gii/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/gii/default/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/gii/default/action', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/gii/default/diff', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/gii/default/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/gii/default/preview', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/gii/default/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/site/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/site/captcha', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/site/error', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/site/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/site/login', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/site/logout', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/tickets/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/tickets/create', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/tickets/delete', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/tickets/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/tickets/update', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/tickets/view', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/v1/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/v1/auth/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/v1/auth/login', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/v1/ticket/*', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('/v1/ticket/index', 2, NULL, NULL, NULL, 1702136515, 1702136515),
('Admin', 1, NULL, NULL, NULL, 1702136523, 1702136523);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', '/*');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1702136394),
('m140506_102106_rbac_init', 1702136396),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1702136396),
('m180523_151638_rbac_updates_indexes_without_prefix', 1702136396),
('m200409_110543_rbac_update_mssql_trigger', 1702136397),
('m231208_081539_table_user', 1702136422),
('m231208_140238_init_user_accounts', 1702136423),
('m231209_100754_table_tickets', 1702136423),
('m231209_101148_table_ticket_files', 1702136423);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket_no` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_no`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'TC1702136634', 'Error File', '2023-12-09 16:43:54', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_files`
--

CREATE TABLE `ticket_files` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ticket_files`
--

INSERT INTO `ticket_files` (`id`, `ticket_id`, `file`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Screenshot_11.png', '2023-12-09 16:43:55', NULL, 1, NULL),
(2, 1, 'Screenshot_10.png', '2023-12-09 16:43:55', NULL, 1, NULL),
(3, 1, 'Screenshot_9.png', '2023-12-09 16:43:55', NULL, 1, NULL),
(4, 1, 'Screenshot_8.png', '2023-12-09 16:43:55', NULL, 1, NULL),
(5, 1, 'Screenshot_7.png', '2023-12-09 16:43:55', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '$2y$13$80XBadKN7duIcuo095MTvO.XFV/gaCF0/L4j4QQa2ytjzbIvv092.', NULL, 'admin@example.com', 10, 2023, 2023);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indeks untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indeks untuk tabel `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_files-ticket_id` (`ticket_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ticket_files`
--
ALTER TABLE `ticket_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ticket_files`
--
ALTER TABLE `ticket_files`
  ADD CONSTRAINT `fk_ticket_files-ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
