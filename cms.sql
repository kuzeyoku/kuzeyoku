-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Kas 2023, 13:56:28
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `view_count` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_translates`
--

CREATE TABLE `blog_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`id`, `url`, `image`, `title`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '6561e6407c547.png', NULL, 0, 'active', '2023-11-25 12:18:36', '2023-11-25 12:19:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_translates`
--

CREATE TABLE `category_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `languages`
--

INSERT INTO `languages` (`id`, `title`, `code`, `status`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Türkçe', 'tr', 'active', 1, '2023-11-24 11:27:00', '2023-11-24 11:27:00'),
(2, 'English', 'en', 'active', 0, '2023-11-24 11:27:00', '2023-11-24 11:27:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) DEFAULT NULL,
  `type` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `blank` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`id`, `url`, `type`, `parent_id`, `order`, `blank`) VALUES
(1, '/', 'header', 0, 0, 0),
(2, NULL, 'header', 0, 0, 0),
(3, '/page/1/hakkimizda', 'header', 2, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu_translates`
--

CREATE TABLE `menu_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `menu_translates`
--

INSERT INTO `menu_translates` (`id`, `menu_id`, `lang`, `title`) VALUES
(1, 1, 'tr', 'Ana Sayfa'),
(2, 2, 'tr', 'Kurumsal'),
(3, 3, 'tr', 'Hakkımızda');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('read','unread','answered') NOT NULL DEFAULT 'unread',
  `ip` varchar(191) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `consent` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_15_073524_create_settings_table', 1),
(6, '2022_10_16_053655_create_languages_table', 1),
(7, '2022_10_16_102925_create_categories_table', 1),
(8, '2022_10_17_130003_create_category_translates_table', 1),
(9, '2022_10_20_072356_create_pages_table', 1),
(10, '2022_11_29_074504_create_blogs_table', 1),
(11, '2022_12_23_055444_create_brands_table', 1),
(12, '2022_12_23_062044_create_products_table', 1),
(13, '2023_03_17_061552_create_page_translates_table', 1),
(14, '2023_03_17_062249_create_blog_translates_table', 1),
(15, '2023_03_31_133302_create_services_table', 1),
(16, '2023_03_31_133411_create_service_translates_table', 1),
(17, '2023_04_02_203010_create_product_translates_table', 1),
(18, '2023_04_05_113222_create_sliders_table', 1),
(19, '2023_04_05_114456_create_slider_translates_table', 1),
(20, '2023_04_09_181843_create_product_images_table', 1),
(21, '2023_06_13_070121_create_references_table', 1),
(22, '2023_06_14_063906_create_testimonials_table', 1),
(23, '2023_06_15_082448_create_popups_table', 1),
(24, '2023_06_15_163115_create_popup_translates_table', 1),
(25, '2023_06_15_173225_create_messages_table', 1),
(26, '2023_07_15_083614_create_sessions_table', 1),
(27, '2023_07_26_115546_create_projects_table', 1),
(28, '2023_07_26_120029_create_project_translates_table', 1),
(29, '2023_07_26_191350_create_project_images_table', 1),
(30, '2023_08_23_192655_create_menus_table', 1),
(31, '2023_08_23_192939_create_menu_translates_table', 1),
(32, '2023_09_19_123508_create_setups_table', 1),
(33, '2023_11_13_180218_create_subscribs_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hakkimizda', 'active', '2023-11-25 11:24:59', '2023-11-25 11:24:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `page_translates`
--

CREATE TABLE `page_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `page_translates`
--

