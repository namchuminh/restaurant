-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2025 at 06:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Đồ ăn vặt', 'categories/CXOoV02zi6I6GEVENKc1Hnxs5WCCitGEIUX1a01t.jpg', 'do-an-vat', '2024-06-14 23:56:33', '2025-02-03 12:00:35'),
(5, 'Lẩu', 'categories/RtmYWWkIpQW1B9D6VxXErq96w44F1pG2nM5jWHMX.jpg', 'lau', '2024-06-15 04:40:42', '2025-02-03 12:00:48'),
(7, 'Nước uống', 'categories/D4gHlPEQwp8Emec5q4ejiapSRDPeUkDCVyuA9nVr.jpg', 'nuoc-uong', '2025-02-03 11:57:36', '2025-02-03 11:57:36'),
(8, 'Món gà', 'categories/1kuLRUerEKUmGFfmlr0ax1SkG1fYENLekVAY8ekW.jpg', 'mon-ga', '2025-02-03 12:02:11', '2025-02-03 12:02:11'),
(9, 'Rượu', 'categories/69mwfYoR75z3VfkXAkNuMvZ6rLv7ndCV3U95mPdD.jpg', 'ruou', '2025-02-03 12:28:33', '2025-02-04 13:39:50'),
(10, 'Bia', 'categories/MkeKH3peGW0TM537ZeH7vQrGGGcPaGX89u69OAtf.jpg', 'bia', '2025-02-03 12:49:10', '2025-02-03 12:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `favicon` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `title`, `description`, `logo`, `favicon`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Web nhà hàng Sen Vàng', 'Hệ thống nhà hàng Sen Vàng', '/storage/images/Nd2C8gS1S7YYw1ivJrhwwrBSw1vrHU1eMd6HdeHL.png', '/storage/images/UB46KSzqgkx34l5KTwhLRbJhJTNtUgKmNt0XlJUl.png', '0399570205', 'senvang@gmail.com', 'Tân Phong, Lai Châu', '2024-11-10 07:46:43', '2025-01-04 09:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 1, 'Nhà hàng phục vụ nhanh nhẹn nhân viên thân thiện lần sau sẽ ủng hộ nhà hàng tiếp', 6, '2024-12-17 07:29:57', '2024-12-17 07:29:57'),
(8, 1, 'Nhân viên nhanh nhẹn nhà hàng phục vụ chu đáo', 8, '2025-01-05 03:36:59', '2025-01-05 03:36:59'),
(9, 3, 'Tôi muốn đặt bàn cho 20 người vào ngày 20/2', 9, '2025-02-04 12:37:07', '2025-02-04 12:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `quantity`, `order_id`, `food_id`, `created_at`, `updated_at`) VALUES
(36, 2, 38, 36, '2025-02-05 01:21:28', '2025-02-05 01:21:28'),
(37, 4, 40, 41, '2025-02-05 03:38:55', '2025-02-05 03:38:55'),
(38, 1, 40, 37, '2025-02-05 03:39:18', '2025-02-05 03:39:18'),
(39, 10, 41, 43, '2025-02-05 06:25:09', '2025-02-05 06:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `slug` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `description`, `quantity`, `sale`, `price`, `image`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(22, 'Gà luộc', 'Gà luộc là một món ăn phổ biến từ thịt gà bằng phương pháp luộc chín, gà được bỏ vào nồi và được nấu chín hoàn toàn trong nước nóng hoặc nước luộc gà. Gà luộc khi dọn ra thường được chặt miếng, và đây là món ăn là phổ biến cho các nền văn hóa của miền Nam Trung Quốc, bao gồm Quảng Đông, Phúc Kiến và Hồng Kông được biến đến với tên gọi bạch thiết kê, món này cũng phổ biến trong ẩm thực Việt Nam.', 20, 150000, 120000, 'foods/Du0fE1i2pXstQxaIvsfIZTBs8DvZX4QhrlNgCmWa.jpg', 'ga-luoc', 8, '2025-02-03 12:06:32', '2025-02-05 06:55:19'),
(23, 'Gà nướng muối ớt', 'Gà nướng muối ớt là một trong những lựa chọn thú vị cho bữa ăn bởi hương vị thơm ngon đặc trưng, kích thích vị giác. Không những thế, theo nghiên cứu y học, thịt gà mang tính ôn ngọt, không độc hại, mà còn bổ dưỡng và tốt cho sức khỏe. Món gà nướng có màu vàng ươm, thịt mềm thơm, độ giòn ngọt mà không dai.', 10, 200000, 170000, 'foods/Jt8WBvaGZAjGRtt2QiENuRZDuG2zEYSvTaQQWfVD.jpg', 'ga-nuong-muoi-ot', 8, '2025-02-03 12:12:25', '2025-02-05 06:56:59'),
(24, 'Gà kho gừng', 'Gà kho gừng là món ăn được chế biến từ thịt gà tươi, ướp cùng gừng tươi băm nhỏ, hành, tỏi, nước mắm và đường, sau đó cho vào bếp đun nhỏ lửa cho đến khi thịt gà thấm đều gia vị. Món gà kho gừng thường được dùng kèm với cơm trắng, rau xào, rau luộc, hoặc canh cua, tạo nên một bữa ăn ngon miệng, bổ dưỡng và rất tuyệt vời.', 10, 180000, 90000, 'foods/wWn9H9cV59SKqX0YywFvqf9l0Db4UelamuE8naVt.jpg', 'ga-kho-gung', 8, '2025-02-03 12:14:02', '2025-02-05 06:58:02'),
(25, 'Gà nấu tiêu xanh', 'Gà nấu tiêu xanh có thịt gà săn chắc, thấm đều gia vị, có vị ngọt béo, nước dùng đậm đà hấp dẫn và có vị cay nồng thơm ngon khó cưỡng. Bạn có thể nhúng lẩu các loại rau, nấm mình yêu thích và ăn kèm lẩu với bún tươi hoặc mì gói, rất thích hợp cho những ngày mưa se lạnh đấy!', 8, 250000, 230000, 'foods/tOFzy0EHe9C0kNBEJiRrxKZHe8Z1UmhYKdC1JBpV.jpg', 'ga-nau-tieu-xanh', 8, '2025-02-03 12:16:09', '2025-02-05 06:58:45'),
(26, 'Gà bó xôi', 'Gà bó xôi là một trong những món từ gà mà bạn sẽ cảm thấy thích thú khi thưởng thức. Gà bó xôi không chỉ có vị ngon ngọt tự nhiên của thịt gà mà còn có độ giòn và thơm đặc trưng từ gạo nếp.', 5, 260000, 260000, 'foods/V4uCpMpjjj1WS5tCt5y1ZBHobwJFeMtUIZl0jzzs.jpg', 'ga-bo-xoi', 8, '2025-02-03 12:17:09', '2025-02-05 06:59:33'),
(27, 'Gà hấp mía', 'Gà hấp mía là một món ăn truyền thống độc đáo, mang hương vị ngọt ngào, thanh mát từ mía và vị đậm đà của thịt gà. Món ăn này không chỉ hấp dẫn về hương vị mà còn rất bổ dưỡng, phù hợp cho các bữa tiệc gia đình hay những dịp đặc biệt.', 9, 280000, 210000, 'foods/bxcfULdPsYsItlp28kQz1pB4FFMChgMdTIcmodsc.jpg', 'ga-hap-mia', 8, '2025-02-03 12:18:43', '2025-02-05 07:00:04'),
(28, 'Coca', 'Coca', 30, 10000, 10000, 'foods/HCQ758eqyTaCjhH2ljyvRQASqq1CAflFwrzByjtQ.jpg', 'coca', 7, '2025-02-03 12:21:01', '2025-02-03 12:21:01'),
(29, 'Nước trái cây', 'Nước trái cây', 25, 15000, 15000, 'foods/INB86zH2g6A99VlJkhK5nWGXryWCEYhaG195pJXs.jpg', 'nuoc-trai-cay', 7, '2025-02-03 12:23:25', '2025-02-03 12:23:42'),
(30, 'Mirinda', 'Mirinda', 30, 10000, 10000, 'foods/B2tjur9wAYGnyeS4LzrzqO22nTPCBQLPcIclXhba.jpg', 'mirinda', 7, '2025-02-03 12:27:38', '2025-02-03 12:27:38'),
(31, 'Rượu gạo', 'Rượu gạo', 30, 17000, 17000, 'foods/iGP7nmdejK8ONTNrqBbtl0JsiSitsB7mZiq93yGi.jpg', 'ruou-gao', 9, '2025-02-03 12:31:47', '2025-02-03 12:32:08'),
(32, 'Rượu soju', 'Rượu soju', 30, 70000, 70000, 'foods/PjERTGNwLe1diPp03RcVWzkBPxDwkGcnI53J8qUC.jpg', 'ruou-soju', 9, '2025-02-03 12:33:47', '2025-02-03 12:42:57'),
(33, 'Chivas 18', 'Chivas 18', 10, 1250000, 1250000, 'foods/R9gZsdVlxo59scqcX4s41GrLAZDMhUgy00flUmtu.jpg', 'chivas-18', 9, '2025-02-03 12:36:23', '2025-02-03 12:36:23'),
(34, 'Chivas 12', 'Chivas 12', 10, 800000, 800000, 'foods/odN4RBouDVj9GXXpvUJMkhB4dgwpe8vShsHVwDVE.jpg', 'chivas-12', 9, '2025-02-03 12:37:52', '2025-02-03 12:37:52'),
(35, 'Lẩu gà lá é', 'Lẩu gà lá é là đặc sản của Đà Lạt (Lâm Đồng). Việc thưởng thức nồi lẩu đủ vị như vị ngọt thanh, vị chua của măng, vị thơm của nấm và đặc biệt là hương thơm đặc trưng của lá é giữa trời đông khá thú vị. Lá é là loại rau gia vị, thuộc loài húng quế và có nhiều tên gọi khác nhau như é trắng, húng trắng', 10, 350000, 350000, 'foods/ER6MdoVRoD5UKaZBpap8GjPJxU7pKsQ87dYPPy4K.jpg', 'lau-ga-la-e', 5, '2025-02-03 12:39:20', '2025-02-05 07:02:19'),
(36, 'Lẩu gà lá giang', 'Lẩu gà lá giang là một món ăn rất quen thuộc với những người dân Nam Bộ nói riêng và là một món ăn được rất nhiều người dân Việt Nam yêu thích trên khắp mọi miền. Với vị chua chua đặc trưng, lẩu gà lá giang giúp kích thích vị giác và làm cho người dùng mỗi khi thưởng thức xong không thể quên được món lẩu đặc biệt này', 8, 280000, 280000, 'foods/mLSnTcoXUjG6yzq0hGPA3pP7Ye7Q7oyGGuAeykOI.jpg', 'lau-ga-la-giang', 5, '2025-02-03 12:41:11', '2025-02-05 07:02:01'),
(37, 'Lẩu gà chua cay', 'Nguyên liệu làm Lẩu gà Thái chua cay:\r\n Thịt gà 1.5 kg,\r\n Tỏi 5 gr,\r\n Hành tím 5 gr,\r\n Sả 20 gr,\r\n Chanh 1 trái,\r\n Cà chua 1 trái,\r\n Hành tây 1 củ,\r\n Ớt 4 trái,\r\n Tương ớt 1 muỗng canh,\r\n Tương cà 1 muỗng canh,\r\n Dầu màu điều 1 muỗng canh,\r\n Rau ăn kèm 400 gr', 9, 250000, 250000, 'foods/S8BHFfGBlZF81eSMSMbkBjVksKwBgQjbsWBntmJD.jpg', 'lau-ga-chua-cay', 5, '2025-02-03 12:42:04', '2025-02-05 07:06:37'),
(38, 'Xúc xích', 'Xúc xích', 100, 10000, 10000, 'foods/SG3RAVRwIx1iPraBsRKOqOEBhSGQRbP2q0QbKFHw.jpg', 'xuc-xich', 4, '2025-02-03 12:45:01', '2025-02-03 12:45:01'),
(39, 'nem chua rán', 'Nem chua rán', 20, 45000, 45000, 'foods/qKqXjztqVPYbAWd1UK63zRCn5pZfMh3qec9Q5T42.jpg', 'nem-chua-ran', 4, '2025-02-03 12:46:26', '2025-02-03 12:46:26'),
(40, 'Khoai tây chiên', 'Khoai tây chiên', 19, 35000, 35000, 'foods/yLhfi0oK4M6xFfQWIQDGLhzzeF8UZwZZLxPv9tIC.jpg', 'khoai-tay-chien', 4, '2025-02-03 12:47:19', '2025-02-03 12:48:25'),
(41, 'Khoai lang kén', 'Khoai lang kén', 26, 35000, 35000, 'foods/lC1YAGvKdh2lpfAtY87aEXvBlIDUvx6ID4W5IXM1.jpg', 'khoai-lang-ken', 4, '2025-02-03 12:48:08', '2025-02-05 03:38:55'),
(42, 'Heineken', 'Heineken', 30, 21000, 21000, 'foods/CYO8KpBxjTYw0VHT0NUK6To8iTiO4BoyCGs15zn7.jpg', 'heineken', 10, '2025-02-03 12:50:21', '2025-02-03 12:50:21'),
(43, 'Tiger bạc', 'Tiger bạc', 20, 17000, 17000, 'foods/cveEyLBDkDy4Ik3c65nakB3Lk9aOYLXWn7PeUYGZ.jpg', 'tiger-bac', 10, '2025-02-03 12:52:11', '2025-02-05 06:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(86, '2024_06_14_114115_create_categories_table', 2),
(87, '2024_06_14_114203_create_food_table', 2),
(88, '2024_06_14_153907_create_news_table', 2),
(89, '2024_06_14_154916_create_tables_table', 2),
(90, '2024_06_14_161010_create_orders_table', 2),
(91, '2024_06_14_163419_create_detail_orders_table', 3),
(93, '2024_06_14_164423_create_configs_table', 4),
(94, '2024_06_23_052138_add_status_to_tables', 5),
(95, '2024_06_23_055228_add_status_to_users', 6),
(96, '2024_06_23_063427_create_contacts_table', 7),
(97, '2024_07_06_075055_create_wishlists_table', 8),
(98, '2024_07_06_161800_update_orders_table', 9),
(100, '2024_07_08_034352_update_customer_order', 10);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `slug` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `content`, `image`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'Chia sẻ bí kíp luộc gà', '<h2><strong>Cách làm</strong></h2><p>Gà luộc cùng với bánh chưng, dưa hành, nem rán... là những món ăn truyền thống của người Việt, đặc biệt là trong dịp lễ Tết, hiếu hỉ. Gà trống hoa thường được lựa chọn trong các mâm cúng dịp này vì gắn với thần thoại xưa \'\'gà gọi mặt trời\'\' với ý nghĩa đánh thức vạn vật sinh sôi, thuận hòa.</p><p>Nguyên liệu và cách làm gà luộc khá đơn giản nhưng để có thành phẩm con gà cúng Tết vàng ươm, căng bóng, da giòn bên ngoài, ngọt mềm không đỏ bên trong, đùi không bị tụt da... đòi hỏi sự tỉ mỉ và các bí quyết.</p><p>&nbsp;</p><figure class=\"image\"><img style=\"aspect-ratio:750/750;\" src=\"https://i1-giadinh.vnecdn.net/2021/07/07/ga-1-8547-1612167341-7052-1625644473.jpg?w=0&amp;h=0&amp;q=100&amp;dpr=2&amp;fit=crop&amp;s=m3to4PWYidfaV0viUjKohA\" width=\"750\" height=\"750\"></figure><p>&nbsp;</p><p>Gà trống hoa thường được lựa chọn trong các mâm cúng dịp Lễ tết vì gắn với thần thoại xưa \'\'gà gọi mặt trời\'\' với ý nghĩa đánh thức vạn vật sinh sôi, thuận hòa. Ảnh: <i>Bùi Thủy.</i></p><p><strong>1. Sơ chế gà</strong></p><p>- Gà làm sạch, nhẹ nhàng xát với muối hạt và chanh để khử mùi, rửa lại bằng nước sạch (chú ý đừng xát mạnh làm rách da). Lòng mề bóp muối, chanh rửa sạch.</p><p>- Khéo léo dựng cổ gà lên, kẹp vào giữa hai cánh, dùng lạt mềm để buộc cánh.</p><p><strong>2. Luộc gà</strong></p><p>- Cho gà, lòng mề đã làm sạch vào nồi sâu lòng, đế dày, đổ nước lạnh vào ngập gà là tốt nhất. Không nên cho tiết gà vào lúc này vì dễ làm gà có váng đen. Cũng không nên luộc nồi đế mỏng vì dễ bén dính da gà.</p><p>- Thêm muối/bột canh, hạt nêm, hành tím, phần gốc trắng của hành lá vào nồi nước luộc gà để thơm ngon, đậm vị hơn.</p><p>- Bật lửa và đun sôi. Khi nước sôi, bạn nhanh chóng cho vào một bát nước lạnh vào để hạ nhiệt, giúp da gà không nứt, đồng thời vớt bọt, nhỏ lửa và tiếp tục luộc gà trong nước sôi lăn tăn khoảng 5-7 phút (tùy theo kích thước gà lớn hay bé). Vớt lòng, mề gà ra vì bộ phận này nhanh chín.</p><p>- Tắt bếp, đậy vung om gà từ 15-20 phút tùy vào khối lượng gà to hay nhỏ. Đây là cách giúp gà \'\'ngậm nước\'\' sẽ chín đều, ngọt mềm, mọng nước, da không bị nứt, đùi không bị tụt da, xương không bị đỏ.</p><p>- Sau đó, vớt gà ra cho vào thau đựng nước sôi để nguội ngâm chút đá viên và rửa gà sạch sẽ, để ráo, thấm khô. Đây là cách giúp da gà săn, giòn.</p><p>- Để tránh gà gặp gió có thể bị thâm, nên lấy một khăn xô (vải mỏng) ẩm, ủ kín một lúc để da bóng mượt.</p><p>- Quay trở lại nồi nước luộc, lúc này mới cho tiết vào luộc chín, vớt ra.</p><p><i>Trong lúc đó làm mỡ gà nghệ</i></p><p>- Nghệ tươi rửa sạch, giã dập. Cho phần mỡ gà vào chảo rán cho tới khi chảy nước, thêm nghệ tươi giã dập và chút hành tím vào phi thơm và đảo đều. Sau đó, lọc qua rây lấy nước mỡ nghệ vàng ươm, Tắt bếp, để nguội.</p><p>- Dùng chổi chuyên dụng hoặc đeo găng tay nilon phết/bôi đều mỡ nghệ lên khắp mình gà sẽ giúp cho da vàng ươm Đặc biệt dù để cúng lâu thì gà vẫn mướt, căng bóng, không bị khô.</p><p><i>d) Bày gà ra đĩa kèm bộ lòng.</i></p><p>Như vậy là bạn đã có một con gà luộc cúng đẹp mắt, thơm ngon, da căng bóng, vàng ươm với ý nghĩa chào đón một năm mới nhiều tài lộc, thuận hòa.</p><p><i>* Một số lưu ý:</i></p><p>- Nếu tận dụng nước dùng để làm bún thang, phở gà thì không nên cho hạt nêm, vì hạt nêm làm từ xương dễ làm đục nước dùng.</p><p>- Nếu dùng nước luộc gà để nấu miến măng hoặc canh bóng thì không nên cho gừng vì mùi gừng sẽ lấn át các nguyên liệu khác.</p>', 'news/fNFXS27Z494C6pJSGPfri4djOnlGNc3As54iXANc.jpg', 'chia-se-bi-kip-luoc-ga', 8, '2025-02-03 12:57:52', '2025-02-03 12:57:52'),
(6, 'Bí kíp hấp gà', '<figure class=\"image\"><img style=\"aspect-ratio:1920/1280;\" src=\"https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:quality(100)/2024_2_25_638444749330609419_bi-quyet-cach-lam-ga-hap-hanh-1.png\" alt=\"Bí quyết cách làm gà hấp hành thơm lừng, ngọt thịt để cả gia đình thưởng thức \" width=\"1920\" height=\"1280\"></figure><h2><strong>1. Nguyên liệu cần chuẩn bị</strong></h2><ul><li>Gà ta nguyên con: 1.5kg</li><li>Hành lá: 12 nhánh</li><li>Sả tươi: 2 củ</li><li>Hành tím: 3 củ</li><li>Gừng tươi: 1 củ</li><li>Bột nghệ: 1/2 thìa cà phê</li><li>Tiêu: 1/2 thìa cà phê</li><li>Bột ngọt: 1/2 thìa cà phê</li><li>Hạt nêm: 1 thìa cà phê</li><li>Đường: 1 thìa cà phê</li><li>Bột canh: 1/2 thìa</li><li>Dụng cụ để nấu: Xửng hấp, tô, chén, muỗng đũa,..</li></ul>', 'news/BcRC7DUmrirjtSqaBS0SgtvUlAeDD08umFIclHGX.png', 'bi-kip-hap-ga', 8, '2025-02-03 13:00:53', '2025-02-03 13:00:53'),
(7, 'Giới thiệu Chivas 12', '<figure class=\"image\"><img style=\"aspect-ratio:600/600;\" src=\"https://winevn.com/wp-content/uploads/2020/09/R%C6%B0%E1%BB%A3u-Chivas-12-1.jpg\" alt=\"Rượu Chivas 12\" width=\"600\" height=\"600\"></figure><h2><strong>Giới Thiệu Về Rượu Chivas 12</strong></h2><p>Chivas 12 được ra đời năm 1801 bởi John và James Chivas. Rượu có nồng độ 40%. Đây là sản phẩm chứa nhiều lớp Whisky mạch nha và lúa mạch, được chưng cất từ nhiều vùng khắp đất nước Scotland.</p><p>Rượu có thiết kế dáng thuôn tròn cổ điển từ trên xuống dưới với phần dưới phình to ra. Rượu có màu vàng rực rỡ và là hỗn hợp của nhiều loại rượu Whisky có tuổi trưởng thành được ngâm ủ ít nhất 12 năm trong những thùng gỗ sồi. Khi mở nắp chai, bạn sẽ bị chinh phục hoàn toàn bởi hương thơm quyến rũ lan tỏa kết hợp giữa cây thạch nam, thảo mộc hoang dã cùng mật ong và trái cây vườn thơm mát.</p><p>Chivas 12 có vị nồng nàn, trọn vẹn của mật ong, kem, táo chín với hương vani, kẹo bơ và quả hạch nâu. Rượu rất thích hợp để làm quà tặng, quà biếu vào những dịp Lễ, Tết hoặc dùng làm đồ uống trong các cuộc sum họp bạn bè, gia đình…Sự kết hợp hài hòa của vị cam cùng chút hăng hăng của gỗ sồi trong công thức đặc biệt truyền từ thế hệ này sang thế hệ khác đã tạo nên một chai rượu có hương vị đặc trưng không dễ lẫn.</p><p>Chỉ với một mức giá bình dân (khoảng 630.000VNĐ/1 chai) bạn đã có thể sở hữu một chai rượu ngoại như ý. Đây được nhận định là một mức giá quá hời cho một chai rượu ngon và chất lượng với 12 năm tuổi. Rượu mang đến hương vị ngọt lịm kết hợp của trái cây với màu vàng hổ phách đặc trưng. Tại Việt Nam, nó là dòng rượu phổ biến và được yêu thích nhất hiện nay. Đó chính là nhờ giá cả rẻ hơn khá nhiều so với những người đàn anh của mình nhưng độ tuổi và hương vị lại không hề thua kém.</p><p>Được biết đến là người anh cả trong dòng họ Chivas Regal, Rượu mang hương vị đặc trưng của nhà Chivas.Trải qua nhiều thăng trầm lịch sử trong suốt quá trình hình thành và phát triển, đến nay rượu đã trở thành thức uống phổ biến và không thể thiếu trên thế giới. Từ một thức uống vùng miền, đến nay nó đã trở thành thương hiệu nổi tiếng toàn cầu.</p>', 'news/PUDjQmpZPrZWFVr5px6TPBhnLS11Joq4wmxFNbGG.jpg', 'gioi-thieu-chivas-12', 9, '2025-02-03 13:08:58', '2025-02-03 13:08:58'),
(8, 'Giới thiệu Chivas 18', '<figure class=\"image\"><img style=\"aspect-ratio:700/717;\" src=\"https://ruoungoaigiasi.vn/image/catalog/san-pham/chivas/chivas-18/chivas-18-nam-mau-moi-ruou-ngoai-gia-si.vn.png\" width=\"700\" height=\"717\"></figure><p><strong>RƯỢU CHIVAS 18 NĂM GOLD SIGNATURE :</strong></p><p><a href=\"https://ruoungoaigiasi.vn/ruou-chivas/chivas-18.html\">Chivas 18 năm gold signature</a> được Pecnod Ricard là chủ sở hữu của thương hiệu rượu Chivas Brothers nhập khẩu trực tiếp và phân phối tại thị trường Việt Nam thông qua các đại lý và các cửa hàng giới thiệu sản phẩm của mình.</p><p><strong>Rượu Chivas 18 năm&nbsp;gold signature</strong>&nbsp;là sự lựa chọn và pha trộn một cách tỷ mỷ và sành điệu các loại Rượu Whisky của chuyên gia pha chế rượu lừng danh Colin Scott. Nó là sản phẩm chứa nhiều lớp Whisky Lúa mạch và Whisky Mạch nha khác nhau được chưng cất từ nhiều vùng khắp Scotland. Một sản phẩm Rượu Whisky pha trộn cao cấp đang chờ được khám phá.</p><p>Năm 2020, Hãng Chivas Regal đã tích hợp tem quét mã <strong>QR code</strong> để khách hàng phân biệt rượu thật giả, tạo lòng tin khi mua rượu Chivas chính hãng.</p>', 'news/o5oWKWOxWwVQqvZ9BykMVPFZSkdzHLLFxzOlBId7.jpg', 'gioi-thieu-chivas-18', 9, '2025-02-03 13:10:19', '2025-02-03 13:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `people` int(11) NOT NULL DEFAULT 1,
  `payment` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `amount` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `table_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time_order` datetime DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `people`, `payment`, `status`, `amount`, `user_id`, `table_id`, `created_at`, `updated_at`, `time_order`, `fullname`, `phone`) VALUES
(23, '0E09XEKG9D', 8, 1, 2, 220000, 1, 5, '2025-01-04 14:50:11', '2025-01-04 14:56:54', '2025-01-05 21:00:00', NULL, NULL),
(24, 'ESC1F191AY', 5, 0, 0, 810000, 1, 5, '2025-01-04 14:53:37', '2025-02-04 12:31:22', '2025-01-06 20:30:00', NULL, NULL),
(26, 'SQ3C1XFJPA', 5, 1, 2, 163000, 1, 5, '2025-01-05 02:34:20', '2025-01-05 02:46:09', '2025-01-09 12:00:00', NULL, NULL),
(27, 'BBG3FL3440', 5, 0, 1, 351000, 8, 5, '2025-01-05 02:53:46', '2025-01-06 12:26:13', '2025-01-14 16:00:00', NULL, NULL),
(32, 'KY8TWSBTJU', 5, 0, 0, 743000, 1, 5, '2025-01-06 12:14:30', '2025-02-04 12:31:18', '2025-01-23 21:00:00', NULL, NULL),
(33, '8K8AGDP7PL', 5, 1, 2, 145000, 9, 5, '2025-01-06 12:38:52', '2025-01-06 12:44:42', '2025-01-14 20:30:00', NULL, NULL),
(34, 'ZS97JB7GWT', 5, 1, 2, 80000, 9, 4, '2025-01-06 14:29:58', '2025-01-08 07:08:58', '2025-01-22 21:00:00', NULL, NULL),
(35, 'KHSRQH7WW5', 5, 1, 2, 100000, 1, 5, '2025-01-08 06:51:35', '2025-01-08 07:10:52', '2025-01-22 12:00:00', NULL, NULL),
(36, '0DHZ3ADG0V', 5, 0, 0, 240000, 9, 5, '2025-01-15 06:06:45', '2025-02-04 12:20:01', '2025-01-16 15:30:00', NULL, NULL),
(37, 'PX6PL3ODTA', 7, 0, 0, 0, 1, 5, '2025-01-15 06:24:41', '2025-01-15 06:25:05', '2025-01-22 20:30:00', NULL, NULL),
(38, 'YL3N35GZY0', 10, 1, 2, 560000, 9, 6, '2025-02-05 01:17:43', '2025-02-05 01:21:47', '2025-02-05 10:00:00', NULL, NULL),
(39, 'S8WSLEMSDZ', 20, 0, 0, 0, 1, 10, '2025-02-05 01:22:18', '2025-02-05 01:22:43', '2025-02-05 10:30:00', NULL, NULL),
(40, 'R01PY86EKQ', 5, 1, 2, 390000, 1, 7, '2025-02-05 03:34:05', '2025-02-05 03:40:13', '2025-02-06 11:00:00', NULL, NULL),
(41, 'N92D2TIML6', 5, 0, 1, 170000, 1, 8, '2025-02-05 03:41:36', '2025-02-05 06:25:09', '2025-02-07 21:00:00', NULL, NULL),
(42, '6Z6NYUHLSC', 5, 0, 1, 0, 10, 8, '2025-02-05 03:44:14', '2025-02-05 03:44:14', '2025-02-07 20:00:00', NULL, NULL),
(43, 'D1VOTCJGKE', 5, 0, 1, 0, 10, 7, '2025-02-05 03:44:50', '2025-02-05 03:44:50', '2025-02-07 21:00:00', NULL, NULL),
(44, '87LYKO18XD', 5, 0, 1, 0, 1, 5, '2025-02-09 16:57:03', '2025-02-09 16:57:03', '2025-02-06 00:30:00', NULL, NULL),
(45, 'A1V4GF3NMQ', 5, 0, 1, 0, 1, 10, '2025-02-09 16:58:21', '2025-02-09 16:58:21', '2025-02-06 21:00:00', NULL, NULL),
(46, 'ZZNKACUV81', 5, 0, 1, 0, 1, 6, '2025-02-09 17:00:26', '2025-02-09 17:00:26', '2025-02-07 16:00:00', NULL, NULL),
(47, 'FR42J70DNQ', 5, 0, 1, 0, 1, 9, '2025-02-09 17:12:24', '2025-02-09 17:12:24', '2025-02-11 16:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `content` text NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `content`, `food_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 5, 'Món ăn ngon gia vị vừa đủ', 26, 9, '2025-02-05 01:41:12', '2025-02-05 08:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `address`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Bình dân 1', 'Tầng 1', 8, 0, '2024-06-22 22:27:16', '2025-02-04 12:25:00'),
(5, 'VIP 1', 'Tầng 1', 10, 0, '2025-01-04 14:49:07', '2025-02-04 12:23:21'),
(6, 'VIP 2', 'Tầng 1', 10, 0, '2025-02-04 12:22:31', '2025-02-04 12:25:14'),
(7, 'Bình dân 2', 'Tầng 1', 8, 0, '2025-02-04 12:26:15', '2025-02-04 12:26:15'),
(8, 'Bình dân 3', 'Tầng 1', 6, 0, '2025-02-04 12:26:37', '2025-02-04 12:26:37'),
(9, 'Phòng bàn ghép 1', 'Tầng 2', 20, 0, '2025-02-04 12:27:22', '2025-02-04 12:27:22'),
(10, 'Phòng bàn ghép 2', 'Tầng 2', 20, 0, '2025-02-04 12:27:39', '2025-02-09 17:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `role`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 'Khách Trực Tiếp', 'khachtructiep@gmail.com', NULL, '0555666888', 1, 1, '$2y$10$tkOwHK6UxxCCs19y5jX9x./Q7rYfva08JnAttEl7p/zZM/7jnI8AC', NULL, '2024-12-10 03:49:52', '2024-12-10 03:49:52'),
(1, 'Quang Huy', 'admin@gmail.com', NULL, '0399570205', 1, 1, '$2y$10$pcvNQAYd/80Icm7h8n/RPusHs9ajv95DUQF0Ndb2K4sDfHEKEnB/e', NULL, '2024-12-15 11:06:02', '2025-02-05 03:20:57'),
(6, 'Thanh Huyền', 'huyen17@gmail.com', NULL, '0385245164', 0, 1, '$2y$10$3aTueiLgAxpR..2BqRVSbO.hXeXMMKYdsGNnLP4/QUL7FOBACuaAG', NULL, '2024-12-17 07:28:18', '2024-12-17 07:28:18'),
(7, 'Nguyễn Quang Huy', 'huypeos2002@humg.edu.vn', NULL, '0399570250', 0, 1, '$2y$10$O0j5S0kiUyZIKKldZHxmcOGHc0i4DjolCP8tTCLYzdJD93F0BpJtq', NULL, '2025-01-04 08:27:28', '2025-01-04 08:27:28'),
(8, 'Huy', 'h@gmail.com', NULL, '0399202540', 0, 1, '$2y$10$vYhQqsPAXMJZvv3SMSZzz.kE7W7exchXWjTl7EgAJ0lI3t1PJMfBi', NULL, '2025-01-05 02:53:00', '2025-01-05 02:53:00'),
(9, 'Nguyễn Quang Huy', 'h1@gmail.com', NULL, '087655698', 0, 1, '$2y$10$Ww8cNcLVQ.TC29T9fUy3TeSFSYJZX1.oFpKUHUT5WR7cpVtwnf11q', NULL, '2025-01-06 12:37:35', '2025-01-12 14:45:01'),
(10, 'hiếu', 'hi@gmail.com', NULL, '036734567', 0, 1, '$2y$10$7EInixH5fRRdJ0pnEhsXgODs1iI0Ktv5oqQK0q9gQ13dxOsgocBG.', NULL, '2025-02-05 03:42:43', '2025-02-05 03:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_order_id_foreign` (`order_id`),
  ADD KEY `detail_orders_food_id_foreign` (`food_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_table_id_foreign` (`table_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_id` (`food_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_food_id_foreign` (`food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
