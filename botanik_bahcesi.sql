-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 May 2024, 18:42:47
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
-- Veritabanı: `botanik_bahcesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `watering_schedule` varchar(100) DEFAULT NULL,
  `fertilizing_schedule` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `plants`
--

INSERT INTO `plants` (`id`, `name`, `description`, `watering_schedule`, `fertilizing_schedule`, `image`) VALUES
(4, ' Chamaemelum (Papatya)', 'Latince adı ‘Chamomillae Romanae’ olan Papatya, papatyagiller familyasındandır. Dünyanın en kalabalık çiçekli bitkiler familyasıdır. Sadece Türkiye’de 1156’dan fazla türü bulunur. Anavatanı Avrupa’dır. Tüm Avrupa’dan Hazar kıyılarına kadar yayılmıştır. Günümüzde buzullarla kaplı Antarktika kıtası dışında her coğrafyada yayılım göstermiştir. Ülkemizde Marmara, Ege, Trakya, Güneybatı Anadolu’da doğal koşullarda yetişir. Mayıs ve Ağustos ayları arasında zarafeti temsil eden beyaz renkte çiçekler açan tek yıllık otsu bir bitkidir.     \r\n\r\nYaprakları hafif acı ve baharlı bir tattadır. Zengin C vitamini içerdiğinden papatya yaprakları, dünya mutfağında salataların hem görünümünü hem de lezzetini arttırmak için kullanılır. Balarılarının da çok sevdiği papatyalar bahar mevsiminin en parlak ve dikkat çekici yüzüdür.', 'Günde 2 kez /Yağmurlama Tekniğiyle', 'Ayda 1 kez ', 'papatya.png'),
(5, 'Viola (Menekşe)', 'Menekşe, menekşegiller (Violaceae) familyasına bağlı Viola cinsini oluşturan çoğunlukla saksılarda yetiştirilen bitki türlerinin ortak adı. 400 ile 500 arası türü bulunmaktadır. Dünyanın birçok yerinde yetişebilmekle beraber en çok kuzey yarımkürede yetişir. Ayrıca Hawai ve Güneydoğu Asya\'da da yetişebilir. Doğada aydınlık, fakat gölgede ve nemli bölgelerde yetişir.\r\n\r\n', NULL, NULL, 'menekşe.png'),
(6, 'Lavandula (Lavanta)', 'Lavanta, ballıbabagiller (Lamiaceae) familyasından Lavandula cinsini oluşturan Akdeniz kökenli bitki türlerinin ortak adıdır.\r\nAtlas Okyanusu adalarından Akdeniz çevresindeki ülkelere ve Hindistan\'a kadar uzanan geniş bir alanda yetişen, lavanta cinsi, çalı görünümlü, toplu başak biçiminde mavi, morumsu ya da kırmızı çiçekler açan bitkilerdir. Lavanta, dağlarda, 1000–1800 metre arasında yüksekliklerde yetişir.\r\n\r\nKurutularak dolaplara konan çiçekleri giysileri böceklerden korur. Yaklaşık 500 metrede yetişen İngiliz lavantası (Lavandula angustifolia) türünden boyacılıkta kullanılan esans elde edilir. Batı Anadolunun maki bölgelerinde yetişen karabaş otu (Lavandula stoechas) çiçeklerinden ağrı kesici, balgam söktürücü olarak yararlanılır.', NULL, NULL, 'lavanta.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'capanertugrul', '$2y$10$UiDvXiKG/5OPUeTCvZ/oGeYnLXAOz1sbbCaqFYYaX.p06.6bRQnY6');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