INSERT INTO `page_translates` (`id`, `page_id`, `lang`, `title`, `description`) VALUES
(1, 1, 'tr', 'Hakkımızda', '<p>İHA AKADEMİSİ SAVUNMA VE HAVACILIK alanında sayısız projeyi ülkemize kazandırmıştır. Son yıllarda artan havacılık ve savunma sanayine endeksli olarak İHA AKADEMİSİ eğitim alanında faaliyetler göstermektedir.</p>\r\n<p>İHA SAVUNMA üretim, satış, tamir, bakım, onarım ve danışmanlık faaliyetlerinde bulunmaktadır.</p>\r\n<p>İHA HAVACILIK ileri teknolojileri milli ve özgün olarak tasarlamaya odaklanarak sonuç odaklı düşünen ve motivasyonu yüksek ekip ruhumuz; Ar-Ge ve üretim süreçlerini yeni teknolojilerle dinamik bir şekilde uygulanmasını sağlıyoruz</p>\r\n<p>İha savunma ve havacılık olarak tecrübeli ve yenilikçi yaklaşıma sahip çalışanlarımızla müşteri beklentilerinin ötesinde hizmet vermeye çalışmaktayız.</p>\r\n<p> </p>\r\n<p><strong>Vizyonumuz</strong></p>\r\n<p>Savunma ve havacılık sektöründe, yüksek teknolojiye sahip sistem geliştiren güvenilir bir dünya şirketi olmak.</p>\r\n<p> </p>\r\n<p><strong>Kalite Politikamız</strong></p>\r\n<p>Şirketimiz için verimliliği ön planda tutarak, uluslararası mükemmel ürün ve servis sağlayıcı olmak.</p>\r\n<p> </p>\r\n<p>Müşteri memnuniyetinin, değişen ve gelişen müşteri beklentilerinin tam, doğru ve zamanında karşılanmasıyla mümkün olacağının bilincinde olan şirketimiz, daima en son teknolojiyi sunarak, sürekli gelişimi ve değişimi ilke edinmiştir.</p>\r\n<p>Bilişim sektöründe çalışanlarımızın katılımı ile teknolojik çözüm ve servis kalitesiyle lider bir kuruluş olmak,</p>\r\n<p>Eğitimlerin sürekliliğiyle ekibimizin katkılarını artırmak,</p>\r\n<p>İş ortaklarımızla birlikte işbirliği ve güven içerisinde çalışıp verimliliğimizi artırmak, sürekli iyileştirmek ve kalite yönetim sistemimizin şartlarına uymaktır</p>\r\n<p> </p>\r\n<p><strong>Bilgi Güvenliği Politikamız</strong></p>\r\n<p>TS EN ISO 27001 Bilgi Güvenliği Yönetim Sisteminin ana teması; Firmamız hizmetleri ile ilgili üçüncü şahıslara ait bilgiler ve finansal kaynaklar içerisinde bilgi güvenliği yönetiminin sağlandığını göstermek, risk yönetimini güvence altına almak, bilgi güvenliği yönetimi süreç performansını ölçmek ve bilgi güvenliği ile ilgili konularda üçüncü taraflarla olan ilişkilerin düzenlenmesini sağlamaktır.</p>\r\n<p> </p>\r\n<p><strong>BGYS Politikamızın Amacı;</strong></p>\r\n<p>İçeriden veya dışarıdan, bilerek ya da bilmeyerek meydana gelebilecek her türlü tehdide karşı firmamızın bilgi varlıklarını korumak, bilgiye erişebilirliği iş prosesleriyle gerektiği şekilde sağlamak, yasal mevzuat gereksinimlerini karşılamak,</p>\r\n<p>Yürütülen tüm faaliyetlerde Bilgi Güvenliği Yönetim Sisteminin üç temel öğesinin sürekliliğini sağlamak.</p>\r\n<p> </p>\r\n<p>Gizlilik: Önem taşıyan bilgilere yetkisiz erişimlerin önlenmesi,</p>\r\n<p>Bütünlük:  Bilginin doğruluk ve bütünlüğünün sağlandığının gösterilmesi,</p>\r\n<p>Erişebilirlik:  Yetkisi olanların gerektiği hallerde bilgiye ulaşılabilirliğinin gösterilmesi,</p>\r\n<p> </p>\r\n<p>Sadece elektronik ortam da tutulan verilerin değil; yazılı, basılı, sözlü ve benzeri ortam da bulunan tüm verilerin güvenliği ile ilgilenmek.</p>\r\n<p>Bilgi Güvenliği Yönetimi eğitimlerini tüm personele vererek bilinçlendirmeyi sağlamak.</p>\r\n<p>Bilgi Güvenliğindeki gerçekte var olan veya şüphe uyandıran tüm açıkların, BGYS Ekibine rapor etmek ve BGYS Koordinatörü tarafından soruşturulmasını sağlamak.</p>\r\n<p>İş süreklilik planları hazırlamak, sürdürmek ve test etmek.</p>\r\n<p>Bilgi Güvenliği konusunda periyodik olarak değerlendirmeler yaparak mevcut riskleri tespit etmek. Değerlendirmeler sonucunda, aksiyon planlarını gözden geçirmek ve takibini yapmak.</p>\r\n<p>Sözleşmelerden doğabilecek her türlü anlaşmazlık ve çıkar çatışmasını engellemek.</p>\r\n<p>Bilgiye erişebilirlik ve bilgi sistemleri için iş gereksinimlerini karşılamaktır</p>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `popups`
--

CREATE TABLE `popups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('image','video','text') NOT NULL DEFAULT 'text',
  `image` varchar(50) DEFAULT NULL,
  `video` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT 0,
  `width` int(11) NOT NULL DEFAULT 600,
  `closeOnEscape` tinyint(1) NOT NULL DEFAULT 0,
  `closeButton` tinyint(1) NOT NULL DEFAULT 0,
  `overlayClose` tinyint(1) NOT NULL DEFAULT 0,
  `pauseOnHover` tinyint(1) NOT NULL DEFAULT 0,
  `fullScreenButton` tinyint(1) NOT NULL DEFAULT 0,
  `color` varchar(191) NOT NULL DEFAULT '#88A0B9',
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `popup_translates`
--

CREATE TABLE `popup_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `popup_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `currency` varchar(191) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `slug`, `image`, `category_id`, `price`, `currency`, `video`, `order`, `status`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 'sabit-kanat-insansiz-hava-araci', '6561df8aa0ce9.jpg', 0, NULL, NULL, NULL, 0, 'active', 0, '2023-11-25 11:50:35', '2023-11-25 11:50:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_translates`
--

CREATE TABLE `product_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `features` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_translates`
--

INSERT INTO `product_translates` (`id`, `product_id`, `lang`, `title`, `description`, `features`) VALUES
(1, 1, 'tr', 'Sabit Kanat İnsansız Hava Aracı', '<p>Dikey iniş ve kalkış (VTOL) özellikli sabit kanatlı İHA\'dır. Uzun mesafe uçuş yeteneğine sahiptir. Uzun süre, yüksek uçuş hızına ve çalışma verimliliğine sahiptir. Termal, Zoom, NIR ve harita amaçlı kameralar ile güvenlik sektörü ve harita üretmede kamera seçimine göre kullanbilirsiniz.</p>\r\n<p> </p>\r\n<p>Farklı ve Şık Görünüm İha gövdesi, yapının sağlam olmasına ve hafif olması için karbon fiber ve kompozit malzemeden yapılmıştır.</p>\r\n<p> </p>\r\n<p>Tam Otomatik Mod çoklu rotor modunda, otomatik olarak dikey iniş-kalkış yapmak için kullanılan bir anahtar ile, kalkıştan sonra otomatik olarak sabit kanat moduna geçerek, farklı kalkış alanları için UAV\'yi kullanılabilir hale getirir.</p>\r\n<p> </p>\r\n<p>Opsiyonel PPK GNSS bordu ile yerde minimum GCP noktası kullanılarak hızlı harita üretimeni uygundur.</p>\r\n<p> </p>\r\n<p>Batarya yatay uçuş mesafesini maksimum 200 km\'ye çıkararak uzun süreli uçuş görevleri için; VTOL modunda harcanan enerji için farklı bir batarya çifti kullanılarak, sınırlı uçuş süresi ve düşük pil seviyesi riski önlenmiştir.</p>', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(50) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `brochure` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project_translates`
--

CREATE TABLE `project_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `shortdescription` text DEFAULT NULL,
  `features` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `references`
--

INSERT INTO `references` (`id`, `image`, `title`, `url`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, '6561e1cc1bf3e.png', NULL, NULL, 0, 'active', '2023-11-25 11:56:57', '2023-11-25 12:00:12'),
(2, '6561e3d6ce116.png', NULL, NULL, 0, 'active', '2023-11-25 12:02:04', '2023-11-25 12:08:54'),
(3, '6561e40ca158a.png', NULL, NULL, 0, 'active', '2023-11-25 12:04:52', '2023-11-25 12:09:48'),
(4, '6561e44f80b2e.png', NULL, NULL, 0, 'active', '2023-11-25 12:10:55', '2023-11-25 12:10:55'),
(5, '6561e48b93815.png', NULL, NULL, 0, 'active', '2023-11-25 12:11:55', '2023-11-25 12:11:55'),
(6, '6561e4cf42355.png', NULL, NULL, 0, 'active', '2023-11-25 12:13:03', '2023-11-25 12:13:03'),
(7, '6561e50ccbcd1.png', NULL, NULL, 0, 'active', '2023-11-25 12:14:04', '2023-11-25 12:14:04'),
(8, '6561e520d2c80.png', NULL, NULL, 0, 'active', '2023-11-25 12:14:24', '2023-11-25 12:14:24'),
(9, '6561e531b4609.png', NULL, NULL, 0, 'active', '2023-11-25 12:14:41', '2023-11-25 12:14:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `slug`, `image`, `category_id`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'otonom-kara-araclari', '6561c6a61137a.jpg', 0, 0, 'active', '2023-11-25 10:01:20', '2023-11-25 10:04:22'),
(2, 'hedef-iha-platformlari', '6561d1270b29e.jpg', 0, 0, 'active', '2023-11-25 10:49:11', '2023-11-25 10:49:11'),
(3, 'amfibik-otonom-sistemler', '6561d1a9d7e05.jpg', 0, 0, 'active', '2023-11-25 10:51:22', '2023-11-25 11:55:23'),
(4, 'silahli-iha-sistemleri', '6561d1ecba9c6.jpg', 0, 0, 'active', '2023-11-25 10:52:28', '2023-11-25 10:52:28'),
(5, 'fotogrametri', '6561d21bbf6d3.jpg', 0, 0, 'active', '2023-11-25 10:53:15', '2023-11-25 10:53:15'),
(6, 'tarimsal-cozumler', '6561d26611129.jpg', 0, 0, 'active', '2023-11-25 10:54:30', '2023-11-25 10:54:30'),
(7, 'kesif-gozetleme', '6561d2961b58d.jpeg', 0, 0, 'active', '2023-11-25 10:55:18', '2023-11-25 10:55:18'),
(8, 'termalzoom-analiz', '6561d348622b5.jpg', 0, 0, 'active', '2023-11-25 10:58:16', '2023-11-25 10:58:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `service_translates`
--

CREATE TABLE `service_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `service_translates`
--

INSERT INTO `service_translates` (`id`, `service_id`, `lang`, `title`, `description`) VALUES
(1, 1, 'tr', 'Otonom Kara Araçları', '<p>İnsansız kara aracı (kısaca İKA), yerde giden ve üzerinde insan bulunmayan araçların genel adıdır. İnsan varlığının uygunsuz, tehlikeli veya olanaksız olduğu durumlarda kullanılır. Uzaktan kumandayla kontrol edilebildiği gibi sensörleri vasıtasıyla kendi hareket edebilen türleri vardır.</p>\r\n<p> </p>\r\n<p><strong>Uzay uygulamaları</strong></p>\r\n<p>Uzay uygulamalarına örnek olarak Rover\'lar verilebilir. Rover, gezegenlerin veya gök cisimlerinin yüzeyinde gerekli görevleri yerine getirebilmesi için tasarlanmış uzay keşif araçların genel adıdır. NASA’nın 2011 yılında Mars keşif aracı projesi için göndermiş olduğu insansız uzay aracı olan Curiosty[6], Mars’ta yaşam olup olmadığını ayrıca su barınabilirliği gibi insansı keşiflerin mümkün olup olmadığını araştırmak için gönderilmiştir. 2020 yılında ise yine benzer amaçlar doğrultusunda Perseverance uzay aracı gönderilmiştir.</p>\r\n<p> </p>\r\n<p><strong>Askeri uygulamalar</strong></p>\r\n<p>İnsansız kara araçları askerî alanda, ordu tarafından askerî üslerde, terörle mücadelede, tehlikeli ortamlarda insanların yapması gereken işleri yapmada örneğin; patlayıcıları, bombaları, mayınları etkisiz hale getirmek, zor koşullarda ağır eşyaları yüklemek ve düşman ateşi altında ortam koşullarının onarımını ya da güvenliğin sağlanması için devriye gezerek bilgi toplamak, saldırganlar için caydırıcı bir unsur olarak var olmak gibi kullanımları içerir.</p>\r\n<p> </p>\r\n<p><strong>Sivil ve Ticari uygulamalar</strong></p>\r\n<p>İnsansız kara araçları birden çok sivil ve ticari ortamlardaki süreçlerde uygulanmaktadır.</p>\r\n<p> </p>\r\n<p><strong>Tarım</strong></p>\r\n<p>İnsansız kara araçlarının tarım alanında kullanımı günün her saati çalıştırılabilir olmasını, mahsullerin ve çiftlik hayvanlarının sağlığının izlenmesini, yabani otlarla mücadele edebilmeyi gibi tarımda verimliliği artırma yönünde kullanılmaktadır. Tarım robotu bu uygulama alanında örnek verilebilir.</p>\r\n<p> </p>\r\n<p><strong>Madencilik</strong></p>\r\n<p>Maden işletmelerinde maden tünellerini geçmek, hacim, kübaj hesaplamalarını yapmak ve açık maden ocaklarında 3 boyutlu kaya yüzeylerini haritalamak gibi görevler için kullanılmaktadır.</p>\r\n<p> </p>\r\n<p><strong>Üretim</strong></p>\r\n<p>Üretim ortamında malzeme taşımak için kullanılır. Havacılık şirketleri gibi şirketler bu araçları, insanların tehlikeli alanlarla etkileşime girmesini engelleyebilmeleri ve büyük vinçleri kullandığımız zamandan daha az zaman alarak ağır, hacimli parçaları taşıdığı için tercih edilir.</p>\r\n<p> </p>\r\n<p><strong>Acil durum uygulamaları</strong></p>\r\n<p>İnsansız kara araçları, yangınla mücadele, nükleer müdahale, arama ve kurtarma operasyonları gibi birçok acil durumlarda kullanılır. 2011 yılında “Fukushima Daiichi Nuclear Power Plant” kazasında insan varlığının araştırılması için çok fazla radyasyon bulunan alanlarda insansız kara araçları kullanıldı. Kızılötesi kamerası ile uzaktan rahatlıkla haberleşilebiliyordu. İç algılayıcılarıyla kişinin tansiyonunu ya da hayati fonksiyonlarını algılayıp iletişim kurulmuştur.</p>'),
(2, 2, 'tr', 'Hedef İha Platformları', '<p>Hedef insansız hava araçları, havadan havaya veya karadan havaya atılan füzelerin envantere girmeden yapılan atış testlerinde hedef olarak kullanılmak üzere farklı boyutlarda ve hızlarda üretilen tek kullanımlık insansız hava araçlarıdır.</p>\r\n<p>İHA SAVUNMA Müşteri ihtiyaçlarına göre şekillendirilebilir açık mimaride olan sistemleriyle düşman uçak ve füzelerini simule edebilme, yüksek manevra kabiliyeti, yüksek hızı, kolay kullanımı, düşük görev riski, modülerliği ve maliyet etkinliği ile operasyonel ortamlarda gerçekleştirilen atışlı görevlerde etkinliğini ispatlamıştır.</p>'),
(3, 3, 'tr', 'Amfibik Otonom Sistemler', '<p>Gelişmiş yapay zekâ ile beraber insansız sistemler giderek dijitalleşen modern muharebe alanında sürü halinde tam otonom görev icra edecekler. Sürü insansız deniz araçları teknolojisi ve yönetim sistemi için sürü insansız deniz araçları geliştirmeye çalışıyoruz.</p>\r\n<p> </p>\r\n<p>Söz konusu bu geliştirme çalışmaları tamamlandığında ise yapay zekâ tabanlı insansız deniz araçları, devriye gezmek ve düşman unsurlarıyla mücadele etmek için Sürü kabiliyeti kazandırılmış olan bu sistemler kablosuz ağlar ile birbirine bağlanacak, gelen gemileri ve ya denizaltıları imha etmek için yerleştirilmiş mayınları da arayıp tespit ve teşhis edebilecekler. </p>\r\n<p> </p>\r\n<p>İnsansız deniz araçları da dahil olmak üzere insansız araçların otonom gemi teknolojilerinde ülkemizin küresel lider olması için zemin hazırlıyoruz.</p>'),
(4, 4, 'tr', 'Silahlı İha Sistemleri', '<p>SİHA olarak da bilinen Silahlı İnsansız Hava Aracı, genellikle bomba, füze ve/veya ATGM gibi uçak mühimmatlarını taşıyan ve drone saldırıları için kullanılan bir insansız hava aracı (İHA) türüdür.</p>\r\n<p> </p>\r\n<p>Bu araçlar genellikle gerçek zamanlı insan kontrolü altındadırlar ve farklı özerklik seviyeleri vardır. Bu tip uçakların yerleşik bir insan pilotu yoktur. Operatör aracı uzaktaki bir terminalden çalıştırdığından, bir insan pilot için gerekli ekipmana ihtiyaç duyulmaz, bu da insanlı bir uçaktan daha düşük bir ağırlık ve daha küçük bir boyuta neden olur.</p>\r\n<p> </p>\r\n<p>Birçok ülke operasyonel yerli insansız hava muharebe aracına sahiptir ve daha birçok insansız hava muharebe aracı ithal edilmekte veya geliştirme programları devam etmektedir.</p>'),
(5, 5, 'tr', 'Fotogrametri', '<p>İHA hava kameraları, yüksek teknoloji düzeyinde GPS/ IMU, Gyro Stablized Mount, Uçuş Yönetim Sistemleri (FMS), görüntü ve veri işleme yazılımları ile en doğru çözümler sunmaktayız. Doğru donanımlar, yazılımlar ve uyguladığımız mühendislik metodolojileri ile birlikte, işverenlerimize yaptığımız projeler ile hızlı, güvenilir ve hassas veri sağlıyoruz.</p>\r\n<p> </p>\r\n<ul>\r\n<li>Şartnamelere uygun YKN Planlama, Tesis ve Ölçümü</li>\r\n<li>Uçuş Planlama</li>\r\n<li>Hava Fotoğrafı Alımı</li>\r\n<li>Hava Fotoğrafı Radyometrik Dengeleme</li>\r\n<li>GNSS/INS Veri İşleme</li>\r\n<li>Havai Nirengi Dengeleme</li>\r\n<li>Sayısal Yüzey Modeli Üretme</li>\r\n<li>Sayısal Arazi Modeli Üretme</li>\r\n<li>Ortofoto Üretme</li>\r\n<li>True Ortofoto Üretme</li>\r\n<li>Stereo Kıymetlendirme</li>\r\n</ul>\r\n<p> </p>\r\n<p>Kadastro, kamulaştırma, yol, sulama ve gölet projelendirme, hali hazır harita üretimi ve mühendislik konularında ihtiyaç duyduğunuz her türlü coğrafi veri ve mühendislik projelerinizde hizmetinizdeyiz.</p>'),
(6, 6, 'tr', 'Tarımsal Çözümler', '<p>İHA ile Zirai İlaçlama modern tarımın gelişmesine en büyük katkıyı bizce İHA araçları yaptı. Neden biliyor musunuz? İHA ile zirai ilaçlama olmadan önce, konvansiyonel tarım teknikleri yer araçlarıyla yapılıyordu. Tabi ki konvansiyonel teknikler fark yaratacak düzeyde verim sağlıyordu. Ancak İHA’lar ciddi anlamda tarım yapanlara hem zaman, hem de para kazandırdı.  İha havacılık olarak da bizler, tarıma en büyük katkıyı sağlamak için çalışıyoruz. İHA araçlarıyla zirai ilaçlama ihaları geliştirerek ve eğitimleri veriyoruz.</p>\r\n<p> </p>\r\n<p>Zirai İlaçlama ile Bitki Koruma</p>\r\n<p> </p>\r\n<p>Zirai insansız hava aracı yardımıyla bitkilerin nasıl korunacağını öğretiyoruz. Traktör ve diğer tarım araçlarıyla yapılan ilaçlama ya da tohum ekimi pek de verimli değildir. Çünkü atılan ilaç ya da tohumun çok az kısmı bitki üzerinde tutunur. Yani yapılan işin birçoğu zaman kaybından başka bir şey değildir.  Ama bir de şöyle düşünelim. Hiçbir sulama çalışması, yağan yağmur kadar etkili değildir değil mi? </p>\r\n<p> </p>\r\n<p>Gökyüzünden belirli miktarda ve belirli açıyla bitkilerin üzerine neredeyse eşit bir şekilde düşer. Yani yağmur yağan yerde ıslanmayan bitki kalmaz. </p>\r\n<p>İşte insansız hava araçları da böyle bir etki yaratır. </p>\r\n<p> </p>\r\n<p>İHA ile zirai ilaçlama ile aşağıdaki bitki türleri korunabilir: </p>\r\n<p> </p>\r\n<ul>\r\n<li>Buğday,</li>\r\n<li>Arpa,</li>\r\n<li>Çeltik,</li>\r\n<li>Pamuk,</li>\r\n<li>Üzüm,</li>\r\n<li>Çay,</li>\r\n<li>Mısır </li>\r\n<li>Meyve bahçeleri</li>\r\n</ul>'),
(7, 7, 'tr', 'Keşif Gözetleme', '<p>İnsansız Hava Araçları, helikopterler ve uçaklar dahil sabit kanatlı veya döner kanatlı hava platformları ve deniz platformları için geliştirilmiş olan, yüksek performanslı elektro-optik keşif ve gözetleme sistemleri çözümleri mevcuttur.</p>\r\n<p> </p>\r\n<p>İnsansız hava araçları hem gözlem yaparak hem de CATS sistemleriyle lazer işaretleme yapılabilmektedir. İHA\'larda lazer işaretleme başarılı bir şekilde test edildi ve aktif olarak kullanılmaktadır.</p>'),
(8, 8, 'tr', 'Termal/Zoom Analiz', '<p>Görüntü İşleme üçüncü parti kameralar kullanılarak veri analiz platformunun da kullanılması mümkündür. Kızılötesi termal görüntüleme, vücut sıcaklığı dağılımının ve değişiminin izlenmesine izin veren invazif olmayan, zararlı radyasyon içermeyen, temassız bir modalitedir. Periferik kan akışı, otonom sinir sistemi, vazokonstrüksiyon / vazodilatasyon, iltihaplanma, terleme veya diğer süreçler hakkında fizyolojik bilgiler sağlaması medikal alanda kullanımını yaygınlaştırmıştır. Yapay zekâ alanında yaşanan gelişmeler medikal uygulamalarda da karşılık bulmuş ve makine öğrenimi metotları; karar verme, hastalık takibi, cerrahi planlama gibi birçok görev için kullanılır hâle gelmiştir. Termal verilerin yorumlanması için yapay zekâ yöntemlerinin kullanılması, bir tanı, tedavi planlama veya cerrahi değerlendirme senaryosunda doktorlara ikinci bir görüş sağlamak için etkin bir çözüm olabilir. Bu araştırmanın amacı: Literatür kaynaklarının incelenerek termal görüntülemenin medikal uygulamalardaki sınıflandırma, karar verme gibi süreçlerde yapay zekâ yöntemlerinin işleyişlerini değerlendirmek ve literatür hakkında bilgi sunmaktır</p>\r\n<p> </p>\r\n<p>Parça Tanımlama Araçları</p>\r\n<p> </p>\r\n<p>PatMax, sektördeki en hassas parça tanıma ve pozisyon bulma aracıdır. COGNEX patentli geometrik ilişki tabanlı bu şekil tanıma aracı en zor koşullarda bile hassas bir şekilde görevini yapmaktadır Projelerde mekanik sabitlemeye olan ihtiyacı azaltarak sistemi basitleştirir, sorunsuz ve kesin sonuç verir.</p>\r\n<p> </p>\r\n<p>Otomotiv, elektronik, ilaç ve beyaz eşya parça pozisyonu bulma. Robot yönlendirme amaçlı değişken boyutta, açıda ve pozisyondaki parçaları bulma, ışığa çok az duyarlı bir algoritma ile kesin çözüm Hassas parça hizalama.</p>\r\n<p> </p>\r\n<p>İnceleme Araçları</p>\r\n<p> </p>\r\n<p>Parça yeri değişse bile tekrarlanabilir sonuçlar</p>\r\n<p>Kullanıcıya hata tipini, toleransları kolayca tanımlama imkanı verir.</p>\r\n<p>Otomotivde parçanın doğru monte edilmesinin kontrolü.</p>\r\n<p>İlaç, gıda ve paketlemede içerik, kapak, etiket kontrolü</p>\r\n<p>Elektronikte komponentlerin doğru montajının kontrolü.</p>\r\n<p> </p>\r\n<p>Robot Yönlendirme Araçları</p>\r\n<p> </p>\r\n<p>Parça bulma fonksiyonlarıyla haberleşme araçlarının robot yönlendirme için tümleşik olması.</p>\r\n<p>Hassas pozisyon bulma araçları ile Pick&amp;Place uygulamalarında fikstür maliyetlerinin düşürülmesi.</p>\r\n<p>Tek istasyonda birden fazla farklı tip ürünle çalışma imkanı. Yüksek hızda ve hassasiyette parça alma, paketleme yada paletten alma uygulamaları.</p>\r\n<p>Konveyör üzerinde rastgele gelen parçaların tanınması ve pozisyon bilgisinin alınması.</p>\r\n<p>Hassas parçaların kontrolü için robotun kamera pozisyonunu değiştirerek algılama yaptırması.</p>\r\n<p> </p>\r\n<p>Esnek Hata Kontrolü</p>\r\n<p> </p>\r\n<p>Hatalı algılama sorununa karşı prosesten kaynaklanan değişimlere izin verebilme.</p>\r\n<p>Maskeleme opsiyonu ile prosesten kaynaklanacak hataları tolere edebilme.</p>\r\n<p>Kenar ve alana bağlı hata algılama.</p>\r\n<p>Şekildeki bozuklukların algılanması.</p>\r\n<p>İpek serigrafi baskıdaki hataların algılanması.</p>\r\n<p> </p>\r\n<p>Kenar Bulma Araçları</p>\r\n<p> </p>\r\n<p>Parça yer değişimine rağmen hassas algılama yapılması.</p>\r\n<p>Kullanıcıya hata tipinin tanımlanması imkanını vererek esneklik sağlanması.</p>\r\n<p>Düz ve yuvarlak parçalarda çalışabilme.</p>\r\n<p>Ürün üzerindeki parçaların doğru şekilde monte edilip edilmediğinin kontrol edilmesi.</p>\r\n<p>Kenarlardaki, genişliklerdeki değişimlerin kontrol edilmesi.</p>\r\n<p> </p>\r\n<p>Renk Araçları</p>\r\n<p> </p>\r\n<p>Renk tabanlı pozisyon bulma, parça tanıma ya da ölçüm uygulamalarının yapılabilmesi.</p>\r\n<p>24 bit çözünürlükte renk tanıma fonksiyonu ile hassas ton farklılıklarını algılama.</p>\r\n<p>Mouse ile renklerin görüntü üzerinde kolayca seçilerek tanıtılması</p>\r\n<p>Dışarıdan öğretme özelliği ile PC gerektirmeden renk tanıtma özelliği.</p>\r\n<p>Renge göre ürün sınıflandırılması.</p>\r\n<p>Kalite kontrol amaçlı renk tanıma.</p>\r\n<p>Etiketleri renklerine göre tanıma.</p>\r\n<p>Renklerine göre ürünlerin doğru montaj yapıldığının kontrolü.</p>\r\n<p>İlaç sektöründe tabletlerin renklerine göre sınıflandırılması ve hatalı tablet kontrolü.</p>\r\n<p> </p>\r\n<p>İleri Düzey OCV/OCR Araçları</p>\r\n<p> </p>\r\n<p>Yüksek doğrulukta okuma.</p>\r\n<p>İnkjet ile yazılmış yazılar için ideal.</p>\r\n<p>Kullanımı kolay.</p>\r\n<p>Değişken, kontrasta sahip ve değişken aralıklı.</p>\r\n<p>Gıda, içecek, ilaç, sigara sektöründe son kullanma tarihi, lot, tarih gibi bilgilerin doğrulanması.</p>\r\n<p>Yazıcı cihazdan kaynaklanan hataların yakalanması.</p>\r\n<p>Otomotiv uygulamalarında yazılan yazıların doğrulanması, okunması, karşılanması.</p>\r\n<p> </p>\r\n<p>Endüstriyel Okuma Araçları</p>\r\n<p> </p>\r\n<p>1DMax endüstrideki en hızlı, hassas tek boyutlu kod yani barkod okuma aracıdır.</p>\r\n<p>2DMax düşük kontrastlı, bozuk kodların, stabil ve düzgün basılmamış, açılı yüzeylere basılmış kodların kesin okunmasına olanak sağlamaktadır.</p>\r\n<p>Dakikada 720 parça okuma hızına kadar ulaşma.</p>\r\n<p>Otomotiv, havacılık ve medikal/ilaç sektöründe ürün üzerine basılmış kodların okunması.</p>\r\n<p>Birçok sektörde basılan kodun doğrulanması, kalitesinin ölçülmesi ve kontrol edilmesi.</p>\r\n<p> </p>\r\n<p>Kalibrasyon Araçları</p>\r\n<p> </p>\r\n<p>Lineer olmayan kalibrasyon, özellikle ölçümde lens ve perspektif hatalarının oluşmasını engeller, hassas bir şekilde ölçüm yapmayı sağlar.</p>\r\n<p>Kalibrasyon sihirbazı sayesinde temelde çok zor ve karmaşık olan bu işlem birkaç adımda yapılabilir.</p>\r\n<p>Kamera sistemi tam eksende bağlanmasa ya da açılı bağlansa bile görüntüyü düzeltme imkanı.</p>\r\n<p>Yüksek hassasiyetle robot pozisyonlama, ekseni kaçık montaj yapılan uygulamalarda robotun doğru pozisyonlanması için.</p>\r\n<p>Hassas parçaların ölçümünde lens ve perspektiften kaynaklanan hataları engellemek amaçlı.</p>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` text DEFAULT NULL,
  `category` enum('general','pagination','information','social','caching','contact','smtp','maintenance','image','sitemap','recaptcha') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `category`) VALUES
(1, 'cookie_notification_status', 'passive', 'information'),
(2, 'cookie_policy_page', NULL, 'information'),
(3, 'user_agreement_page', NULL, 'information'),
(4, 'privacy_agreement_page', NULL, 'information'),
(5, 'kvkk_page', NULL, 'information'),
(6, 'about_page', NULL, 'information'),
(7, 'faq_page', NULL, 'information'),
(8, 'distance_sales_agreement_page', NULL, 'information'),
(9, 'title', 'İha Akademisi', 'general'),
(10, 'description', NULL, 'general'),
(11, 'keywords', NULL, 'general'),
(12, 'phone', '+90 (532) 170 56 57', 'contact'),
(13, 'email', 'info@ihaakademisi.com', 'contact'),
(14, 'address', 'Kanuni Mah. Başkent Cd. No:51-A Keçiören / ANKARA', 'contact'),
(15, 'map', NULL, 'contact');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `setups`
--

CREATE TABLE `setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'not_installed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `button` varchar(191) DEFAULT NULL,
  `video` varchar(191) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `button`, `video`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, '6561d4730f366.jpg', NULL, NULL, 0, 'active', '2023-11-25 11:03:15', '2023-11-25 11:03:15'),
(2, '6561d55c8c37a.jpg', NULL, NULL, 0, 'active', '2023-11-25 11:07:09', '2023-11-25 11:07:09'),
(3, '6561d61b72881.jpg', NULL, NULL, 0, 'active', '2023-11-25 11:10:19', '2023-11-25 11:10:19'),
(4, '6561d695383f3.jpg', NULL, NULL, 0, 'active', '2023-11-25 11:12:21', '2023-11-25 11:12:21'),
(5, '6561d8466f490.jpg', NULL, NULL, 0, 'active', '2023-11-25 11:19:34', '2023-11-25 11:19:34'),
(6, '6561d93da049c.jpg', NULL, NULL, 0, 'active', '2023-11-25 11:22:37', '2023-11-25 11:23:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider_translates`
--

CREATE TABLE `slider_translates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `lang` varchar(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `slider_translates`
--

INSERT INTO `slider_translates` (`id`, `slider_id`, `lang`, `title`, `description`) VALUES
(1, 1, 'tr', 'Maden Sahalarınızı İha İle Ölçüyoruz', 'İha Savunma ve Havacılık Size Çözüm Üretmek İçin Var'),
(2, 2, 'tr', 'Tarımı Daha Verimli Hale Getiriyoruz', 'Özel üretim 100 Lt ve 50 Lt kapasiteli ihalarımız göreve hazır'),
(3, 3, 'tr', 'Otonom Rüzgar Türbin Kontrolü', 'Hasarlar gözlemlenemediğinde zaman içerisinde büyüyerek turbin kanadı kopma durumuna kadar getirebilmektedir.'),
(4, 4, 'tr', 'Enerji Hattı Denetimlerini Gerçekleştiriyoruz', 'Teknolojiyi sadece kullanan değil, teknoloji üreten bir nesil yaratarak, geleceği şekillendirebiliriz.'),
(5, 5, 'tr', 'Her Zaman ve Her Yerde Göreve Hazırız', 'Teknolojiyi sadece kullanan değil, teknoloji üreten bir nesil oluşturarak, geleceği şekillendirebiliriz.'),
(6, 6, 'tr', 'Enerji Yazılımı ve Termal Görüntüleme Hitmetleri', 'Termografi muayene hizmeti ile güneş enerji santrallerini işletme ve kestirici bakım faaliyetleri için yatırımcı ve işletmeciye kritik veriler sunarak GES verimliliğini artırır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscribs`
--

CREATE TABLE `subscribs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `ip` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `position` varchar(191) DEFAULT NULL,
  `company` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `status` enum('active','passive','draft','pending') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('demo','editor','admin') NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', '2023-11-24 11:27:01', '$2y$10$8g223ojmVt8Pgl7LZ/smR.PX7MTTlnWl.V.778U8IWrmOfcAFS9AW', 'eLYZZ4AydV', 'admin', '[\"index\",\"create\",\"edit\",\"update\",\"destroy\"]', '2023-11-24 11:27:01', '2023-11-24 11:27:01');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `blog_translates`
--
ALTER TABLE `blog_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_translates_post_id_foreign` (`post_id`),
  ADD KEY `blog_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category_translates`
--
ALTER TABLE `category_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_translates_category_id_foreign` (`category_id`),
  ADD KEY `category_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Tablo için indeksler `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menu_translates`
--
ALTER TABLE `menu_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_translates_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `page_translates`
--
ALTER TABLE `page_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_translates_page_id_foreign` (`page_id`),
  ADD KEY `page_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `popup_translates`
--
ALTER TABLE `popup_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `popup_translates_popup_id_foreign` (`popup_id`),
  ADD KEY `popup_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `product_translates`
--
ALTER TABLE `product_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_translates_product_id_foreign` (`product_id`),
  ADD KEY `product_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_project_id_foreign` (`project_id`);

--
-- Tablo için indeksler `project_translates`
--
ALTER TABLE `project_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_translates_project_id_foreign` (`project_id`),
  ADD KEY `project_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `service_translates`
--
ALTER TABLE `service_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_translates_service_id_foreign` (`service_id`),
  ADD KEY `service_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Tablo için indeksler `setups`
--
ALTER TABLE `setups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider_translates`
--
ALTER TABLE `slider_translates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_translates_slider_id_foreign` (`slider_id`),
  ADD KEY `slider_translates_lang_index` (`lang`);

--
-- Tablo için indeksler `subscribs`
--
ALTER TABLE `subscribs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribs_email_unique` (`email`);

--
-- Tablo için indeksler `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `blog_translates`
--
ALTER TABLE `blog_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `category_translates`
--
ALTER TABLE `category_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `menu_translates`
--
ALTER TABLE `menu_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `page_translates`
--
ALTER TABLE `page_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `popups`
--
ALTER TABLE `popups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `popup_translates`
--
ALTER TABLE `popup_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `product_translates`
--
ALTER TABLE `product_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `project_translates`
--
ALTER TABLE `project_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `service_translates`
--
ALTER TABLE `service_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `setups`
--
ALTER TABLE `setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `slider_translates`
--
ALTER TABLE `slider_translates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `subscribs`
--
ALTER TABLE `subscribs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `blog_translates`
--
ALTER TABLE `blog_translates`
  ADD CONSTRAINT `blog_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_translates_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `category_translates`
--
ALTER TABLE `category_translates`
  ADD CONSTRAINT `category_translates_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `menu_translates`
--
ALTER TABLE `menu_translates`
  ADD CONSTRAINT `menu_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_translates_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `page_translates`
--
ALTER TABLE `page_translates`
  ADD CONSTRAINT `page_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_translates_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `popup_translates`
--
ALTER TABLE `popup_translates`
  ADD CONSTRAINT `popup_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `popup_translates_popup_id_foreign` FOREIGN KEY (`popup_id`) REFERENCES `popups` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_translates`
--
ALTER TABLE `product_translates`
  ADD CONSTRAINT `product_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_translates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `project_translates`
--
ALTER TABLE `project_translates`
  ADD CONSTRAINT `project_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_translates_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `service_translates`
--
ALTER TABLE `service_translates`
  ADD CONSTRAINT `service_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_translates_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `slider_translates`
--
ALTER TABLE `slider_translates`
  ADD CONSTRAINT `slider_translates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  ADD CONSTRAINT `slider_translates_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
