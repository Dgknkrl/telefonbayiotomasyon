-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 May 2024, 18:30:26
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `telefon_otomasyon`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bayi`
--

CREATE TABLE `bayi` (
  `bayi_id` int(11) NOT NULL,
  `ilce` varchar(50) DEFAULT NULL,
  `depo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `bayi`
--

INSERT INTO `bayi` (`bayi_id`, `ilce`, `depo_id`) VALUES
(1, 'izmit', 1),
(2, 'gebze', 1),
(3, 'kadıköy', 2),
(4, 'üsküdar', 2),
(5, 'ardeşen', 3),
(6, 'merkez', 3),
(7, 'aybastı', 4),
(8, 'fatsa', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bayi_stok`
--

CREATE TABLE `bayi_stok` (
  `bayi_id` int(11) DEFAULT NULL,
  `telefon_id` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `bayi_stok`
--

INSERT INTO `bayi_stok` (`bayi_id`, `telefon_id`, `stok`) VALUES
(1, 5, 12),
(1, 8, 5),
(1, 15, 18),
(1, 20, 3),
(1, 25, 7),
(1, 2, 9),
(1, 10, 14),
(1, 18, 2),
(1, 22, 6),
(1, 30, 11),
(2, 1, 17),
(2, 7, 8),
(2, 13, 4),
(2, 21, 19),
(2, 27, 1),
(2, 3, 10),
(2, 9, 16),
(2, 16, 13),
(2, 23, 20),
(2, 29, 1),
(3, 4, 15),
(3, 11, 7),
(3, 17, 5),
(3, 24, 9),
(3, 31, 2),
(3, 6, 8),
(3, 14, 11),
(3, 19, 1),
(3, 26, 14),
(3, 35, 6),
(4, 12, 3),
(4, 20, 17),
(4, 28, 12),
(4, 33, 4),
(4, 39, 10),
(4, 9, 19),
(4, 16, 6),
(4, 24, 15),
(4, 30, 2),
(4, 38, 8),
(5, 5, 13),
(5, 11, 7),
(5, 18, 4),
(5, 26, 18),
(5, 34, 1),
(5, 3, 10),
(5, 10, 16),
(5, 17, 12),
(5, 25, 20),
(5, 32, 0),
(6, 6, 8),
(6, 14, 11),
(6, 19, 1),
(6, 26, 14),
(6, 35, 6),
(6, 4, 15),
(6, 11, 7),
(6, 17, 5),
(6, 24, 9),
(6, 31, 2),
(7, 12, 3),
(7, 20, 17),
(7, 28, 12),
(7, 33, 4),
(7, 39, 10),
(7, 9, 19),
(7, 16, 6),
(7, 24, 15),
(7, 30, 2),
(7, 38, 8),
(8, 5, 13),
(8, 11, 7),
(8, 18, 4),
(8, 26, 18),
(8, 34, 1),
(8, 3, 10),
(8, 10, 16),
(8, 17, 12),
(8, 25, 20),
(8, 32, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `depo`
--

CREATE TABLE `depo` (
  `depo_id` int(11) NOT NULL,
  `sehir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `depo`
--

INSERT INTO `depo` (`depo_id`, `sehir`) VALUES
(1, 'kocaeli'),
(2, 'istanbul'),
(3, 'rize'),
(4, 'ordu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `depo_stok`
--

CREATE TABLE `depo_stok` (
  `depo_id` int(11) DEFAULT NULL,
  `telefon_id` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `depo_stok`
--

INSERT INTO `depo_stok` (`depo_id`, `telefon_id`, `stok`) VALUES
(1, 1, 123),
(1, 2, 156),
(1, 3, 189),
(1, 4, 135),
(1, 5, 146),
(1, 6, 187),
(1, 7, 121),
(1, 8, 154),
(1, 9, 179),
(1, 10, 153),
(1, 11, 151),
(1, 12, 152),
(1, 13, 141),
(1, 14, 169),
(1, 15, 158),
(1, 16, 154),
(1, 17, 187),
(1, 18, 123),
(1, 19, 156),
(1, 20, 189),
(1, 21, 135),
(1, 22, 146),
(1, 23, 187),
(1, 24, 121),
(1, 25, 154),
(1, 26, 179),
(1, 27, 153),
(1, 28, 151),
(1, 29, 152),
(1, 30, 141),
(1, 31, 169),
(1, 32, 158),
(1, 33, 154),
(1, 34, 187),
(1, 35, 123),
(1, 36, 156),
(1, 37, 189),
(1, 38, 135),
(1, 39, 146),
(2, 1, 123),
(2, 2, 135),
(2, 3, 187),
(2, 4, 158),
(2, 5, 169),
(2, 6, 156),
(2, 7, 154),
(2, 8, 141),
(2, 9, 153),
(2, 10, 189),
(2, 11, 152),
(2, 12, 179),
(2, 13, 151),
(2, 14, 187),
(2, 15, 123),
(2, 16, 135),
(2, 17, 187),
(2, 18, 158),
(2, 19, 169),
(2, 20, 156),
(2, 21, 154),
(2, 22, 141),
(2, 23, 153),
(2, 24, 189),
(2, 25, 152),
(2, 26, 179),
(2, 27, 151),
(2, 28, 187),
(2, 29, 123),
(2, 30, 135),
(2, 31, 187),
(2, 32, 158),
(2, 33, 169),
(2, 34, 156),
(2, 35, 154),
(2, 36, 141),
(2, 37, 153),
(2, 38, 189),
(2, 39, 152),
(3, 1, 113),
(3, 2, 135),
(3, 3, 187),
(3, 4, 158),
(3, 5, 169),
(3, 6, 156),
(3, 7, 154),
(3, 8, 141),
(3, 9, 153),
(3, 10, 189),
(3, 11, 152),
(3, 12, 179),
(3, 13, 151),
(3, 14, 187),
(3, 15, 123),
(3, 16, 135),
(3, 17, 187),
(3, 18, 158),
(3, 19, 169),
(3, 20, 156),
(3, 21, 154),
(3, 22, 141),
(3, 23, 153),
(3, 24, 189),
(3, 25, 152),
(3, 26, 179),
(3, 27, 151),
(3, 28, 187),
(3, 29, 123),
(3, 30, 135),
(3, 31, 187),
(3, 32, 158),
(3, 33, 369),
(3, 34, 156),
(3, 35, 154),
(3, 36, 141),
(3, 37, 153),
(3, 38, 189),
(3, 39, 152),
(4, 1, 113),
(4, 2, 115),
(4, 3, 187),
(4, 4, 158),
(4, 5, 169),
(4, 6, 156),
(4, 7, 154),
(4, 8, 141),
(4, 9, 153),
(4, 10, 189),
(4, 11, 152),
(4, 12, 179),
(4, 13, 151),
(4, 14, 187),
(4, 15, 123),
(4, 16, 135),
(4, 17, 187),
(4, 18, 158),
(4, 19, 169),
(4, 20, 156),
(4, 21, 154),
(4, 22, 141),
(4, 23, 153),
(4, 24, 189),
(4, 25, 152),
(4, 26, 179),
(4, 27, 151),
(4, 28, 187),
(4, 29, 123),
(4, 30, 135),
(4, 31, 187),
(4, 32, 158),
(4, 33, 169),
(4, 34, 156),
(4, 35, 154),
(4, 36, 141),
(4, 37, 153),
(4, 38, 189),
(4, 39, 152),
(4, 40, 187);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `musteri_id` int(11) NOT NULL,
  `hesap_tipi` varchar(50) DEFAULT NULL,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sifre` varchar(150) DEFAULT NULL,
  `dogum_gunu` date DEFAULT NULL,
  `adres` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`musteri_id`, `hesap_tipi`, `ad`, `soyad`, `email`, `sifre`, `dogum_gunu`, `adres`) VALUES
(1, 'müsteri', 'ismail', 'aydın', 'ismailaydin52002@gmail.com', '123456789', '1212-12-12', 'Cumhurbaşkanlığı Külliyesi'),
(2, 'bayi', 'asd', 'asd', 'ohyes3131@gmail.com', '123', '2002-05-07', 'koaskdkaokdad'),
(3, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', '0000-00-00', 'admin'),
(4, 'bayi', 'izmit', '', 'izmit@gmail.com', 'izmit41', '0000-00-00', 'kocaeli/izmit'),
(5, 'bayi', 'gebze', '', 'gebze@gmail.com', 'gebze41', '0000-00-00', 'kocaeli/gebze'),
(6, 'bayi', 'kadıköy', '', 'kadikoy@gmail.com', 'kadıköy34', '0000-00-00', 'istanbul/kadıköy'),
(7, 'bayi', 'üsküdar', '', 'uskudar@gmail.com', 'üsküdar34', '0000-00-00', 'istanbul/üsküdar'),
(8, 'bayi', 'ardeşen', '', 'ardesen@gmail.com', 'ardeşen53', '0000-00-00', 'rize/ardeşen'),
(9, 'bayi', 'merkez', '', 'merkez@gmail.com', 'merkez53', '0000-00-00', 'rize/merkez'),
(10, 'bayi', 'aybastı', '', 'aybasti@gmail.com', 'aybastı52', '0000-00-00', 'ordu/aybastı'),
(11, 'bayi', 'fatsa', '', 'fatsa@gmail.com', 'fatsa52', '0000-00-00', 'ordu/fatsa'),
(12, 'müsteri', 'adem', 'güler', 'ademguler@gmail.com', 'adem52', '0000-00-00', 'ordu/aybastı'),
(13, 'müsteri', 'kürşat', 'alacalar', 'kursatalacalar@gmail.com', 'kürşat52', '0000-00-00', 'ordu/aybastı'),
(14, 'müsteri', 'doğukan', 'gün', 'dogukangun@gmail.com', 'doğukan52', '0000-00-00', 'ordu/aybastı'),
(15, 'müsteri', 'semih', 'çelik', 'semihcelik@gmail.com', 'semih52', '0000-00-00', 'ordu/aybastı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozellik`
--

CREATE TABLE `ozellik` (
  `id` int(11) DEFAULT NULL,
  `ram` varchar(20) DEFAULT NULL,
  `hafiza` varchar(20) DEFAULT NULL,
  `islemci` varchar(40) DEFAULT NULL,
  `kamera` varchar(20) DEFAULT NULL,
  `ekran_boyutu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ozellik`
--

INSERT INTO `ozellik` (`id`, `ram`, `hafiza`, `islemci`, `kamera`, `ekran_boyutu`) VALUES
(1, '12GB', '256GB', 'Snapdragon 8 Gen 3', '200MP', 6.8),
(2, '12GB', '256GB', 'Exynos 2400', '50MP', 6.7),
(3, '8GB', '256GB', 'Exynos 2400', '50MP', 6.2),
(4, '12GB', '512GB', 'Snapdrogon 8 Gen 2', '200MP', 6.8),
(5, '8GB', '256GB', 'Snapdrogon 8 Gen 2', '50MP', 6.6),
(6, '8GB', '256GB', 'Exynos 2200', '50MP', 6.4),
(7, '8GB', '256GB', 'Snapdrogon 8 Gen 2', '50MP', 6.1),
(8, '8GB', '512GB', 'Snapdrogon 8 Gen 2', '12MP', 6.7),
(9, '12GB', '512GB', 'Snapdrogon 8 Gen 2', '50MP', 6.2),
(10, '8GB', '128GB', 'Exynos 1480', '50MP', 6.6),
(11, '8GB', '1TB', 'A17 Pro', '48MP', 6.7),
(12, '8GB', '1TB', 'A17 Pro', '48MP', 6.1),
(13, '6GB', '512GB', 'A16 Bionic', '48MP', 6.7),
(14, '6GB', '512Gb', 'A16 Bionic', '48MP', 6.1),
(15, '6GB', '1TB', 'A16 Bionic', '48MP', 6.7),
(16, '6GB', '1TB', 'A16 Bionic', '48MP', 6.1),
(17, '6GB', '128GB', 'A15 Bionic', '12MP', 6.7),
(18, '6GB', '128GB', 'A15 Bionic', '12MP', 6.1),
(19, '4GB', '128GB', 'A15 Bionic', '12MP', 6.1),
(20, '4GB', '128GB', 'A15 Bionic', '12MP', 4.7),
(21, '12GB', '512GB', 'Snapdrogon 8+ Gen 1', '48', 6.67),
(22, '12GB', '512GB', 'Snapdrogon 8+ Gen 1', '50', 6.4),
(23, '8GB', '512GB', 'Snapdrogon 8+ Gen 1', '50', 6.74),
(24, '8GB', '256GB', 'Snapdragon 888', '50MP', 6.6),
(25, '8GB', '256GB', 'Snapdragon 778G', '50MP', 6.78),
(26, '8GB', '256GB', 'Snapdragon 778G', '50MP', 6.7),
(27, '8GB', '256GB', 'Kirin 9000', '50MP', 6.76),
(28, '8GB', '256GB', 'Kirin 990', '50MP', 6.58),
(29, '16GB', '512GB', 'Snapdragon 8 Gen 3', '50MP', 6.73),
(30, '12GB', '512GB', 'Snapdragon 8 Gen 3', '50MP', 6.36),
(31, '12GB', '512GB', 'Mediatek Dimensity 9200+', '50MP', 6.67),
(32, '12GB', '256GB', 'Snapdragon 8 Gen 2', '50MP', 6.36),
(33, '12GB', '256GB', 'Snapdragon 8 Gen 1', '50MP', 6.73),
(34, '12GB', '256GB', 'Mediatek Dimensity 8200', '50MP', 6.67),
(35, '12GB', '256GB', 'Mediatek Dimensity 7200', '200MP', 6.67),
(36, '12GB', '512GB', 'Snapdragon 7S Gen 2', '200MP', 6.67),
(37, '8GB', '256GB', 'Mediatek Dimensity 1080', '50MP', 6.67),
(38, '12GB', '512GB', 'Snapdragon 8+ Gen 1', '64MP', 6.67),
(39, '12GB', '256GB', 'Snapdragon 7S Gen 2', '64MP', 6.67),
(40, '12GB', '256GB', 'Snapdragon 7+ Gen 2', '64MP', 6.67);

--
-- Tetikleyiciler `ozellik`
--
DELIMITER $$
CREATE TRIGGER `sil_ozellik_telefon` AFTER DELETE ON `ozellik` FOR EACH ROW BEGIN
    -- Telefonun stok bilgilerini sil
    DELETE FROM depo_stok WHERE depo_stok.telefon_id = OLD.id;
    DELETE FROM bayi_stok WHERE bayi_stok.telefon_id = OLD.id;
    
    -- Telefonun resimlerini sil
    DELETE FROM resimler WHERE resimler.id = OLD.id;
    
    -- Telefon tablosundan ilgili satırı sil
    DELETE FROM telefon WHERE telefon.telefon_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

CREATE TABLE `resimler` (
  `id` int(11) NOT NULL,
  `resim1` varchar(255) DEFAULT NULL,
  `resim2` varchar(255) DEFAULT NULL,
  `resim3` varchar(255) DEFAULT NULL,
  `resim4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`id`, `resim1`, `resim2`, `resim3`, `resim4`) VALUES
(1, 'https://resim.epey.com/920039/b_samsung-galaxy-s24-ultra-1tb-1.jpg', 'https://resim.epey.com/920039/b_samsung-galaxy-s24-ultra-1tb-2.jpg', 'https://resim.epey.com/920039/b_samsung-galaxy-s24-ultra-1tb-3.jpg', 'https://resim.epey.com/920039/b_samsung-galaxy-s24-ultra-1tb-4.jpg'),
(2, 'https://resim.epey.com/899623/b_samsung-galaxy-s24-plus-1.jpg', 'https://resim.epey.com/899623/b_samsung-galaxy-s24-plus-2.jpg', 'https://resim.epey.com/899623/b_samsung-galaxy-s24-plus-3.jpg', 'https://resim.epey.com/899623/b_samsung-galaxy-s24-plus-4.jpg'),
(3, 'https://resim.epey.com/920040/b_samsung-galaxy-s24-256gb-1.jpg', 'https://resim.epey.com/920040/b_samsung-galaxy-s24-256gb-2.jpg', 'https://resim.epey.com/920040/b_samsung-galaxy-s24-256gb-3.jpg', 'https://resim.epey.com/920040/b_samsung-galaxy-s24-256gb-4.jpg'),
(4, 'https://resim.epey.com/849759/b_samsung-galaxy-s23-ultra-1tb-1.jpg', 'https://resim.epey.com/849759/b_samsung-galaxy-s23-ultra-1tb-2.jpg', 'https://resim.epey.com/849759/b_samsung-galaxy-s23-ultra-1tb-3.jpg', 'https://resim.epey.com/849759/b_samsung-galaxy-s23-ultra-1tb-4.jpg'),
(5, 'https://resim.epey.com/846314/b_samsung-galaxy-s23-plus-2.jpg\r\n', 'https://resim.epey.com/846314/b_samsung-galaxy-s23-plus-3.jpg\r\n', 'https://resim.epey.com/846314/b_samsung-galaxy-s23-plus-4.jpg\r\n', 'https://resim.epey.com/846314/b_samsung-galaxy-s23-plus-5.jpg\r\n'),
(6, 'https://resim.epey.com/899244/b_samsung-galaxy-s23-fe-256gb-12.jpg', 'https://resim.epey.com/899244/b_samsung-galaxy-s23-fe-256gb-13.jpg', 'https://resim.epey.com/899244/b_samsung-galaxy-s23-fe-256gb-14.jpg', 'https://resim.epey.com/899244/b_samsung-galaxy-s23-fe-256gb-15.jpg'),
(7, 'https://resim.epey.com/849760/b_samsung-galaxy-s23-256gb-2.png', 'https://resim.epey.com/849760/b_samsung-galaxy-s23-256gb-3.png', 'https://resim.epey.com/849760/b_samsung-galaxy-s23-256gb-4.png', 'https://resim.epey.com/849760/b_samsung-galaxy-s23-256gb-5.png'),
(8, 'https://resim.epey.com/884226/b_samsung-galaxy-z-flip5-256gb-18.jpg', 'https://resim.epey.com/884226/b_samsung-galaxy-z-flip5-256gb-19.jpg', 'https://resim.epey.com/884226/b_samsung-galaxy-z-flip5-256gb-20.jpg', 'https://resim.epey.com/884226/b_samsung-galaxy-z-flip5-256gb-21.jpg'),
(9, 'https://resim.epey.com/871836/b_samsung-galaxy-z-fold5-23.jpg', 'https://resim.epey.com/871836/b_samsung-galaxy-z-fold5-24.jpg', 'https://resim.epey.com/871836/b_samsung-galaxy-z-fold5-25.jpg', 'https://resim.epey.com/871836/b_samsung-galaxy-z-fold5-26.jpg'),
(10, 'https://resim.epey.com/917434/b_samsung-galaxy-a55-11.jpg', 'https://resim.epey.com/917434/b_samsung-galaxy-a55-12.jpg', 'https://resim.epey.com/917434/b_samsung-galaxy-a55-13.jpg', 'https://resim.epey.com/917434/b_samsung-galaxy-a55-14.jpg'),
(11, 'https://resim.epey.com/895854/b_apple-iphone-15-pro-max-1tb-8.jpg\r\n', 'https://resim.epey.com/895854/b_apple-iphone-15-pro-max-1tb-9.jpg\r\n', 'https://resim.epey.com/895854/b_apple-iphone-15-pro-max-1tb-10.jpg\r\n', 'https://resim.epey.com/895854/b_apple-iphone-15-pro-max-1tb-11.jpg\r\n'),
(12, 'https://resim.epey.com/895857/b_apple-iphone-15-pro-1tb-3.png', 'https://resim.epey.com/895857/b_apple-iphone-15-pro-1tb-4.png', 'https://resim.epey.com/895857/b_apple-iphone-15-pro-1tb-5.png', 'https://resim.epey.com/895857/b_apple-iphone-15-pro-1tb-6.png'),
(13, 'https://resim.epey.com/895862/b_apple-iphone-15-plus-512gb-2.png\r\n', 'https://resim.epey.com/895862/b_apple-iphone-15-plus-512gb-3.png\r\n', 'https://resim.epey.com/895862/b_apple-iphone-15-plus-512gb-4.png\r\n', 'https://resim.epey.com/895862/b_apple-iphone-15-plus-512gb-5.png\r\n'),
(14, 'https://resim.epey.com/895867/b_apple-iphone-15-512gb-1.png\r\n', 'https://resim.epey.com/895867/b_apple-iphone-15-512gb-2.png\r\n', 'https://resim.epey.com/895867/b_apple-iphone-15-512gb-3.png\r\n', 'https://resim.epey.com/895867/b_apple-iphone-15-512gb-4.png\r\n'),
(15, 'https://resim.epey.com/809152/b_apple-iphone-14-pro-max-1tb-2.png\r\n', 'https://resim.epey.com/809152/b_apple-iphone-14-pro-max-1tb-3.png\r\n', 'https://resim.epey.com/809152/b_apple-iphone-14-pro-max-1tb-4.png\r\n', 'https://resim.epey.com/809152/b_apple-iphone-14-pro-max-1tb-5.png\r\n'),
(16, 'https://resim.epey.com/809146/b_apple-iphone-14-pro-1tb-3.png\r\n', 'https://resim.epey.com/809146/b_apple-iphone-14-pro-1tb-4.png\r\n', 'https://resim.epey.com/809146/b_apple-iphone-14-pro-1tb-5.png\r\n', 'https://resim.epey.com/809146/b_apple-iphone-14-pro-1tb-6.png\r\n'),
(17, 'https://resim.epey.com/809161/b_apple-iphone-14-plus-512gb-1.png\r\n', 'https://resim.epey.com/809161/b_apple-iphone-14-plus-512gb-2.png\r\n', 'https://resim.epey.com/809161/b_apple-iphone-14-plus-512gb-3.png\r\n', 'https://resim.epey.com/809161/b_apple-iphone-14-plus-512gb-4.png\r\n'),
(18, 'https://resim.epey.com/802290/b_apple-iphone-14-3.png\r\n', 'https://resim.epey.com/802290/b_apple-iphone-14-4.png\r\n', 'https://resim.epey.com/802290/b_apple-iphone-14-5.png\r\n', 'https://resim.epey.com/802290/b_apple-iphone-14-6.png\r\n'),
(19, 'https://resim.epey.com/716503/b_apple-iphone-13-10.png\r\n', 'https://resim.epey.com/716503/b_apple-iphone-13-11.png\r\n', 'https://resim.epey.com/716503/b_apple-iphone-13-12.png\r\n', 'https://resim.epey.com/716503/b_apple-iphone-13-13.png\r\n'),
(20, 'https://resim.epey.com/758817/b_apple-iphone-se-2022-128gb-1.png', 'https://resim.epey.com/758817/b_apple-iphone-se-2022-128gb-2.png', 'https://resim.epey.com/758817/b_apple-iphone-se-2022-128gb-3.png', 'https://resim.epey.com/758817/b_apple-iphone-se-2022-128gb-4.png'),
(21, 'https://resim.epey.com/866532/b_huawei-p60-pro-512gb-19.png', 'https://resim.epey.com/866532/b_huawei-p60-pro-512gb-20.png', 'https://resim.epey.com/866532/b_huawei-p60-pro-512gb-21.png', 'https://resim.epey.com/866532/b_huawei-p60-pro-512gb-22.png'),
(22, 'https://resim.epey.com/858558/b_huawei-mate-x3-3.png', 'https://resim.epey.com/858558/b_huawei-mate-x3-4.png', 'https://resim.epey.com/858558/b_huawei-mate-x3-5.png', 'https://resim.epey.com/858558/b_huawei-mate-x3-6.png'),
(23, 'https://resim.epey.com/807154/b_huawei-mate-50-pro-2.png', 'https://resim.epey.com/807154/b_huawei-mate-50-pro-3.png', 'https://resim.epey.com/807154/b_huawei-mate-50-pro-4.png', 'https://resim.epey.com/807154/b_huawei-mate-50-pro-5.png'),
(24, 'https://resim.epey.com/709026/b_huawei-p50-pro-2.png\r\n', 'https://resim.epey.com/709026/b_huawei-p50-pro-3.png\r\n', 'https://resim.epey.com/709026/b_huawei-p50-pro-4.png\r\n', 'https://resim.epey.com/709026/b_huawei-p50-pro-5.png\r\n'),
(25, 'https://resim.epey.com/863026/b_huawei-nova-11-pro-10.png\r\n', 'https://resim.epey.com/863026/b_huawei-nova-11-pro-11.png\r\n', 'https://resim.epey.com/863026/b_huawei-nova-11-pro-12.png\r\n', 'https://resim.epey.com/863026/b_huawei-nova-11-pro-13.png\r\n'),
(26, 'https://resim.epey.com/863003/b_huawei-nova-11-20.png\r\n', 'https://resim.epey.com/863003/b_huawei-nova-11-21.png\r\n', 'https://resim.epey.com/863003/b_huawei-nova-11-22.png\r\n', 'https://resim.epey.com/863003/b_huawei-nova-11-23.png\r\n'),
(27, 'https://resim.epey.com/616059/b_huawei-mate-40-pro-9.png\r\n', 'https://resim.epey.com/616059/b_huawei-mate-40-pro-10.png\r\n', 'https://resim.epey.com/616059/b_huawei-mate-40-pro-11.png\r\n', 'https://resim.epey.com/616059/b_huawei-mate-40-pro-12.png\r\n'),
(28, 'https://resim.epey.com/413329/b_huawei-p40-pro-5.png\r\n', 'https://resim.epey.com/413329/b_huawei-p40-pro-6.png\r\n', 'https://resim.epey.com/413329/b_huawei-p40-pro-7.png\r\n', 'https://resim.epey.com/413329/b_huawei-p40-pro-8.png\r\n'),
(29, 'https://resim.epey.com/923849/b_xiaomi-14-ultra-6.png\r\n', 'https://resim.epey.com/923849/b_xiaomi-14-ultra-7.png\r\n', 'https://resim.epey.com/923849/b_xiaomi-14-ultra-8.png\r\n', 'https://resim.epey.com/923849/b_xiaomi-14-ultra-9.png\r\n'),
(30, 'https://resim.epey.com/902114/b_xiaomi-14-3.png\r\n', 'https://resim.epey.com/902114/b_xiaomi-14-4.png\r\n', 'https://resim.epey.com/902114/b_xiaomi-14-5.png\r\n', 'https://resim.epey.com/902114/b_xiaomi-14-6.png\r\n'),
(31, 'https://resim.epey.com/890830/b_xiaomi-13t-pro-5.png\r\n', 'https://resim.epey.com/890830/b_xiaomi-13t-pro-6.png\r\n', 'https://resim.epey.com/890830/b_xiaomi-13t-pro-7.png\r\n', 'https://resim.epey.com/890830/b_xiaomi-13t-pro-8.png\r\n'),
(32, 'https://resim.epey.com/839841/b_xiaomi-13-8.png\r\n', 'https://resim.epey.com/839841/b_xiaomi-13-9.png\r\n', 'https://resim.epey.com/839841/b_xiaomi-13-10.png\r\n', 'https://resim.epey.com/839841/b_xiaomi-13-11.png\r\n'),
(33, 'https://resim.epey.com/739539/b_xiaomi-12-pro-1.png\r\n', 'https://resim.epey.com/739539/b_xiaomi-12-pro-2.png\r\n', 'https://resim.epey.com/739539/b_xiaomi-12-pro-3.png\r\n', 'https://resim.epey.com/739539/b_xiaomi-12-pro-4.png\r\n'),
(34, 'https://resim.epey.com/892246/b_xiaomi-13t-1.png\r\n', 'https://resim.epey.com/892246/b_xiaomi-13t-2.png\r\n', 'https://resim.epey.com/892246/b_xiaomi-13t-3.png\r\n', 'https://resim.epey.com/892246/b_xiaomi-13t-4.png\r\n'),
(35, 'https://resim.epey.com/894903/b_redmi-note-13-pro-plus-6.png\r\n', 'https://resim.epey.com/894903/b_redmi-note-13-pro-plus-6.png\r\n', 'https://resim.epey.com/894903/b_redmi-note-13-pro-plus-6.png\r\n', 'https://resim.epey.com/894903/b_redmi-note-13-pro-plus-6.png\r\n'),
(36, 'https://resim.epey.com/894931/b_redmi-note-13-pro-1.png', 'https://resim.epey.com/894931/b_redmi-note-13-pro-2.png', 'https://resim.epey.com/894931/b_redmi-note-13-pro-3.png', 'https://resim.epey.com/894931/b_redmi-note-13-pro-4.png'),
(37, 'https://resim.epey.com/865747/b_redmi-note-12-pro-5g-256gb-13.png\r\n', 'https://resim.epey.com/865747/b_redmi-note-12-pro-5g-256gb-14.png\r\n', 'https://resim.epey.com/865747/b_redmi-note-12-pro-5g-256gb-15.png\r\n', 'https://resim.epey.com/865747/b_redmi-note-12-pro-5g-256gb-16.png\r\n'),
(38, 'https://resim.epey.com/873950/b_poco-f5-pro-512gb-1.png\r\n', 'https://resim.epey.com/873950/b_poco-f5-pro-512gb-2.png\r\n', 'https://resim.epey.com/873950/b_poco-f5-pro-512gb-3.png\r\n', 'https://resim.epey.com/873950/b_poco-f5-pro-512gb-4.png\r\n'),
(39, 'https://resim.epey.com/919029/b_poco-x6-pro-512gb-1.png\r\n', 'https://resim.epey.com/919029/b_poco-x6-pro-512gb-2.png\r\n', 'https://resim.epey.com/919029/b_poco-x6-pro-512gb-3.png\r\n', 'https://resim.epey.com/919029/b_poco-x6-pro-512gb-4.png\r\n'),
(40, 'https://resim.epey.com/846678/b_poco-f5-1.png', 'https://resim.epey.com/846678/b_poco-f5-2.png', 'https://resim.epey.com/846678/b_poco-f5-3.png', 'https://resim.epey.com/846678/b_poco-f5-4.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satilan_urun`
--

CREATE TABLE `satilan_urun` (
  `satis` int(11) NOT NULL,
  `bayi_id` int(11) DEFAULT NULL,
  `musteri_id` int(11) DEFAULT NULL,
  `telefon_id` int(11) DEFAULT NULL,
  `tarih` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `satilan_urun`
--

INSERT INTO `satilan_urun` (`satis`, `bayi_id`, `musteri_id`, `telefon_id`, `tarih`) VALUES
(1, 1, 1, 1, '2024-04-29 15:33:26'),
(2, 2, 12, 21, '2024-05-04 15:20:00'),
(3, 4, 15, 24, '2024-05-04 15:20:00'),
(4, 8, 12, 35, '2024-05-04 15:20:00'),
(5, 3, 13, 31, '2024-05-04 15:20:00'),
(6, 6, 14, 14, '2024-05-04 15:20:00'),
(7, 5, 15, 11, '2024-05-04 15:20:00'),
(8, 7, 12, 39, '2024-05-04 15:20:00'),
(9, 3, 13, 11, '2024-05-04 15:20:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `musteri_id` int(11) DEFAULT NULL,
  `tel_id` int(11) DEFAULT NULL,
  `adet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `telefon`
--

CREATE TABLE `telefon` (
  `telefon_id` int(11) NOT NULL,
  `marka` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `fiyat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `telefon`
--

INSERT INTO `telefon` (`telefon_id`, `marka`, `model`, `fiyat`) VALUES
(1, 'Samsung', 'Galaxy S24 Ultra', 64200),
(2, 'Samsung', 'Galaxy S24 Plus', 43000),
(3, 'Samsung', 'Galaxy S24', 36150),
(4, 'Samsung', 'Galaxy S23 Ultra', 52700),
(5, 'Samsung', 'Galaxy S23 Plus', 48500),
(6, 'Samsung', 'Galaxy S23 FE', 25000),
(7, 'Samsung', 'Galaxy S23', 32300),
(8, 'Samsung', 'Galaxy Z Flip 5', 43800),
(9, 'Samsung', 'Galaxy Z Fold 5', 53200),
(10, 'Samsung', 'Galaxy A55', 19500),
(11, 'Apple', 'iPhone 15 Pro Max', 90000),
(12, 'Apple', 'iPhone 15 Pro', 75500),
(13, 'Apple', 'iPhone 15 Plus', 66700),
(14, 'Apple', 'iPhone 15', 58500),
(15, 'Apple', 'iPhone 14 Pro Max', 80000),
(16, 'Apple', 'iPhone 14 Pro', 69100),
(17, 'Apple', 'iPhone 14 Plus', 58500),
(18, 'Apple', 'iPhone 14', 51500),
(19, 'Apple', 'iPhone 13', 37700),
(20, 'Apple', 'iPhone SE', 29000),
(21, 'Huawei', 'P60 Pro', 42000),
(22, 'Huawei', 'Mate X3', 77000),
(23, 'Huawei', 'Mate 50 Pro', 36400),
(24, 'Huawei', 'P50 Pro', 54000),
(25, 'Huawei', 'Nov 11 Pro', 28000),
(26, 'Huawei', 'Nova 11', 17800),
(27, 'Huawei', 'Mate 40 Pro', 46000),
(28, 'Huawei', 'P40 Pro', 30000),
(29, 'Xiaomi', '14 Ultra', 72000),
(30, 'Xiaomi', '14', 47000),
(31, 'Xiaomi', '13T Pro', 38000),
(32, 'Xiaomi', '13', 46300),
(33, 'Xiaomi', '12 Pro', 39000),
(34, 'Xiaomi', '13T', 28100),
(35, 'Xiaomi', 'Redmi Note 13 Pro+', 23000),
(36, 'Xiaomi', 'Redmi Note 13 Pro', 20000),
(37, 'Xiaomi', 'Redmi Note 12 Pro', 10600),
(38, 'Xiaomi', 'Poco F5 Pro', 27900),
(39, 'Xiaomi', 'Poco X6 Pro', 18900),
(40, 'Xiaomi', 'Poco F5 ', 17900);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `telefon_ozellikleri`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `telefon_ozellikleri` (
`telefon_id` int(11)
,`marka` varchar(50)
,`model` varchar(50)
,`fiyat` int(11)
,`ram` varchar(20)
,`hafiza` varchar(20)
,`islemci` varchar(40)
,`kamera` varchar(20)
,`ekran_boyutu` double
);

-- --------------------------------------------------------

--
-- Görünüm yapısı `telefon_ozellikleri`
--
DROP TABLE IF EXISTS `telefon_ozellikleri`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `telefon_ozellikleri`  AS SELECT `t`.`telefon_id` AS `telefon_id`, `t`.`marka` AS `marka`, `t`.`model` AS `model`, `t`.`fiyat` AS `fiyat`, `o`.`ram` AS `ram`, `o`.`hafiza` AS `hafiza`, `o`.`islemci` AS `islemci`, `o`.`kamera` AS `kamera`, `o`.`ekran_boyutu` AS `ekran_boyutu` FROM (`telefon` `t` join `ozellik` `o` on(`t`.`telefon_id` = `o`.`id`)) ;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bayi`
--
ALTER TABLE `bayi`
  ADD PRIMARY KEY (`bayi_id`),
  ADD KEY `bayi_ibfk_2` (`depo_id`);

--
-- Tablo için indeksler `bayi_stok`
--
ALTER TABLE `bayi_stok`
  ADD KEY `bayi_id` (`bayi_id`),
  ADD KEY `telefon_id` (`telefon_id`);

--
-- Tablo için indeksler `depo`
--
ALTER TABLE `depo`
  ADD PRIMARY KEY (`depo_id`);

--
-- Tablo için indeksler `depo_stok`
--
ALTER TABLE `depo_stok`
  ADD KEY `depo_id` (`depo_id`),
  ADD KEY `telefon_id` (`telefon_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `ozellik`
--
ALTER TABLE `ozellik`
  ADD KEY `ozel_id` (`id`);

--
-- Tablo için indeksler `resimler`
--
ALTER TABLE `resimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `satilan_urun`
--
ALTER TABLE `satilan_urun`
  ADD PRIMARY KEY (`satis`),
  ADD KEY `bayi_id` (`bayi_id`),
  ADD KEY `musteri_id` (`musteri_id`),
  ADD KEY `telefon_id` (`telefon_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD KEY `musteri_id` (`musteri_id`),
  ADD KEY `tel_id` (`tel_id`);

--
-- Tablo için indeksler `telefon`
--
ALTER TABLE `telefon`
  ADD PRIMARY KEY (`telefon_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `musteri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `satilan_urun`
--
ALTER TABLE `satilan_urun`
  MODIFY `satis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `telefon`
--
ALTER TABLE `telefon`
  MODIFY `telefon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `bayi`
--
ALTER TABLE `bayi`
  ADD CONSTRAINT `bayi_ibfk_1` FOREIGN KEY (`bayi_id`) REFERENCES `telefon` (`telefon_id`);

--
-- Tablo kısıtlamaları `bayi_stok`
--
ALTER TABLE `bayi_stok`
  ADD CONSTRAINT `bayi_stok_ibfk_1` FOREIGN KEY (`bayi_id`) REFERENCES `bayi` (`bayi_id`),
  ADD CONSTRAINT `bayi_stok_ibfk_2` FOREIGN KEY (`telefon_id`) REFERENCES `telefon` (`telefon_id`);

--
-- Tablo kısıtlamaları `depo_stok`
--
ALTER TABLE `depo_stok`
  ADD CONSTRAINT `depo_stok_ibfk_1` FOREIGN KEY (`depo_id`) REFERENCES `depo` (`depo_id`),
  ADD CONSTRAINT `depo_stok_ibfk_2` FOREIGN KEY (`telefon_id`) REFERENCES `telefon` (`telefon_id`);

--
-- Tablo kısıtlamaları `ozellik`
--
ALTER TABLE `ozellik`
  ADD CONSTRAINT `ozellik_ibfk_1` FOREIGN KEY (`id`) REFERENCES `telefon` (`telefon_id`);

--
-- Tablo kısıtlamaları `resimler`
--
ALTER TABLE `resimler`
  ADD CONSTRAINT `resimler_ibfk_1` FOREIGN KEY (`id`) REFERENCES `telefon` (`telefon_id`);

--
-- Tablo kısıtlamaları `satilan_urun`
--
ALTER TABLE `satilan_urun`
  ADD CONSTRAINT `satilan_urun_ibfk_1` FOREIGN KEY (`bayi_id`) REFERENCES `bayi` (`bayi_id`),
  ADD CONSTRAINT `satilan_urun_ibfk_2` FOREIGN KEY (`musteri_id`) REFERENCES `kullanici` (`musteri_id`),
  ADD CONSTRAINT `satilan_urun_ibfk_3` FOREIGN KEY (`telefon_id`) REFERENCES `telefon` (`telefon_id`);

--
-- Tablo kısıtlamaları `sepet`
--
ALTER TABLE `sepet`
  ADD CONSTRAINT `sepet_ibfk_1` FOREIGN KEY (`musteri_id`) REFERENCES `kullanici` (`musteri_id`),
  ADD CONSTRAINT `sepet_ibfk_2` FOREIGN KEY (`tel_id`) REFERENCES `telefon` (`telefon_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
