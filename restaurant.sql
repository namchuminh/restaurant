-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 07:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
(3, 'Món Nhậu', 'categories/rDOFgkzXogFTpxMpewCCfgDkW2iyY2jS12UOASoQ.png', 'mon-nhau', '2024-06-14 23:55:48', '2024-06-14 23:55:48'),
(4, 'Món Ăn Nhanh', 'categories/FShKG7y9GL9AP5BtcVSBfWAQ2XCHOxLJgVTlHkQ9.png', 'mon-an-nhanh', '2024-06-14 23:56:33', '2024-06-14 23:56:33'),
(5, 'Món Lẩu', 'categories/duCRLB2W4TwgYtH3QCEs9m4cjejKTUEQJuMcCZke.png', 'mon-lau', '2024-06-15 04:40:42', '2024-06-15 04:41:17');

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
(1, 'Web nhà hàng ABCD', 'Hệ thống nhà hàng abcde', '/storage/images/kF7iRNqP1iVa61u4yqZwEUcBjbjxkgLB2otJSMry.svg', '/storage/images/xR6unia4KHgL4INmvghnlvNQVBukDLnAtw0kcbKq.png', '0379962045', 'nhahang@gmail.com', 'Cầu Giấy, Hà Nội', '2024-06-23 07:46:43', '2024-07-03 13:54:41');

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
(1, 1, 'Liên hệ mẫu', 2, '2024-06-23 06:39:11', '2024-06-23 06:39:14'),
(5, 1, 'ABCDE', 3, '2024-07-05 04:25:35', '2024-07-05 04:25:35'),
(6, 3, 'Đặt số lượng 10 bàn vào ngày 10 tháng 5 nhé', 3, '2024-07-05 04:26:23', '2024-07-05 04:26:23');

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
(1, 'Đậu Tẩm Hành', 'Món đậu tẩm hành gfdsafgdfssdg', 15, 50000, 21000, 'food/myqOJkQmQ1oV7fyS3WY3TxwEReeKjBgm2plpfFmU.png', 'dau-tam-hanh', 4, '2024-06-15 04:08:58', '2024-06-15 04:42:14'),
(3, 'Món Nhậu Ngon Mùa Hè', 'abcde', 14, 50000, 20000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-nhau-ngon-mua-he', 3, '2024-07-02 22:03:23', '2024-07-02 22:03:23'),
(4, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(5, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(6, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(7, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(8, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(9, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(10, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(11, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(12, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(13, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(14, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(15, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(16, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(17, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(18, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(19, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(20, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07'),
(21, 'Món mới 2', 'Món mới 2', 15, 150000, 120000, 'foods/HGnzdsydAVtyNHtgYoc6TK4RjCCDfYHl329XMk87.jpg', 'mon-an-2', 3, '2024-07-03 06:35:07', '2024-07-03 06:35:07');

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
(98, '2024_07_06_161800_update_orders_table', 9);

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
(2, 'Thiếu vitamin D ảnh hưởng đến trí nhớ thế nào', '<p>Bác sĩ chuyên khoa 2 Huỳnh Tấn Vũ, Đơn vị Điều trị Ban ngày, Bệnh viện Đại học Y Dược TP.HCM - cơ sở 3, cho biết hiện nay xu hướng \"ăn sáng giờ trưa\" hay ăn sáng kết hợp trưa trong một bữa, đang trở nên phổ biến, đặc biệt là trong giới trẻ và những người làm việc văn phòng. Theo nhiều người, điều này giúp tiết kiệm thời gian, chi phí và có tác dụng giảm cân vì \"nhịn ăn gián đoạn\". Tuy nhiên, không phải ai cũng phù hợp với phương pháp này. Việc bỏ <a href=\"https://thanhnien.vn/bua-sang-tags493619.html\">bữa sáng</a> có thể gây ra nhiều tác động tiêu cực đến sức khỏe đối với một số người.</p><h2><strong>Ảnh hưởng đến năng lượng, tinh thần</strong></h2><p>Bữa sáng giúp tái cung cấp năng lượng cho cơ thể sau một khoảng thời gian dài qua đêm, giúp não và cơ thể được cung cấp nguồn năng lượng cho một ngày mới làm việc hoặc học tập hiệu quả.</p><p>\"Việc ăn sáng trễ có thể khiến cơ thể không phục hồi dự trữ glycogen (vai trò chất dự trữ năng lượng cho cơ thể) sau một đêm gây hạ đường huyết. Cùng với đó, có thể khiến cơ thể cảm thấy <a href=\"https://thanhnien.vn/met-moi-tags1179769.html\">mệt mỏi</a>, lo lắng, bồn chồn và không tập trung trong công việc hoặc học tập. Hiệu suất làm việc vì thế cũng giảm sút đáng kể\", bác sĩ Vũ chia sẻ.</p><p><a href=\"https://images2.thanhnien.vn/528068263637045248/2024/6/14/c8389972-7c8b-4f29-ad17-f6e626d3e2fc-17183362736511585348882.jpg\"><img src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/6/14/c8389972-7c8b-4f29-ad17-f6e626d3e2fc-17183362736511585348882.jpg\" alt=\"Bác sĩ nói gì về thói quen ăn sáng kết hợp trưa trong một bữa?- Ảnh 1.\" width=\"1276\" height=\"956\"></a></p><h2><strong>Tăng nguy cơ ăn quá nhiều vào các bữa khác</strong></h2><p>Với những người coi bữa sáng là chủ đạo, việc hạn chế hoặc thậm chí nhịn ăn sáng có thể giúp họ giảm cân. Tuy nhiên, đối với những người ăn chính vào bữa trưa và tối thì việc nhịn bữa sáng có thể khiến họ ăn uống nhiều hơn vào bữa trưa, tối và chọn các thực phẩm không lành mạnh, dẫn đến việc tích tụ mỡ thừa và tăng cân.</p><h2><strong>Tăng nguy cơ mắc các bệnh mạn tính</strong></h2><p>Một số nghiên cứu cho thấy bỏ bữa sáng có thể làm tăng nguy cơ mắc bệnh tim mạch, cao huyết áp và tiểu đường loại 2.</p><h2><strong>Thiếu hụt chất dinh dưỡng và vitamin</strong></h2><p>Một nghiên cứu năm 2014 về tác động của bữa sáng đối với trẻ em và thanh thiếu niên. Kết quả cho thấy những người không ăn sáng sẽ thiếu vitamin D, vitamin A, canxi, sắt và magie, phốt pho và kẽm, có thể dẫn đến mất ngủ, trầm cảm, tăng nguy cơ mắc nhiễm trùng... Lâu dài khiến sức khỏe giảm sút, dễ mắc bệnh hơn.</p><figure class=\"image\"><img style=\"aspect-ratio:1280/960;\" src=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/6/14/9adc24a7-c21a-48bb-8120-e678ae27c1d7-1718336538793200122305.jpg\" alt=\"Bác sĩ nói gì về thói quen ăn sáng kết hợp trưa trong một bữa?- Ảnh 2.\" srcset=\"https://images2.thanhnien.vn/thumb_w/640/528068263637045248/2024/6/14/9adc24a7-c21a-48bb-8120-e678ae27c1d7-1718336538793200122305.jpg 1x,https://images2.thanhnien.vn/528068263637045248/2024/6/14/9adc24a7-c21a-48bb-8120-e678ae27c1d7-1718336538793200122305.jpg 2x\" sizes=\"100vw\" width=\"1280\" height=\"960\"></figure><p>Không ăn sáng và sau đó tiêu thụ một lượng lớn thức ăn vào buổi trưa khiến một số người có thể gặp vấn đề về tiêu hóa</p><p>LÊ CẦM</p><h2><strong>Gây ra vấn đề về hệ tiêu hóa</strong></h2><p>Không ăn sáng và sau đó tiêu thụ một lượng lớn thức ăn vào buổi trưa khiến một số người có thể gặp vấn đề về tiêu hóa như trào ngược <a href=\"https://thanhnien.vn/da-day-tags525250.html\">dạ dày</a>,&nbsp;đau bụng, viêm loét dạ dày,… Nhịn ăn sáng không chỉ khiến cơ thể bị bỏ đói, căng thẳng mà còn làm kích thích hệ tiêu hóa khiến cho thói quen đi vệ sinh hằng ngày bị thay đổi gây chứng tiêu chảy, buồn nôn hoặc bị táo bón.</p><p>Ở góc độ giảm cân, theo bác sĩ Vũ mặc dù một số người có thể giảm cân khi chỉ ăn 2 bữa mỗi ngày, nhưng điều này không đảm bảo hiệu quả và bền vững cho tất cả mọi người. Việc giảm cân phụ thuộc vào nhiều yếu tố, bao gồm tổng lượng calo tiêu thụ, chất lượng thực phẩm, mức độ hoạt động thể chất và lối sống tổng thể. Nếu cần, nên tham khảo ý kiến của bác sĩ hoặc chuyên gia dinh dưỡng để có kế hoạch giảm cân phù hợp và an toàn.</p>', 'news/i9IuqDlMJDqMkUZtWs589BvbzYHiCqcemstJqXQK.png', 'thieu-vitamin-d-anh-huong-den-tri-nho-the-nao', 4, '2024-06-15 02:55:16', '2024-06-15 03:14:48'),
(3, 'Bài viết mới', 'Bài viết mới', 'news/i9IuqDlMJDqMkUZtWs589BvbzYHiCqcemstJqXQK.png', 'bai-biet-moi', 5, '2024-07-04 15:38:42', '2024-07-04 15:38:42');

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
  `time_order` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `people`, `payment`, `status`, `amount`, `user_id`, `table_id`, `created_at`, `updated_at`, `time_order`) VALUES
(1, '9V415KIJPC', 5, 0, 1, 0, 3, 4, '2024-07-06 09:55:22', '2024-07-06 09:55:22', '2024-07-16 20:00:00'),
(2, 'Z71TH6939S', 1, 0, 1, 0, 3, 4, '2024-07-06 10:20:27', '2024-07-06 10:20:27', '2024-07-16 21:30:00'),
(3, 'F25QSU279D', 1, 0, 1, 0, 3, 4, '2024-07-06 10:20:44', '2024-07-06 10:20:44', '2024-07-24 02:30:00'),
(4, '0BAPO41R8Y', 6, 0, 1, 0, 3, 4, '2024-07-06 10:21:16', '2024-07-06 10:21:16', '2024-07-31 03:00:00'),
(5, '7RRTP7B8CG', 3, 0, 1, 0, 3, 4, '2024-07-06 10:22:19', '2024-07-06 10:22:19', '2024-07-29 03:00:00'),
(6, 'U928IWR1ZY', 6, 0, 1, 0, 3, 4, '2024-07-06 10:23:12', '2024-07-06 10:23:12', '2024-08-18 20:00:00'),
(7, '7IVDB82A57', 6, 0, 1, 0, 3, 4, '2024-07-06 10:28:12', '2024-07-06 10:28:12', '2024-07-21 02:30:00');

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
(4, 'Bàn Số 01', 'Tầng 1, Phía Cửa Chính', 6, 0, '2024-06-22 22:27:16', '2024-06-23 01:13:44');

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
(1, 'Admin', 'admin@gmail.com', NULL, '0999888999', 1, 1, '$2y$10$tkOwHK6UxxCCs19y5jX9x./Q7rYfva08JnAttEl7p/zZM/7jnI8AC', NULL, '2024-06-14 11:06:02', '2024-06-23 01:00:58'),
(2, 'Nguyen Van An', 'nguyenvana@gmail.com', NULL, '0999888999', 0, 1, '$2y$10$tkOwHK6UxxCCs19y5jX9x./Q7rYfva08JnAttEl7p/zZM/7jnI8AC', NULL, '2024-06-14 11:07:44', '2024-06-22 23:31:01'),
(3, 'Nguyễn Văn Bình', 'nguyenvanb@gmail.com', NULL, '0666888999', 0, 1, '$2y$10$/PrRVryP2FjYVveVHQuEFO6Mg8Zt.m8iSmfpKy4uoqLH2d2dQeNum', NULL, '2024-07-05 00:40:06', '2024-07-05 00:40:06'),
(4, 'Nam Nguyễn Văn', 'nguyenvannam@gmail.com', NULL, '0444555666', 0, 1, '$2y$10$cGLyYyM8vr1WGC3pTVQoPu/2MkMl4QFostpPyPnyTsuVbxVQtI12u', NULL, '2024-07-05 00:45:39', '2024-07-05 00:45:39');

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
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `food_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-07-06 01:15:06', '2024-07-06 01:15:06');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
