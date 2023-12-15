-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 06:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fithubgym_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(22) NOT NULL,
  `location` varchar(22) DEFAULT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `replytime` varchar(22) DEFAULT NULL,
  `mesreply` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `contact`, `location`, `message`, `status`, `replytime`, `mesreply`, `created_at`, `updated_at`) VALUES
(1, 'dfgsd', 'miltonk288@gmail.com', '01737539213', NULL, 'sdg zxd xdfg zdfgdf', 1, '2023-08-11 12:54 PM', NULL, '2023-08-11 05:36:49', NULL),
(3, 'Sathi', 'Sathiakter@gmail.com', '01777777777', NULL, 'i want to join gym', 1, '2023-09-28 6:33 PM', NULL, '2023-08-13 14:43:35', NULL),
(4, 'Imdadu', 'imdadulhaque330@gmail.com', '01780881330', NULL, '🤦‍♂️', 1, '2023-09-28 6:32 PM', NULL, '2023-08-13 14:45:21', NULL),
(5, 'joya akter', 'joharasathi@gmail.com', '01930379078', 'dhaka', 'want to be a member', 1, '2023-09-25 9:11 PM', NULL, '2023-09-15 08:03:48', NULL),
(6, 'Faiza khan', 'faiza@gmail.com', '01324678866', 'kawla', 'join for your strong body', 1, '2023-10-12 6:53 PM', NULL, '2023-10-12 12:52:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profphoto` varchar(100) NOT NULL,
  `homeshorttext` text NOT NULL,
  `abouttext` longtext NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(22) NOT NULL,
  `contacttwo` varchar(22) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `emailtwo` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `profphoto`, `homeshorttext`, `abouttext`, `address`, `contact`, `contacttwo`, `email`, `emailtwo`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'public/images/fithub.jpg', 'Welcome To Our Fithub Gym Center', '<p>Welcome to Fithub gym center&nbsp;Since it&rsquo;s a inception in 2023, Fithub&nbsp;Gym has strived to provide the ultimate workout experience for all of its members. Fithub&nbsp;Gym recognizes that its members represent all different levels of fitness.&nbsp;Accordingly, whether you are a beginner or an experienced athlete or bodybuilder, we have created an environment in which you can feel comfortable. Our network of health clubs span the globe and house state-of-the-art cardio equipment for the best aerobics workout, weights, group exercise, and in select locations, spas that help you not only relax but also look and feel younger. Our fitness centers are designed to help you achieve your personal fitness goals.</p>\r\n\r\n<p>Fithub&nbsp;Gym&nbsp;is committed to excellence and provides that to all of its members all around the world. Learn more about the history of Fithub&nbsp;Gym&nbsp;and find out what setting fitness goals and meeting them feels like</p>', '1247/Plot No. 39, AIRPORT ROAD, KAWLA, DHAKA', '+088 01780881330', '+088 01305825929', 'fithubgymcenter@gmail.com', 'fithub@gmail.com', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com', 'https://www.youtube.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `memberidno` varchar(22) NOT NULL,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(11) NOT NULL,
  `occupation` varchar(22) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` varchar(22) NOT NULL,
  `reason` varchar(25) NOT NULL,
  `package` varchar(22) NOT NULL,
  `packageamt` int(11) NOT NULL,
  `trainer` varchar(100) DEFAULT NULL,
  `profilestatus` tinyint(1) NOT NULL DEFAULT 0,
  `photo` varchar(100) DEFAULT NULL,
  `addmonth` varchar(22) NOT NULL,
  `change_weight` varchar(22) NOT NULL,
  `paid_month` varchar(22) DEFAULT NULL,
  `due_amount` int(1) NOT NULL DEFAULT 0,
  `paymethod` varchar(22) DEFAULT NULL,
  `deny_remarks` text DEFAULT NULL,
  `deny_date` varchar(25) DEFAULT NULL,
  `exmember` tinyint(1) NOT NULL DEFAULT 0,
  `exmember_date` varchar(22) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `memberidno`, `fname`, `lname`, `contact`, `email`, `address`, `gender`, `occupation`, `weight`, `height`, `reason`, `package`, `packageamt`, `trainer`, `profilestatus`, `photo`, `addmonth`, `change_weight`, `paid_month`, `due_amount`, `paymethod`, `deny_remarks`, `deny_date`, `exmember`, `exmember_date`, `created_at`, `updated_at`) VALUES
(1, 'GYM01', 'Milton', 'Chowdhury', '01737539213', 'miltonk288@gmail.com', '318/3, East Nakhalpara, Tejgoan I/A, Dhaka-1215', 'Male', 'Service', 78, '5 feet 3 inch', 'Weight Loss', 'Platinum', 1000, 'Robart D Costa', 1, 'public/member/281127b640da07b2jpg', 'August-2023', '75', 'October-2023', 0, NULL, NULL, NULL, 0, '2023-10-09', '2023-08-03 01:53:57', '2023-11-28 12:27:48'),
(3, 'GYM03', 'Imdadul', 'Haque', '1234567891', 'imdadulhaque330@gmail.com', 'ssd d  r tertetr', 'Male', 'Student', 65, '6 feet 5inch', 'Weight Loss', 'Basic', 500, 'Iqbal Hossain', 1, 'public/member/fithub.jpg', 'August-2023', '65', 'September-2023', 200, NULL, NULL, NULL, 0, NULL, '2023-08-08 16:23:23', '2023-10-09 13:58:09'),
(15, 'GYM015', 'hasan', 'khan', '123445677', 'hasan@gmail.com', 'dhaka', 'Male', 'Student', 55, '6 feet 6', 'Weight Gain', 'Basic', 2000, 'Nafisa haque', 1, 'public/member/011230a3107a9dffjpg', 'October-2023', '55', 'October-2023', 0, 'Online', NULL, NULL, 1, '2023-10-10', '2023-10-07 15:19:39', '2023-11-30 18:30:02'),
(18, 'GYM017', 'Mahadi', 'Hasan', '01729112131', 'mahadihasanpabna@gmail.com', 'Mirpur 1', 'Male', 'Businessman', 65, '5feet 6 inch', 'Weight Loss', 'Basic', 1000, '1', 1, NULL, 'October-2023', '65', 'October-2023', 0, 'Online', NULL, NULL, 0, NULL, '2023-10-15 13:01:25', '2023-10-15 13:02:30'),
(20, 'GYM018', 'Nabia', 'Islam', '0198765432', 'nabia@gmail.com', 'Dhaka', 'Female', 'Service', 48, '5 feet 1 inch', 'Body Fit', 'Platinum', 3000, '1', 1, 'public/member/3011519212da0c87png', 'October-2023', '48', 'November-2023', 0, 'Online', NULL, NULL, 0, '2023-11-17', '2023-10-15 15:35:36', '2023-11-30 17:51:00'),
(21, 'GYM019', 'Johara', 'sathi', '01928734545', 'johara@gmail.com', 'Airport area', 'Female', 'Student', 52, '5 feet 4', 'Weight Gain', 'Gold', 2000, '5', 1, 'public/member/0112210158515c78jpg', 'October-2023', '52', 'October-2023', 0, 'Cash', NULL, NULL, 0, NULL, '2023-10-15 15:40:04', '2023-11-30 18:21:21'),
(22, 'GYM020', 'Abdullah', 'ahmed', '01298388383', 'abdullah@gmail.com', 'dhaka', 'Male', 'Student', 58, '5 feet 6', 'Body Fit', 'Platinum', 3000, '1', 1, NULL, 'October-2023', '58', 'October-2023', 0, 'Cash', NULL, NULL, 0, NULL, '2023-10-15 16:31:02', '2023-10-15 16:34:38'),
(23, 'GYM021', 'Farabi', 'haque', '01298475485', 'farabi@gmail.com', 'Mirpur', 'Male', 'Service', 52, '5 feet 3', 'Weight Gain', 'Hire personal trainer', 4000, '1', 1, NULL, 'October-2023', '52', 'October-2023', 0, 'Online', NULL, NULL, 0, NULL, '2023-10-15 16:33:10', '2023-10-15 16:34:15'),
(25, 'GYM022', 'Milon', 'Hasan', '01764706471', 'milonhasan@gmail.com', 'Dhaka', 'Male', 'Student', 58, '5feet 6inch', 'Weight Gain', 'Basic', 1000, '2', 1, 'public/member/fithub.jpg', 'October-2023', '58', 'November-2023', 0, 'Online', NULL, NULL, 0, '2023-11-17', '2023-10-20 09:12:17', '2023-11-17 17:03:44'),
(26, 'GYM023', 'Farhana', 'Islam', '0132456789', 'farhana@mail.com', 'Dhaka', 'Female', 'Student', 54, '5 feet 3\"', 'Body Fit', 'Hire personal trainer', 4000, '1', 1, 'public/member/301133275e9f5fe7jpg', 'November-2023', '54', 'November-2023', 0, 'Online', NULL, NULL, 1, '2023-11-30', '2023-11-12 15:48:00', '2023-11-30 17:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `dietcharts`
--

CREATE TABLE `dietcharts` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `diet_plan_id` int(11) NOT NULL,
  `early_morning` varchar(255) DEFAULT NULL,
  `breakfast` varchar(255) DEFAULT NULL,
  `mid_meal` varchar(255) DEFAULT NULL,
  `lunch` varchar(255) DEFAULT NULL,
  `before_workout` varchar(255) DEFAULT NULL,
  `after_workout` varchar(255) DEFAULT NULL,
  `dinner` varchar(255) DEFAULT NULL,
  `bed_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietcharts`
--

INSERT INTO `dietcharts` (`id`, `member_id`, `diet_plan_id`, `early_morning`, `breakfast`, `mid_meal`, `lunch`, `before_workout`, `after_workout`, `dinner`, `bed_time`, `created_at`, `updated_at`) VALUES
(1, 21, 50, 'Lukewarm Water', 'Oatmeal + Grilled paneer (Marinated)', 'Black channa chaat, chana soup', 'Paneer Biryani + curd + salad', '1 glass beetroot juice + 1 Peanut Butter Rice cake or beetroot soup ( 30 – 40 Minutes Before Workout) 1 Cup Black coffee before 5-10 Minutes of Workout', 'Paneer and chickpea salad', 'Scrambled tofu + chapati + salad', '1 Glass Milk', '2023-10-20 15:39:51', NULL);

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

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '9519c19c-7538-48b5-97cd-07617db723cf', 'database', 'default', '{\"uuid\":\"9519c19c-7538-48b5-97cd-07617db723cf\",\"displayName\":\"App\\\\Jobs\\\\SendContactEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendContactEmailJob\",\"command\":\"O:28:\\\"App\\\\Jobs\\\\SendContactEmailJob\\\":1:{s:10:\\\"\\u0000*\\u0000mailbox\\\";a:4:{s:4:\\\"name\\\";s:11:\\\"Milton Khan\\\";s:5:\\\"email\\\";s:20:\\\"miltonk288@gmail.com\\\";s:5:\\\"phone\\\";s:11:\\\"01737539213\\\";s:7:\\\"massage\\\";s:245:\\\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\\\";}}\"}}', 'Symfony\\Component\\Mime\\Exception\\RfcComplianceException: Email \"miltonk875$gmail.com\" does not comply with addr-spec of RFC 2822. in D:\\xamppserver\\htdocs\\webcpe\\vendor\\symfony\\mime\\Address.php:54\nStack trace:\n#0 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Message.php(246): Symfony\\Component\\Mime\\Address->__construct(\'miltonk875$gmai...\', \'\')\n#1 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Message.php(110): Illuminate\\Mail\\Message->addAddresses(\'miltonk875$gmai...\', NULL, \'To\')\n#2 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(407): Illuminate\\Mail\\Message->to(\'miltonk875$gmai...\', NULL)\n#3 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(207): Illuminate\\Mail\\Mailable->buildRecipients(Object(Illuminate\\Mail\\Message))\n#4 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(285): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}(Object(Illuminate\\Mail\\Message))\n#5 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(213): Illuminate\\Mail\\Mailer->send(\'email.contactus\', Array, Object(Closure))\n#6 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#7 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(214): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#8 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(325): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#9 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(269): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\SendContactusMail))\n#10 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(124): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\SendContactusMail))\n#11 D:\\xamppserver\\htdocs\\webcpe\\app\\Jobs\\SendContactEmailJob.php(36): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\SendContactusMail))\n#12 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendContactEmailJob->handle()\n#13 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#14 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#15 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#16 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#17 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#18 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendContactEmailJob))\n#19 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendContactEmailJob))\n#20 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#21 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendContactEmailJob), false)\n#22 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendContactEmailJob))\n#23 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendContactEmailJob))\n#24 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendContactEmailJob))\n#26 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#27 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(434): Illuminate\\Queue\\Jobs\\Job->fire()\n#28 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(384): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#29 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(175): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#30 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(137): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#31 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(120): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#32 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#33 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(194): Illuminate\\Container\\Container->call(Array)\n#38 D:\\xamppserver\\htdocs\\webcpe\\vendor\\symfony\\console\\Command\\Command.php(312): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\StringInput), Object(Illuminate\\Console\\OutputStyle))\n#39 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(164): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\StringInput), Object(Illuminate\\Console\\OutputStyle))\n#40 D:\\xamppserver\\htdocs\\webcpe\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\StringInput), Object(Symfony\\Component\\Console\\Output\\BufferedOutput))\n#41 D:\\xamppserver\\htdocs\\webcpe\\vendor\\symfony\\console\\Application.php(314): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\StringInput), Object(Symfony\\Component\\Console\\Output\\BufferedOutput))\n#42 D:\\xamppserver\\htdocs\\webcpe\\vendor\\symfony\\console\\Application.php(168): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\StringInput), Object(Symfony\\Component\\Console\\Output\\BufferedOutput))\n#43 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(163): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\StringInput), Object(Symfony\\Component\\Console\\Output\\BufferedOutput))\n#44 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(381): Illuminate\\Console\\Application->call(\'queue:work\', Array, NULL)\n#45 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php(353): Illuminate\\Foundation\\Console\\Kernel->call(\'queue:work\')\n#46 D:\\xamppserver\\htdocs\\webcpe\\routes\\web.php(153): Illuminate\\Support\\Facades\\Facade::__callStatic(\'call\', Array)\n#47 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\CallableDispatcher.php(40): Illuminate\\Routing\\RouteFileRegistrar->{closure}()\n#48 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php(237): Illuminate\\Routing\\CallableDispatcher->dispatch(Object(Illuminate\\Routing\\Route), Object(Closure))\n#49 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php(208): Illuminate\\Routing\\Route->runCallable()\n#50 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(798): Illuminate\\Routing\\Route->run()\n#51 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))\n#52 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php(50): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#53 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#54 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php(78): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#55 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#56 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php(49): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#57 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\View\\Middleware\\ShareErrorsFromSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#58 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php(121): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#59 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php(64): Illuminate\\Session\\Middleware\\StartSession->handleStatefulRequest(Object(Illuminate\\Http\\Request), Object(Illuminate\\Session\\Store), Object(Closure))\n#60 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Session\\Middleware\\StartSession->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#61 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php(37): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#62 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#63 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php(67): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#64 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Cookie\\Middleware\\EncryptCookies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#65 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#66 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(799): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#67 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(776): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Illuminate\\Http\\Request))\n#68 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(740): Illuminate\\Routing\\Router->runRoute(Object(Illuminate\\Http\\Request), Object(Illuminate\\Routing\\Route))\n#69 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php(729): Illuminate\\Routing\\Router->dispatchToRoute(Object(Illuminate\\Http\\Request))\n#70 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(200): Illuminate\\Routing\\Router->dispatch(Object(Illuminate\\Http\\Request))\n#71 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}(Object(Illuminate\\Http\\Request))\n#72 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#73 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php(31): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#74 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#75 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#76 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php(40): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#77 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\TrimStrings->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#78 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#79 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#80 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php(86): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#81 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#82 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php(49): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#83 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Http\\Middleware\\HandleCors->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#84 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php(39): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#85 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(180): Illuminate\\Http\\Middleware\\TrustProxies->handle(Object(Illuminate\\Http\\Request), Object(Closure))\n#86 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))\n#87 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(175): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#88 D:\\xamppserver\\htdocs\\webcpe\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(144): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))\n#89 D:\\xamppserver\\htdocs\\webcpe\\index.php(52): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))\n#90 {main}', '2023-05-30 08:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `gainlosses`
--

CREATE TABLE `gainlosses` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `initial_weight` varchar(22) DEFAULT NULL,
  `wrokout_weight` double DEFAULT NULL,
  `gym_result` decimal(10,0) DEFAULT NULL,
  `gym_status` varchar(22) DEFAULT NULL,
  `report_date` varchar(22) NOT NULL,
  `dayname` varchar(22) DEFAULT NULL,
  `day_order` tinyint(4) NOT NULL,
  `report_month` varchar(22) NOT NULL,
  `week_days` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gainlosses`
--

INSERT INTO `gainlosses` (`id`, `profile_id`, `initial_weight`, `wrokout_weight`, `gym_result`, `gym_status`, `report_date`, `dayname`, `day_order`, `report_month`, `week_days`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '67', 65, 2, 'Loss', '2023-09-15', 'Friday', 7, 'September-2023', 0, 0, '2023-09-15 08:08:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gym group practicing', 'public/gallery/121135eea1714409.jpg', 1, '2023-10-26 12:39:12', NULL),
(2, 'group', 'public/gallery/1211365786ba7b2f.jpg', 1, '2023-10-26 12:49:25', NULL),
(3, 'cycling', 'public/gallery/12114225c2bdda58.jpg', 1, '2023-11-12 15:42:54', NULL),
(4, 'Stretching', 'public/gallery/12114364ff7fbbb4.jpg', 1, '2023-11-12 15:43:20', NULL),
(5, 'weight Lifting', 'public/gallery/1211430ba5d87771.jpg', 1, '2023-11-12 15:43:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gymclasses`
--

CREATE TABLE `gymclasses` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `features` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gymclasses`
--

INSERT INTO `gymclasses` (`id`, `photo`, `name`, `slug`, `description`, `features`, `created_at`, `updated_at`) VALUES
(1, 'public/class/bra270702e4b635808d.jpg', 'Power Yoga', 'power-yoga', '<p>Yoga is essentially&nbsp;<strong>a spiritual discipline based on an extremely subtle science, which focuses on bringing harmony between mind and body</strong>. It is an art and scince of healthy living. The word &#39;Yoga&#39; is derived from the Sanskrit root &#39;Yuj&#39;, meaning &#39;to join&#39; or &#39;to yoke&#39; or &#39;to unite</p>', 'Karma Yoga:$$Gyana Yoga:', '2023-07-27 16:02:41', NULL),
(2, 'public/class/12101684c4da5f04.jpg', 'Weight Lifting', 'weight-lifting', '<p><em>Weightlifting</em>&nbsp;or&nbsp;<em>weight lifting</em>&nbsp;generally refers to physical exercises and sports in which people lift weights, often in the form of dumbbells or barbells.</p>', 'Muscular hypertrophy$$Muscular hypertrophy$$Muscular hypertrophy', '2023-07-27 23:35:55', NULL),
(3, 'public/class/bra280737cff37cf100.jpg', 'Cardio & Strength', 'cardio-strength', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>', 'Contrary to popular belief, Lorem Ipsum is not simply random text$$Contrary to popular belief, Lorem Ipsum is not simply random text$$Contrary to popular belief, Lorem Ipsum is not simply random text', '2023-07-27 23:37:31', NULL),
(4, 'public/class/bra280741902a31c9ac.jpg', 'Boxing & Martial Arts', 'boxing-martial-arts', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'It is a long established fact that a reader will be distracted$$It is a long established fact that a reader will be distracted', '2023-07-27 23:41:50', NULL),
(6, 'public/class/bra16103200ea1e81a7.jpg', 'Zumba', 'zumba', '<p>Zumba is one of the best-known fitness organizations in the world, with more than 200,000 class locations available in 180 countries. And while the brand is best known for its signature &quot;Zumba&quot; Latin dance fitness class, the company offers several additional workout formats, from&nbsp;<a href=\"https://www.verywellfit.com/complete-beginners-guide-to-strength-training-1229585\">strength training</a>&nbsp;to kid&#39;s fitness classes and even water aerobics classes.</p>', 'most enterteining', '2023-10-16 15:32:07', NULL),
(7, 'public/class/bra161036e16c35a8f7.jpg', 'Treadmill', 'treadmill', '<p>Starting a fitness journey can be daunting, especially for beginners. However, with a well-structured 30-minute treadmill workout, you can kickstart your fitness routine and achieve your goals effectively.&nbsp;</p>\r\n\r\n<p>This article provides a detailed guide to help beginners navigate through a treadmill workout. This includes focusing on preparation, safety tips, and strategies for improvement. Whether your aim is to burn more calories or enhance overall fitness, this workout is designed to accommodate your needs.</p>', 'east to weight loss', '2023-10-16 15:36:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homebanners`
--

CREATE TABLE `homebanners` (
  `id` int(11) NOT NULL,
  `filelink` varchar(100) NOT NULL,
  `filetype` varchar(22) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homebanners`
--

INSERT INTO `homebanners` (`id`, `filelink`, `filetype`, `status`, `created_at`, `updated_at`) VALUES
(2, 'public/banner/1809578296133dd8.mp4', 'video/mp4', 0, '2023-09-18 05:57:51', NULL),
(3, 'public/banner/180912d6cbeab936.mp4', 'video/mp4', 1, '2023-09-18 06:12:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `timein` varchar(22) NOT NULL,
  `timeout` varchar(22) DEFAULT NULL,
  `logdate` varchar(22) NOT NULL,
  `logmonth` varchar(22) NOT NULL,
  `logstatus` tinyint(1) DEFAULT NULL,
  `loginip` varchar(55) NOT NULL,
  `logindevice` varchar(30) DEFAULT NULL,
  `loginplatform` varchar(30) DEFAULT NULL,
  `loginbrowser` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `profile_id`, `role_id`, `timein`, `timeout`, `logdate`, `logmonth`, `logstatus`, `loginip`, `logindevice`, `loginplatform`, `loginbrowser`, `created_at`) VALUES
(1, 9, 1, 3, '10:45 PM', '10:52 PM', '2023-08-03', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-03 16:45:58'),
(2, 1, 1, 1, '6:15 AM', '8:26 AM', '2023-08-04', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-04 00:15:11'),
(3, 9, 1, 3, '8:26 AM', '11:33 AM', '2023-08-04', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-04 02:26:46'),
(4, 9, 1, 3, '11:44 AM', '11:44 AM', '2023-08-04', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-04 05:44:05'),
(5, 9, 1, 3, '11:45 AM', NULL, '2023-08-04', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-04 05:45:27'),
(6, 9, 1, 3, '8:14 AM', NULL, '2023-08-05', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-05 02:14:35'),
(7, 9, 1, 3, '12:46 PM', NULL, '2023-08-05', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-05 06:46:09'),
(8, 9, 1, 3, '4:10 PM', '8:06 PM', '2023-08-05', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-05 10:10:34'),
(9, 1, 0, 1, '8:06 PM', '8:46 PM', '2023-08-05', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-05 14:06:49'),
(10, 9, 1, 3, '8:46 PM', '8:48 PM', '2023-08-05', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-05 14:46:29'),
(11, 1, 0, 1, '8:49 PM', '10:57 PM', '2023-08-05', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-05 14:49:31'),
(12, 9, 1, 3, '10:57 PM', NULL, '2023-08-05', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-05 16:57:54'),
(13, 1, 0, 1, '7:11 AM', NULL, '2023-08-06', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-06 01:11:44'),
(14, 9, 1, 3, '9:35 PM', '9:36 PM', '2023-08-07', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-07 15:35:20'),
(15, 1, 0, 1, '9:36 PM', NULL, '2023-08-07', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-07 15:36:24'),
(16, 1, 0, 1, '7:16 AM', '7:47 AM', '2023-08-08', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 01:16:28'),
(17, 9, 1, 3, '7:47 AM', '10:30 AM', '2023-08-08', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 01:47:55'),
(18, 1, 0, 1, '10:30 AM', NULL, '2023-08-08', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 04:30:25'),
(19, 1, 0, 1, '5:44 PM', '5:48 PM', '2023-08-08', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 11:44:38'),
(20, 9, 1, 3, '5:48 PM', '6:24 PM', '2023-08-08', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 11:48:14'),
(21, 1, 0, 1, '7:16 PM', '7:39 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 13:16:53'),
(22, 10, 2, 3, '7:40 PM', '8:05 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 13:40:08'),
(23, 1, 0, 1, '8:05 PM', '10:14 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 14:05:20'),
(24, 1, 0, 1, '10:25 PM', '10:31 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:25:51'),
(25, 11, 3, 3, '10:32 PM', '10:35 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:32:01'),
(26, 1, 0, 1, '10:36 PM', '10:38 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:36:06'),
(27, 11, 3, 3, '10:38 PM', '10:39 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:38:25'),
(28, 1, 0, 1, '10:39 PM', '10:45 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:39:38'),
(29, 11, 3, 3, '10:45 PM', '10:47 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:45:46'),
(30, 1, 0, 1, '10:48 PM', '10:51 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:48:01'),
(31, 11, 3, 3, '10:51 PM', '10:52 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:51:59'),
(32, 1, 0, 1, '10:52 PM', '11:03 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 16:52:34'),
(33, 11, 3, 3, '11:04 PM', '11:06 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 17:04:10'),
(34, 1, 0, 1, '11:06 PM', '11:21 PM', '2023-08-08', 'August-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-08 17:06:40'),
(35, 1, 0, 1, '8:40 AM', NULL, '2023-08-11', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-11 02:40:59'),
(36, 1, 0, 1, '7:52 AM', '8:11 AM', '2023-08-12', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-12 01:52:58'),
(37, 9, 1, 3, '8:11 AM', '8:57 AM', '2023-08-12', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-12 02:11:44'),
(38, 1, 0, 1, '8:57 AM', '9:27 AM', '2023-08-12', 'August-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-12 02:57:54'),
(39, 1, 0, 1, '10:18 AM', NULL, '2023-08-12', 'August-2023', 1, '43.240.100.100', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-12 04:18:13'),
(40, 1, 0, 1, '7:36 PM', '7:37 PM', '2023-08-13', 'August-2023', 1, '103.117.151.95', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-13 13:36:44'),
(41, 1, 0, 1, '7:52 PM', '7:53 PM', '2023-08-13', 'August-2023', 1, '103.117.151.95', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-13 13:52:23'),
(42, 1, 0, 1, '8:32 PM', '9:13 PM', '2023-08-13', 'August-2023', 1, '37.111.206.99', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-13 14:32:40'),
(43, 1, 0, 1, '8:40 PM', '8:50 PM', '2023-08-13', 'August-2023', 1, '103.117.151.95', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-13 14:40:03'),
(44, 11, 3, 3, '9:14 PM', '9:17 PM', '2023-08-13', 'August-2023', 1, '37.111.206.99', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-13 15:14:25'),
(45, 11, 3, 3, '9:18 PM', NULL, '2023-08-13', 'August-2023', 1, '37.111.206.99', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-08-13 15:18:13'),
(46, 1, 0, 1, '12:25 PM', '12:51 PM', '2023-08-19', 'August-2023', 1, '103.117.151.94', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-08-19 06:25:26'),
(47, 1, 0, 1, '12:08 PM', NULL, '2023-08-23', 'August-2023', 1, '123.49.2.146', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-08-23 06:08:09'),
(48, 1, 0, 1, '3:09 PM', NULL, '2023-08-25', 'August-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 114.0.0.0', '2023-08-25 09:09:54'),
(49, 1, 0, 1, '4:52 PM', '5:01 PM', '2023-08-26', 'August-2023', 1, '43.240.100.100', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-08-26 10:52:14'),
(50, 1, 0, 1, '8:25 AM', NULL, '2023-08-27', 'August-2023', 1, '43.240.100.100', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-08-27 02:25:24'),
(51, 1, 0, 1, '5:16 PM', NULL, '2023-08-27', 'August-2023', 1, '43.240.100.100', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-08-27 11:16:08'),
(52, 1, 0, 1, '7:50 PM', NULL, '2023-08-29', 'August-2023', 1, '103.145.113.133', 'Desktop', 'OS X 10_15_7', 'Chrome 116.0.0.0', '2023-08-29 13:50:57'),
(53, 1, 0, 1, '9:35 AM', NULL, '2023-08-30', 'August-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-08-30 03:35:07'),
(54, 9, 1, 3, '10:53 AM', '10:55 AM', '2023-09-14', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-14 04:53:52'),
(55, 1, 0, 1, '10:55 AM', '10:58 AM', '2023-09-14', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-14 04:55:25'),
(56, 9, 1, 3, '10:58 AM', '2:11 PM', '2023-09-14', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-14 04:58:30'),
(57, 1, 0, 1, '2:13 PM', '2:37 PM', '2023-09-14', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-14 08:13:58'),
(58, 9, 1, 3, '7:00 PM', NULL, '2023-09-14', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-14 13:00:48'),
(59, 1, 0, 1, '9:34 AM', '10:10 AM', '2023-09-15', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-15 03:34:54'),
(60, 9, 1, 3, '10:11 AM', NULL, '2023-09-15', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-15 04:11:05'),
(61, 1, 0, 1, '1:31 PM', '1:49 PM', '2023-09-15', 'September-2023', 1, '37.111.206.202', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 07:31:58'),
(62, 1, 0, 1, '1:44 PM', '1:48 PM', '2023-09-15', 'September-2023', 1, '103.117.148.21', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-15 07:44:12'),
(63, 1, 0, 1, '1:56 PM', '2:06 PM', '2023-09-15', 'September-2023', 1, '37.111.206.202', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 07:56:44'),
(64, 11, 3, 3, '2:06 PM', '2:08 PM', '2023-09-15', 'September-2023', 1, '37.111.206.73', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:06:19'),
(65, 1, 0, 1, '2:08 PM', '2:11 PM', '2023-09-15', 'September-2023', 1, '37.111.206.73', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:08:24'),
(66, 11, 3, 3, '2:12 PM', '2:13 PM', '2023-09-15', 'September-2023', 1, '37.111.206.73', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:12:08'),
(67, 1, 0, 1, '2:12 PM', '2:13 PM', '2023-09-15', 'September-2023', 1, '103.117.148.21', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-15 08:12:10'),
(68, 11, 3, 3, '2:14 PM', '2:15 PM', '2023-09-15', 'September-2023', 1, '103.117.148.21', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-15 08:14:08'),
(69, 1, 0, 1, '2:15 PM', '2:17 PM', '2023-09-15', 'September-2023', 1, '37.111.206.73', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:15:04'),
(70, 1, 0, 1, '2:15 PM', '2:17 PM', '2023-09-15', 'September-2023', 1, '103.117.148.21', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-15 08:15:30'),
(71, 11, 3, 3, '2:17 PM', '2:19 PM', '2023-09-15', 'September-2023', 1, '37.111.206.73', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:17:29'),
(72, 11, 3, 3, '2:17 PM', '2:18 PM', '2023-09-15', 'September-2023', 1, '103.117.148.21', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-15 08:17:47'),
(73, 1, 0, 1, '2:20 PM', '2:21 PM', '2023-09-15', 'September-2023', 1, '37.111.206.73', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:20:03'),
(74, 1, 0, 1, '2:24 PM', '2:25 PM', '2023-09-15', 'September-2023', 1, '37.111.206.73', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:24:41'),
(75, 1, 0, 1, '2:40 PM', '2:43 PM', '2023-09-15', 'September-2023', 1, '37.111.206.196', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:40:33'),
(76, 11, 3, 3, '2:43 PM', '2:46 PM', '2023-09-15', 'September-2023', 1, '37.111.206.196', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:43:50'),
(77, 1, 0, 1, '2:46 PM', '3:09 PM', '2023-09-15', 'September-2023', 1, '37.111.206.196', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 08:46:59'),
(78, 1, 0, 1, '3:11 PM', NULL, '2023-09-15', 'September-2023', 1, '37.111.206.196', 'Desktop', 'Windows 10.0', 'Chrome 115.0.0.0', '2023-09-15 09:11:40'),
(79, 1, 0, 1, '5:49 PM', NULL, '2023-09-17', 'September-2023', 1, '103.117.148.21', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-17 11:49:15'),
(80, 1, 0, 1, '10:38 PM', NULL, '2023-09-17', 'September-2023', 1, '103.126.14.4', 'Desktop', 'Windows 10.0', 'Chrome 114.0.0.0', '2023-09-17 16:38:16'),
(81, 1, 0, 1, '11:56 PM', NULL, '2023-09-17', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-17 17:56:20'),
(82, 1, 0, 1, '5:30 AM', '6:45 AM', '2023-09-18', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-17 23:30:23'),
(83, 9, 1, 3, '6:45 AM', '6:46 AM', '2023-09-18', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-18 00:45:41'),
(84, 1, 0, 1, '11:03 AM', '12:41 PM', '2023-09-18', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-18 05:03:31'),
(85, 1, 0, 1, '12:49 PM', '3:09 PM', '2023-09-18', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-18 06:49:23'),
(86, 9, 1, 3, '3:09 PM', '11:12 PM', '2023-09-18', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-18 09:09:51'),
(87, 1, 0, 1, '2:52 PM', '2:53 PM', '2023-09-21', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-21 08:52:40'),
(88, 9, 1, 3, '2:53 PM', '2:56 PM', '2023-09-21', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-21 08:53:46'),
(89, 1, 0, 1, '10:39 AM', '3:31 PM', '2023-09-22', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-22 04:39:46'),
(90, 20, 10, 3, '3:31 PM', NULL, '2023-09-22', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-22 09:31:54'),
(91, 1, 0, 1, '2:32 PM', NULL, '2023-09-24', 'September-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-24 08:32:44'),
(92, 1, 0, 1, '8:19 PM', '11:01 PM', '2023-09-25', 'September-2023', 1, '103.126.14.4', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-25 14:19:34'),
(93, 11, 3, 3, '11:01 PM', '11:29 PM', '2023-09-25', 'September-2023', 1, '103.126.14.4', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-25 17:01:27'),
(94, 1, 0, 1, '11:21 PM', '11:22 PM', '2023-09-25', 'September-2023', 1, '103.117.148.19', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-25 17:21:42'),
(95, 9, 1, 3, '11:25 PM', '11:26 PM', '2023-09-25', 'September-2023', 1, '103.117.148.19', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-25 17:25:58'),
(96, 1, 0, 1, '11:30 PM', NULL, '2023-09-25', 'September-2023', 1, '103.126.14.4', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-25 17:30:10'),
(97, 1, 0, 1, '6:31 PM', '7:38 PM', '2023-09-28', 'September-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-28 12:31:05'),
(98, 11, 3, 3, '7:38 PM', '7:53 PM', '2023-09-28', 'September-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-28 13:38:20'),
(99, 11, 3, 3, '7:54 PM', '7:57 PM', '2023-09-28', 'September-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-28 13:54:20'),
(100, 1, 0, 1, '8:45 PM', NULL, '2023-09-28', 'September-2023', 1, '103.126.14.4', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-09-28 14:45:32'),
(101, 1, 0, 1, '7:38 PM', NULL, '2023-10-01', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-01 13:38:59'),
(102, 1, 0, 1, '8:34 PM', NULL, '2023-10-03', 'October-2023', 1, '103.126.14.4', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-03 14:34:25'),
(103, 1, 0, 1, '9:54 PM', '9:59 PM', '2023-10-03', 'October-2023', 1, '103.117.148.26', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-03 15:54:23'),
(104, 1, 0, 1, '9:26 PM', '10:55 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 15:26:56'),
(105, 9, 1, 3, '10:55 PM', '10:57 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 16:55:36'),
(106, 11, 3, 3, '10:57 PM', '11:02 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 16:57:36'),
(107, 1, 0, 1, '11:05 PM', '11:23 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 17:05:04'),
(108, 12, 4, 3, '11:25 PM', '11:31 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 17:25:55'),
(109, 1, 0, 1, '11:34 PM', '11:35 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 17:34:26'),
(110, 12, 4, 3, '11:36 PM', '11:41 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 17:36:02'),
(111, 1, 0, 1, '11:42 PM', '11:47 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 17:42:54'),
(112, 12, 4, 3, '11:48 PM', '11:49 PM', '2023-10-05', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-05 17:48:01'),
(113, 1, 0, 1, '9:06 AM', '9:14 AM', '2023-10-06', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 03:06:06'),
(114, 23, 13, 3, '9:15 AM', '9:38 AM', '2023-10-06', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 03:15:15'),
(115, 1, 0, 1, '9:44 AM', '12:42 PM', '2023-10-06', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 03:44:28'),
(116, 1, 0, 1, '12:45 PM', NULL, '2023-10-06', 'October-2023', 1, '103.230.104.3', 'Phone', 'AndroidOS 10', 'Chrome 117.0.0.0', '2023-10-06 06:45:28'),
(117, 1, 0, 1, '2:07 PM', '2:59 PM', '2023-10-06', 'October-2023', 1, '119.30.41.138', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 08:07:15'),
(118, 9, 1, 3, '3:00 PM', '3:08 PM', '2023-10-06', 'October-2023', 1, '119.30.41.138', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 09:00:33'),
(119, 1, 0, 1, '3:06 PM', NULL, '2023-10-06', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 09:06:15'),
(120, 1, 0, 1, '3:09 PM', NULL, '2023-10-06', 'October-2023', 1, '119.30.41.142', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 09:09:37'),
(121, 1, 0, 1, '7:30 PM', '8:00 PM', '2023-10-06', 'October-2023', 1, '103.117.148.30', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 13:30:04'),
(122, 1, 0, 1, '9:59 PM', NULL, '2023-10-06', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-06 15:59:21'),
(123, 1, 0, 1, '8:10 PM', '8:11 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 14:10:56'),
(124, 1, 0, 1, '8:13 PM', '8:14 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 14:13:41'),
(125, 24, 14, 3, '8:15 PM', '9:09 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 14:15:01'),
(126, 1, 0, 1, '9:10 PM', '9:17 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 15:10:45'),
(127, 1, 0, 1, '9:21 PM', '9:23 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 15:21:36'),
(128, 25, 15, 3, '9:23 PM', '9:26 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 15:23:57'),
(129, 1, 0, 1, '9:26 PM', '9:28 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 15:26:35'),
(130, 25, 15, 3, '9:28 PM', '9:32 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 15:28:44'),
(131, 25, 15, 3, '9:32 PM', '9:33 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 15:32:44'),
(132, 11, 3, 3, '9:33 PM', '10:01 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 15:33:56'),
(133, 1, 0, 1, '10:13 PM', '10:14 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:13:31'),
(134, 25, 15, 3, '10:14 PM', '10:17 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:14:50'),
(135, 1, 0, 1, '10:18 PM', '10:50 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:18:12'),
(136, 23, 13, 3, '10:48 PM', '10:50 PM', '2023-10-07', 'October-2023', 1, '103.117.148.26', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:48:16'),
(137, 24, 14, 3, '10:50 PM', NULL, '2023-10-07', 'October-2023', 1, '103.117.148.26', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:50:23'),
(138, 23, 13, 3, '10:50 PM', NULL, '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:50:30'),
(139, 1, 0, 1, '10:53 PM', NULL, '2023-10-07', 'October-2023', 1, '103.117.148.26', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:53:11'),
(140, 1, 0, 1, '10:55 PM', '10:56 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:55:24'),
(141, 1, 0, 1, '10:57 PM', '11:00 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 16:57:40'),
(142, 1, 0, 1, '11:00 PM', '11:03 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 17:00:40'),
(143, 1, 0, 1, '11:03 PM', '11:32 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 17:03:52'),
(144, 1, 0, 1, '11:33 PM', '11:35 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 17:33:22'),
(145, 1, 0, 1, '11:36 PM', '11:36 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 17:36:07'),
(146, 1, 0, 1, '11:37 PM', '11:37 PM', '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 17:37:18'),
(147, 23, 13, 3, '11:38 PM', NULL, '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 17:38:39'),
(148, 24, 14, 3, '11:40 PM', NULL, '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 17:40:39'),
(149, 1, 0, 1, '11:42 PM', NULL, '2023-10-07', 'October-2023', 1, '103.126.12.63', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-07 17:42:26'),
(150, 1, 0, 1, '2:27 PM', NULL, '2023-10-08', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 08:27:40'),
(151, 1, 0, 1, '6:23 PM', '6:25 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 12:23:36'),
(152, 9, 1, 3, '6:26 PM', '6:26 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 12:26:08'),
(153, 1, 0, 1, '6:27 PM', '6:42 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 12:27:31'),
(154, 9, 1, 3, '6:29 PM', '6:55 PM', '2023-10-08', 'October-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Firefox 118.0', '2023-10-08 12:29:19'),
(155, 9, 1, 3, '6:55 PM', '7:06 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 12:55:17'),
(156, 1, 0, 1, '7:06 PM', '7:35 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 13:06:31'),
(157, 1, 0, 1, '7:30 PM', '7:30 PM', '2023-10-08', 'October-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Firefox 118.0', '2023-10-08 13:30:48'),
(158, 9, 1, 3, '7:31 PM', NULL, '2023-10-08', 'October-2023', 1, '127.0.0.1', 'Desktop', 'Windows 10.0', 'Firefox 118.0', '2023-10-08 13:31:06'),
(159, 9, 1, 3, '7:35 PM', '8:28 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 13:35:59'),
(160, 1, 0, 1, '8:28 PM', '8:54 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 14:28:28'),
(161, 1, 0, 1, '8:54 PM', '9:02 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 14:54:44'),
(162, 1, 0, 1, '9:07 PM', '9:07 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 15:07:32'),
(163, 9, 1, 3, '9:07 PM', '9:09 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 15:07:58'),
(164, 1, 0, 1, '9:09 PM', '9:55 PM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 15:09:15'),
(165, 9, 1, 3, '9:55 PM', '12:12 AM', '2023-10-08', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 15:55:39'),
(166, 1, 0, 1, '12:12 AM', '12:13 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 18:12:37'),
(167, 9, 1, 3, '12:13 AM', NULL, '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-08 18:13:19'),
(168, 9, 1, 3, '7:20 AM', '10:08 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 01:20:06'),
(169, 1, 0, 1, '10:08 AM', '10:09 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 04:08:49'),
(170, 9, 1, 3, '10:10 AM', '10:15 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 04:10:04'),
(171, 1, 0, 1, '10:15 AM', '10:32 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 04:15:35'),
(172, 9, 1, 3, '10:33 AM', '11:19 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 04:33:12'),
(173, 9, 1, 3, '11:20 AM', '11:32 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 05:20:07'),
(174, 1, 0, 1, '11:32 AM', '11:33 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 05:32:59'),
(175, 9, 1, 3, '11:33 AM', '11:34 AM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 05:33:42'),
(176, 1, 0, 1, '11:34 AM', '12:22 PM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 05:34:17'),
(177, 9, 1, 3, '12:23 PM', '12:36 PM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 06:23:05'),
(178, 23, 13, 3, '12:36 PM', '12:37 PM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 06:36:54'),
(179, 9, 1, 3, '12:38 PM', '12:46 PM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 06:38:26'),
(180, 24, 14, 3, '12:46 PM', '12:47 PM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 06:46:59'),
(181, 9, 1, 3, '12:47 PM', '12:50 PM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 06:47:44'),
(182, 25, 15, 3, '12:51 PM', '12:54 PM', '2023-10-09', 'October-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 06:51:56'),
(183, 1, 0, 1, '7:40 PM', NULL, '2023-10-09', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 13:40:21'),
(184, 1, 0, 1, '7:52 PM', '7:52 PM', '2023-10-09', 'October-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 13:52:19'),
(185, 11, 3, 3, '7:54 PM', '7:57 PM', '2023-10-09', 'October-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 13:54:12'),
(186, 1, 0, 1, '7:57 PM', '8:01 PM', '2023-10-09', 'October-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 13:57:54'),
(187, 11, 3, 3, '8:01 PM', '8:02 PM', '2023-10-09', 'October-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 14:01:50'),
(188, 1, 0, 1, '8:02 PM', NULL, '2023-10-09', 'October-2023', 1, '103.82.95.0', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 14:02:15'),
(189, 1, 0, 1, '8:03 PM', '8:08 PM', '2023-10-09', 'October-2023', 1, '103.126.13.24', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-09 14:03:43'),
(190, 1, 0, 1, '8:31 PM', '8:40 PM', '2023-10-10', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-10 14:31:08'),
(191, 1, 0, 1, '8:38 PM', '8:52 PM', '2023-10-10', 'October-2023', 1, '103.82.95.0', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-10 14:38:46'),
(192, 25, 15, 3, '8:40 PM', NULL, '2023-10-10', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-10 14:40:30'),
(193, 1, 0, 1, '8:42 PM', '8:49 PM', '2023-10-10', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-10 14:42:14'),
(194, 1, 0, 1, '7:29 PM', '7:30 PM', '2023-10-11', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-11 13:29:14'),
(195, 11, 3, 3, '7:32 PM', NULL, '2023-10-11', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-11 13:32:31'),
(196, 1, 0, 1, '3:22 PM', NULL, '2023-10-12', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-12 09:22:34'),
(197, 1, 0, 1, '3:34 PM', NULL, '2023-10-12', 'October-2023', 1, '123.49.2.146', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-12 09:34:10'),
(198, 1, 0, 1, '3:49 PM', NULL, '2023-10-12', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-12 09:49:17'),
(199, 1, 0, 1, '7:34 PM', '7:38 PM', '2023-10-12', 'October-2023', 1, '103.82.95.6', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-12 13:34:59'),
(200, 1, 0, 1, '11:09 PM', NULL, '2023-10-12', 'October-2023', 1, '103.82.95.6', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-12 17:09:11'),
(201, 1, 0, 1, '3:32 PM', NULL, '2023-10-13', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-13 09:32:50'),
(202, 1, 0, 1, '10:22 PM', '10:23 PM', '2023-10-13', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-13 16:22:27'),
(203, 11, 3, 3, '10:24 PM', '10:32 PM', '2023-10-13', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-13 16:24:01'),
(204, 1, 0, 1, '2:42 PM', NULL, '2023-10-14', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-14 08:42:12'),
(205, 1, 0, 1, '6:58 PM', '7:11 PM', '2023-10-15', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Firefox 118.0', '2023-10-15 12:58:09'),
(206, 28, 18, 3, '7:04 PM', '7:10 PM', '2023-10-15', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-15 13:04:32'),
(207, 1, 0, 1, '7:11 PM', '7:14 PM', '2023-10-15', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-15 13:11:12'),
(208, 28, 18, 3, '7:12 PM', '7:14 PM', '2023-10-15', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Firefox 118.0', '2023-10-15 13:12:28'),
(209, 1, 0, 1, '9:19 PM', '9:26 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 15:19:44'),
(210, 1, 0, 1, '9:40 PM', '9:41 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 15:40:47'),
(211, 1, 0, 1, '9:42 PM', '9:44 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 15:42:11'),
(212, 28, 18, 3, '9:45 PM', '9:45 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 15:45:07'),
(213, 1, 0, 1, '9:46 PM', '9:49 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 15:46:43'),
(214, 1, 0, 1, '9:50 PM', '10:00 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 15:50:47'),
(215, 1, 0, 1, '10:09 PM', '10:12 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 16:09:30'),
(216, 1, 0, 1, '10:12 PM', '11:09 PM', '2023-10-15', 'October-2023', 1, '103.82.95.3', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-15 16:12:36'),
(217, 1, 0, 1, '10:27 PM', '10:28 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 16:27:34'),
(218, 1, 0, 1, '10:33 PM', '10:34 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 16:33:50'),
(219, 1, 0, 1, '10:35 PM', '10:43 PM', '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 16:35:40'),
(220, 1, 0, 1, '10:44 PM', NULL, '2023-10-15', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-15 16:44:51'),
(221, 1, 0, 1, '3:15 PM', NULL, '2023-10-16', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-16 09:15:03'),
(222, 11, 3, 3, '3:16 PM', NULL, '2023-10-16', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Firefox 118.0', '2023-10-16 09:16:11'),
(223, 1, 0, 1, '8:28 PM', '8:31 PM', '2023-10-16', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-16 14:28:46'),
(224, 1, 0, 1, '8:33 PM', '9:33 PM', '2023-10-16', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-16 14:33:29'),
(225, 1, 0, 1, '9:34 PM', NULL, '2023-10-16', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 117.0.0.0', '2023-10-16 15:34:22'),
(226, 1, 0, 1, '8:52 PM', '9:14 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 14:52:53'),
(227, 11, 3, 3, '9:15 PM', '9:19 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:15:41'),
(228, 1, 0, 1, '9:19 PM', '9:21 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:19:50'),
(229, 1, 0, 1, '9:29 PM', '9:30 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:29:56'),
(230, 11, 3, 3, '9:31 PM', '9:31 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:31:06'),
(231, 30, 20, 3, '9:32 PM', '9:33 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:32:24'),
(232, 11, 3, 3, '9:34 PM', '9:35 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:34:28'),
(233, 11, 3, 3, '9:35 PM', '9:37 PM', '2023-10-18', 'October-2023', 1, '103.82.95.4', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:35:42'),
(234, 1, 0, 1, '9:39 PM', '9:43 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:39:19'),
(235, 30, 20, 3, '9:47 PM', '10:07 PM', '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 15:47:44'),
(236, 31, 21, 3, '11:16 PM', NULL, '2023-10-18', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-18 17:16:16'),
(237, 1, 0, 1, '2:35 PM', '2:55 PM', '2023-10-20', 'October-2023', 1, '37.111.206.5', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-10-20 08:35:25'),
(238, 1, 0, 1, '3:17 PM', '3:18 PM', '2023-10-20', 'October-2023', 1, '37.111.206.86', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-10-20 09:17:24'),
(239, 11, 3, 3, '3:19 PM', '3:23 PM', '2023-10-20', 'October-2023', 1, '37.111.206.86', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-10-20 09:19:18'),
(240, 1, 0, 1, '12:11 PM', '12:14 PM', '2023-10-21', 'October-2023', 1, '103.82.95.5', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-21 06:11:47'),
(241, 1, 0, 1, '8:44 PM', '8:46 PM', '2023-10-23', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-23 14:44:49'),
(242, 1, 0, 1, '8:47 PM', NULL, '2023-10-23', 'October-2023', 1, '103.126.13.39', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-23 14:47:01'),
(243, 1, 0, 1, '6:36 PM', '6:43 PM', '2023-10-24', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-24 12:36:40'),
(244, 11, 3, 3, '6:44 PM', NULL, '2023-10-24', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-24 12:44:02'),
(245, 11, 3, 3, '6:39 PM', NULL, '2023-10-25', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-25 12:39:04'),
(246, 11, 3, 3, '10:08 AM', NULL, '2023-10-26', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-26 04:08:06'),
(247, 11, 3, 3, '5:53 PM', NULL, '2023-10-26', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-26 11:53:57'),
(248, 1, 0, 1, '8:23 PM', NULL, '2023-10-26', 'October-2023', 1, '103.230.106.41', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-26 14:23:47'),
(249, 11, 3, 3, '2:56 PM', '3:36 PM', '2023-10-28', 'October-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-10-28 08:56:22'),
(250, 11, 3, 3, '3:08 PM', NULL, '2023-11-02', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-11-02 09:08:17'),
(251, 11, 3, 3, '5:42 PM', NULL, '2023-11-02', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-11-02 11:42:10'),
(252, 11, 3, 3, '2:56 PM', NULL, '2023-11-04', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 118.0.0.0', '2023-11-04 08:56:09'),
(253, 11, 3, 3, '2:39 PM', NULL, '2023-11-06', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-06 08:39:09'),
(254, 11, 3, 3, '6:26 PM', '6:26 PM', '2023-11-06', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-06 12:26:35'),
(255, 1, 0, 1, '7:39 PM', NULL, '2023-11-08', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-08 13:39:23'),
(256, 1, 0, 1, '9:34 PM', '9:43 PM', '2023-11-12', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-12 15:34:45'),
(257, 11, 3, 3, '10:06 PM', '10:10 PM', '2023-11-12', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-12 16:06:29'),
(258, 1, 0, 1, '10:11 PM', '10:11 PM', '2023-11-12', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-12 16:11:00'),
(259, 1, 0, 1, '10:18 PM', NULL, '2023-11-12', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-12 16:18:52'),
(260, 1, 0, 1, '8:19 PM', NULL, '2023-11-13', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-13 14:19:09'),
(261, 1, 0, 1, '9:01 PM', '9:05 PM', '2023-11-14', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-14 15:01:58'),
(262, 1, 0, 1, '9:06 PM', '9:07 PM', '2023-11-14', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-14 15:06:43'),
(263, 31, 21, 3, '9:07 PM', '9:10 PM', '2023-11-14', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-14 15:07:39'),
(264, 1, 0, 1, '9:11 PM', '9:11 PM', '2023-11-14', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-14 15:11:03'),
(265, 31, 21, 3, '9:12 PM', '9:15 PM', '2023-11-14', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-14 15:12:02'),
(266, 11, 3, 3, '9:19 PM', '9:24 PM', '2023-11-14', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-14 15:19:58'),
(267, 1, 0, 1, '9:45 PM', NULL, '2023-11-14', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-14 15:45:19'),
(268, 11, 3, 3, '11:12 PM', '11:13 PM', '2023-11-15', 'November-2023', 1, '37.111.206.209', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-11-15 17:12:02'),
(269, 31, 21, 3, '11:13 PM', '11:50 PM', '2023-11-15', 'November-2023', 1, '37.111.206.209', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-11-15 17:13:44'),
(270, 11, 3, 3, '11:50 PM', '11:51 PM', '2023-11-15', 'November-2023', 1, '37.111.206.209', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-11-15 17:50:50'),
(271, 11, 3, 3, '11:27 PM', '11:27 PM', '2023-11-16', 'November-2023', 1, '118.179.156.177', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-16 17:27:11'),
(272, 31, 21, 3, '11:27 PM', '12:25 AM', '2023-11-16', 'November-2023', 1, '118.179.156.177', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-16 17:27:48'),
(273, 11, 3, 3, '12:25 AM', '12:27 AM', '2023-11-17', 'November-2023', 1, '118.179.156.177', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-16 18:25:30'),
(274, 31, 21, 3, '12:27 AM', NULL, '2023-11-17', 'November-2023', 1, '118.179.156.177', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-16 18:27:22'),
(275, 11, 3, 3, '7:11 PM', '7:16 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 13:11:26'),
(276, 31, 21, 3, '7:17 PM', '7:23 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 13:17:24'),
(277, 1, 0, 1, '7:24 PM', '7:29 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 13:24:20'),
(278, 1, 0, 1, '10:33 PM', '10:33 PM', '2023-11-17', 'November-2023', 1, '103.82.95.6', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 16:33:21'),
(279, 9, 1, 3, '10:33 PM', '10:33 PM', '2023-11-17', 'November-2023', 1, '103.82.95.6', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 16:33:45'),
(280, 1, 0, 1, '10:59 PM', '11:01 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 16:59:10'),
(281, 35, 25, 3, '11:01 PM', '11:03 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:01:47'),
(282, 1, 0, 1, '11:04 PM', '11:05 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:04:23'),
(283, 30, 20, 3, '11:05 PM', '11:09 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:05:17'),
(284, 25, 15, 3, '11:10 PM', NULL, '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:10:54'),
(285, 1, 0, 1, '11:13 PM', '11:19 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:13:46'),
(286, 9, 1, 3, '11:19 PM', '11:26 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:19:37'),
(287, 1, 0, 1, '11:28 PM', '11:28 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:28:12'),
(288, 25, 15, 3, '11:29 PM', NULL, '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:29:09'),
(289, 1, 0, 1, '11:30 PM', '11:39 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:30:58'),
(290, 1, 0, 1, '11:41 PM', '11:42 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:41:58'),
(291, 25, 15, 3, '11:43 PM', '11:47 PM', '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:43:15'),
(292, 1, 0, 1, '11:50 PM', NULL, '2023-11-17', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-17 17:50:23'),
(293, 31, 21, 3, '11:15 AM', '11:16 AM', '2023-11-18', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-18 05:15:03'),
(294, 11, 3, 3, '11:16 AM', '11:25 AM', '2023-11-18', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-18 05:16:40'),
(295, 31, 21, 3, '11:25 AM', NULL, '2023-11-18', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-18 05:25:54'),
(296, 1, 0, 1, '4:09 PM', '4:14 PM', '2023-11-18', 'November-2023', 1, '119.30.47.127', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-18 10:09:11'),
(297, 31, 21, 3, '4:14 PM', '4:14 PM', '2023-11-18', 'November-2023', 1, '119.30.47.127', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-18 10:14:31'),
(298, 1, 0, 1, '4:29 PM', NULL, '2023-11-18', 'November-2023', 1, '119.30.47.127', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-18 10:29:59'),
(299, 1, 0, 1, '10:50 PM', '10:50 PM', '2023-11-25', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-25 16:50:12'),
(300, 11, 3, 3, '10:51 PM', NULL, '2023-11-25', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-25 16:51:05'),
(301, 1, 0, 1, '6:11 PM', '6:16 PM', '2023-11-28', 'November-2023', 1, '103.82.95.1', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-28 12:11:45'),
(302, 9, 1, 3, '6:16 PM', '6:29 PM', '2023-11-28', 'November-2023', 1, '103.82.95.1', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-28 12:16:56'),
(303, 1, 0, 1, '6:30 PM', '6:35 PM', '2023-11-28', 'November-2023', 1, '103.82.95.1', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-28 12:30:08'),
(304, 9, 1, 3, '6:36 PM', '6:47 PM', '2023-11-28', 'November-2023', 1, '103.82.95.1', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-28 12:36:14'),
(305, 1, 0, 1, '10:43 PM', NULL, '2023-11-28', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-28 16:43:43'),
(306, 1, 0, 1, '10:49 PM', NULL, '2023-11-28', 'November-2023', 1, '103.126.13.38', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-28 16:49:31'),
(307, 11, 3, 3, '10:42 AM', '11:05 AM', '2023-11-30', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 04:42:53'),
(308, 1, 0, 1, '11:05 AM', NULL, '2023-11-30', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 05:05:47'),
(309, 11, 3, 3, '3:02 PM', '3:05 PM', '2023-11-30', 'November-2023', 1, '122.144.13.135', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 09:02:56'),
(310, 9, 1, 3, '4:20 PM', '4:22 PM', '2023-11-30', 'November-2023', 1, '123.49.2.146', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 10:20:08'),
(311, 1, 0, 1, '9:53 PM', '10:07 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 15:53:33'),
(312, 11, 3, 3, '10:09 PM', '10:47 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:09:26'),
(313, 9, 1, 3, '10:37 PM', '10:47 PM', '2023-11-30', 'November-2023', 1, '103.82.95.0', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:37:39'),
(314, 1, 0, 1, '10:47 PM', '11:34 PM', '2023-11-30', 'November-2023', 1, '103.82.95.0', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:47:23'),
(315, 1, 0, 1, '10:47 PM', '10:56 PM', '2023-11-30', 'November-2023', 1, '118.179.156.177', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:47:44'),
(316, 1, 0, 1, '10:48 PM', '10:51 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:48:05'),
(317, 31, 21, 3, '10:51 PM', '10:53 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:51:36'),
(318, 1, 0, 1, '10:53 PM', '10:54 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:53:52'),
(319, 30, 20, 3, '10:55 PM', '10:55 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:55:21'),
(320, 30, 20, 3, '10:56 PM', NULL, '2023-11-30', 'November-2023', 1, '37.111.215.228', 'Desktop', 'Windows 10.0', 'Chrome 100.0.4896.75', '2023-11-30 16:56:01'),
(321, 1, 0, 1, '10:56 PM', '10:57 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:56:15'),
(322, 36, 26, 3, '10:57 PM', '10:57 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:57:20'),
(323, 1, 0, 1, '10:57 PM', '11:14 PM', '2023-11-30', 'November-2023', 1, '118.179.156.177', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:57:23');
INSERT INTO `logs` (`id`, `user_id`, `profile_id`, `role_id`, `timein`, `timeout`, `logdate`, `logmonth`, `logstatus`, `loginip`, `logindevice`, `loginplatform`, `loginbrowser`, `created_at`) VALUES
(324, 1, 0, 1, '10:58 PM', '10:59 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 16:58:11'),
(325, 1, 0, 1, '11:01 PM', '11:06 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:01:01'),
(326, 11, 3, 3, '11:09 PM', '11:18 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:09:01'),
(327, 1, 0, 1, '11:18 PM', '11:28 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:18:52'),
(328, 25, 15, 3, '11:29 PM', NULL, '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:29:09'),
(329, 36, 26, 3, '11:32 PM', '11:33 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:32:36'),
(330, 1, 0, 1, '11:33 PM', '11:34 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:33:52'),
(331, 36, 26, 3, '11:34 PM', NULL, '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:34:59'),
(332, 31, 21, 3, '11:45 PM', '11:46 PM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:45:32'),
(333, 30, 20, 3, '11:49 PM', '12:03 AM', '2023-11-30', 'November-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 17:49:22'),
(334, 9, 1, 3, '12:17 AM', '12:18 AM', '2023-12-01', 'December-2023', 1, '103.82.95.0', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 18:17:33'),
(335, 1, 0, 1, '12:19 AM', '12:20 AM', '2023-12-01', 'December-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 18:19:01'),
(336, 31, 21, 3, '12:20 AM', '12:29 AM', '2023-12-01', 'December-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 18:20:28'),
(337, 25, 15, 3, '12:29 AM', NULL, '2023-12-01', 'December-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-11-30 18:29:37'),
(338, 1, 0, 1, '8:09 AM', '8:11 AM', '2023-12-01', 'December-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-12-01 02:09:09'),
(339, 31, 21, 3, '8:11 AM', '8:12 AM', '2023-12-01', 'December-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-12-01 02:11:43'),
(340, 1, 0, 1, '8:24 AM', '8:50 AM', '2023-12-01', 'December-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-12-01 02:24:49'),
(341, 31, 21, 3, '10:15 AM', '10:43 AM', '2023-12-01', 'December-2023', 1, '103.126.12.22', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-12-01 04:15:18'),
(342, 1, 0, 1, '10:50 AM', NULL, '2023-12-01', 'December-2023', 1, '202.134.13.140', 'Desktop', 'Windows 10.0', 'Chrome 119.0.0.0', '2023-12-01 04:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `memberschedules`
--

CREATE TABLE `memberschedules` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `day` varchar(22) NOT NULL,
  `class_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `time` varchar(22) NOT NULL,
  `appstatus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberschedules`
--

INSERT INTO `memberschedules` (`id`, `profile_id`, `schedule_id`, `day`, `class_id`, `trainer_id`, `time`, `appstatus`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Saturday', 1, 1, '8:00 AM', 1, '2023-10-09 05:32:19', '2023-10-09 05:33:18'),
(2, 1, 2, 'Saturday', 2, 2, '10:00 AM', 1, '2023-10-09 05:32:19', '2023-10-09 05:33:18'),
(3, 1, 3, 'Saturday', 3, 3, '12:00 PM', 1, '2023-10-09 05:32:19', '2023-10-09 05:33:18'),
(4, 1, 4, 'Saturday', 4, 1, '4:00 PM', 1, '2023-10-09 05:32:19', '2023-10-09 05:33:18'),
(7, 1, 5, 'Saturday', 1, 3, '6:00 PM', 1, '2023-10-09 05:34:00', '2023-10-09 05:34:32'),
(8, 1, 6, 'Saturday', 2, 1, '8:00 PM', 1, '2023-10-09 05:34:00', '2023-10-09 05:34:32'),
(9, 3, 2, 'Saturday', 2, 2, '10:00 AM', 1, '2023-10-09 13:55:19', '2023-10-09 13:58:28'),
(10, 3, 13, 'Sunday', 2, 2, '6:00 PM', 1, '2023-10-09 13:55:50', '2023-10-09 13:58:28'),
(11, 3, 15, 'Monday', 1, 1, '8:00 AM', 1, '2023-10-09 13:56:19', '2023-10-09 13:58:28'),
(12, 3, 26, 'Tuesday', 2, 2, '8:00 PM', 1, '2023-10-09 13:56:41', '2023-10-09 13:58:28'),
(13, 18, 2, 'Saturday', 2, 2, '10:00 AM', 1, '2023-10-15 13:05:36', '2023-10-15 13:05:54'),
(14, 18, 10, 'Sunday', 2, 1, '10:00 AM', 1, '2023-10-15 13:06:21', '2023-10-15 13:06:32'),
(15, 18, 17, 'Monday', 3, 3, '12:00 PM', 1, '2023-10-15 13:06:54', '2023-10-15 13:07:00'),
(16, 18, 1, 'Saturday', 1, 5, '8:00 AM', 1, '2023-10-15 13:08:00', '2023-10-15 13:08:21'),
(17, 18, 24, 'Tuesday', 4, 1, '4:00 PM', 1, '2023-10-15 13:09:33', '2023-10-15 13:10:04'),
(18, 18, 32, 'Wednesday', 3, 2, '8:00 PM', 1, '2023-10-15 13:09:53', '2023-10-15 13:10:04'),
(19, 18, 11, 'Sunday', 3, 2, '12:00 PM', 1, '2023-10-15 13:13:46', '2023-10-15 13:14:01'),
(20, 18, 14, 'Sunday', 3, 1, '8:00 PM', 1, '2023-10-15 15:45:37', '2023-10-15 15:47:01'),
(21, 20, 31, 'Wednesday', 1, 3, '6:00 PM', 1, '2023-10-18 15:32:53', '2023-10-18 15:41:39'),
(22, 21, 1, 'Saturday', 1, 5, '8:00 AM', 1, '2023-11-14 15:08:30', '2023-11-14 15:11:33'),
(23, 21, 30, 'Wednesday', 4, 1, '4:00 PM', 1, '2023-11-14 15:08:55', '2023-11-14 15:11:33'),
(24, 21, 13, 'Sunday', 2, 2, '6:00 PM', 1, '2023-11-14 15:09:25', '2023-11-14 15:11:33'),
(25, 21, 17, 'Monday', 3, 3, '12:00 PM', 1, '2023-11-14 15:09:49', '2023-11-14 15:11:33'),
(26, 21, 18, 'Monday', 4, 2, '4:00 PM', 1, '2023-11-14 15:09:49', '2023-11-14 15:11:33'),
(27, 21, 21, 'Tuesday', 1, 1, '8:00 AM', 1, '2023-11-14 15:10:09', '2023-11-14 15:11:33'),
(28, 21, 38, 'Thursday', 4, 2, '8:00 PM', 1, '2023-11-14 15:10:27', '2023-11-14 15:11:33'),
(29, 21, 9, 'Sunday', 1, 1, '8:00 AM', 0, '2023-11-30 16:53:21', NULL),
(30, 26, 1, 'Saturday', 1, 5, '8:00 AM', 1, '2023-11-30 16:57:45', '2023-11-30 16:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `member_reviews`
--

CREATE TABLE `member_reviews` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reviews` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_reviews`
--

INSERT INTO `member_reviews` (`id`, `member_id`, `reviews`, `status`, `created_at`, `updated_at`) VALUES
(1, 15, 'best gym', 1, '2023-10-10 14:40:50', NULL),
(2, 15, 'Best Gym i ever see. anybody can choose this gym', 1, '2023-11-17 17:12:17', NULL),
(3, 15, 'Best gym I ever seen. Anyone can choose to join', 1, '2023-11-17 17:30:02', NULL),
(4, 15, 'Best gym i ever see', 1, '2023-11-30 17:31:36', NULL),
(5, 26, 'best gym i see ever', 1, '2023-11-30 17:35:25', NULL),
(6, 15, 'BEST GYM', 1, '2023-11-30 18:30:25', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_19_033851_create_jobs_table', 2),
(11, '2023_05_19_034331_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `month` varchar(35) NOT NULL,
  `day` varchar(22) NOT NULL,
  `shortday` varchar(22) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'month'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month`, `day`, `shortday`, `status`) VALUES
(1, 'January', 'Saturday', 'Sat', 'day'),
(2, 'February', 'Sunday', 'Sun', 'day'),
(3, 'March', 'Monday', 'Mon', 'day'),
(4, 'April', 'Tuesday', 'Tues', 'day'),
(5, 'May', 'Wednesday', 'Wed', 'day'),
(6, 'June', 'Thursday', 'Thurs', 'day'),
(7, 'July', 'Friday', 'Fri', 'day'),
(8, 'August', '', '', 'month'),
(9, 'September', '', '', 'month'),
(10, 'October', '', '', 'month'),
(11, 'November', '', '', 'month'),
(12, 'December', '', '', 'month');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `from` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `for` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `route` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `deny_remarks` text DEFAULT NULL,
  `deny_date` varchar(22) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `from`, `reason`, `for`, `type`, `route`, `status`, `deny_remarks`, `deny_date`, `created_at`, `updated_at`) VALUES
(1, 'Farhana Islam', 26, 'Class Schedule Approved Request', 0, 'schedule', 'add_new_schedule_request', '1', NULL, NULL, '2023-11-30 16:57:45', '2023-11-30 16:58:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `customer_id` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `customer_id`) VALUES
(1, 'Milton Chowdhury', 'miltonk288@gmail.com', '01737539213', 500, '318/3, East Nakhalpara, Tejgoan I/A, Dhaka-1215', 'Completed', '64cb0947df3de', 'BDT', 'GYM01'),
(2, 'Asif Kamal', 'ek46559@gmail.com', '01918866839', 2000, '318/3, East Nakhalpara, Tejgoan I/A, Dhaka-1215', 'Completed', '64d23ffdd862d', 'BDT', 'GYM02'),
(3, 'Imdadul Haque', 'imdadulhaque330@gmail.com', '1234567891', 1000, 'ssd d  r tertetr', 'Pending', '64d26c0e0dca8', 'BDT', 'GYM03'),
(4, 'Imdadul Haque', 'imdadulhaque330@gmail.com', '1234567891', 1000, 'ssd d  r tertetr', 'Completed', '64d26c341ae17', 'BDT', 'GYM03'),
(5, 'Shawon Helal', 'Shawon@gmail.com', '01923456877', 1000, 'Dhaka', 'Pending', '64d73d56183d5', 'BDT', 'GYM04'),
(6, 'Akash Khan', 'akashkhan@gmail.com', '01711111111', 500, 'Narayanganj', 'Pending', '64d8e7135d4f2', 'BDT', 'GYM05'),
(7, 'Emon khan', 'emon@gmail.com', '0192345672', 1000, 'Dhaka', 'Pending', '650415fd97267', 'BDT', 'GYM07'),
(8, 'Emon khan', 'emon@gmail.com', '0192345672', 1000, 'Dhaka', 'Pending', '6504163ea8aab', 'BDT', 'GYM07'),
(9, 'Hasan khan', 'hasan@gmail.com', '0194567822', 1000, 'Dhaka', 'Pending', '650418570d49e', 'BDT', 'GYM08'),
(10, 'SALAM KHAN', 'SALAM@gmail.com', '01923456543', 2000, 'kawla', 'Pending', '650728b10ae0d', 'BDT', 'GYM09'),
(11, 'Nadira khan', 'nadira@gmail.com', '0193256987', 2000, 'Dhaka', 'Pending', '650fe14e84f7f', 'BDT', 'GYM011'),
(12, 'hasan khan', 'hasan@gmail.com', '123445677', 300, 'dhaka', 'Pending', '65217711bbde6', 'BDT', 'GYM015'),
(13, 'Afroza shimu', 'afroza@shimugmail.com', '444', 1000, 'Dhaka', 'Pending', '652914ae6c21d', 'BDT', 'GYM016'),
(14, 'Mahadi Hasan', 'mahadihasanpabna@gmail.com', '01729112131', 1000, 'Mirpur 1', 'Pending', '652be2aa2628b', 'BDT', 'GYM017'),
(15, 'Nabia Islam', 'nabia@gmail.com', '0198765432', 3000, 'Dhaka', 'Pending', '652c06d010a7d', 'BDT', 'GYM018'),
(16, 'Farabi haque', 'farabi@gmail.com', '01298475485', 4000, 'Mirpur', 'Pending', '652c144b25420', 'BDT', 'GYM021'),
(17, 'Milon Hasan', 'milonhasan@gmail.com', '01764706471', 1000, 'Dhaka', 'Pending', '653244a04ae34', 'BDT', 'GYM022'),
(18, 'Farhana Islam', 'farhana@mail.com', '0132456789', 4000, 'Dhaka', 'Pending', '6550f3bf0d675', 'BDT', 'GYM023');

-- --------------------------------------------------------

--
-- Table structure for table `packagerecords`
--

CREATE TABLE `packagerecords` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `memberid` varchar(22) NOT NULL,
  `newpackage` varchar(55) NOT NULL,
  `newamount` int(11) NOT NULL,
  `oldpackage` varchar(55) NOT NULL,
  `oldamount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packagerecords`
--

INSERT INTO `packagerecords` (`id`, `profile_id`, `memberid`, `newpackage`, `newamount`, `oldpackage`, `oldamount`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'GYM01', 'Platinum', 1000, 'Basic', 500, 1, '2023-08-05 14:48:12', '2023-08-05 16:23:11'),
(4, 3, 'GYM03', 'Basic', 500, 'Platinum', 1000, 1, '2023-08-08 16:35:13', '2023-08-08 16:37:28'),
(6, 15, 'GYM015', 'Basic', 2000, 'Yoga', 300, 1, '2023-10-07 15:25:39', '2023-10-07 15:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `plan_id`, `equipment_id`, `created_at`, `updated_at`) VALUES
(1, 5, 11, '2023-07-28 06:05:56', NULL),
(2, 5, 10, '2023-07-28 06:05:56', NULL),
(3, 5, 9, '2023-07-28 06:05:56', NULL),
(4, 5, 23, '2023-07-28 06:05:56', NULL),
(5, 5, 26, '2023-07-28 06:05:56', NULL),
(6, 6, 11, '2023-07-28 06:06:18', NULL),
(7, 6, 10, '2023-07-28 06:06:18', NULL),
(8, 6, 26, '2023-07-28 06:06:18', NULL),
(9, 6, 14, '2023-07-28 06:06:18', NULL),
(10, 6, 21, '2023-07-28 06:06:18', NULL),
(11, 6, 19, '2023-07-28 06:06:18', NULL),
(12, 6, 24, '2023-07-28 06:06:18', NULL),
(13, 6, 12, '2023-07-28 06:06:18', NULL),
(14, 6, 15, '2023-07-28 06:06:18', NULL),
(15, 6, 25, '2023-07-28 06:06:18', NULL),
(16, 7, 11, '2023-07-28 06:06:48', NULL),
(17, 7, 9, '2023-07-28 06:06:48', NULL),
(18, 7, 23, '2023-07-28 06:06:48', NULL),
(19, 7, 14, '2023-07-28 06:06:48', NULL),
(20, 7, 21, '2023-07-28 06:06:48', NULL),
(21, 7, 22, '2023-07-28 06:06:48', NULL),
(22, 7, 19, '2023-07-28 06:06:48', NULL),
(23, 7, 20, '2023-07-28 06:06:48', NULL),
(24, 7, 24, '2023-07-28 06:06:48', NULL),
(25, 7, 12, '2023-07-28 06:06:48', NULL),
(26, 7, 15, '2023-07-28 06:06:48', NULL),
(27, 7, 25, '2023-07-28 06:06:48', NULL),
(28, 7, 18, '2023-07-28 06:06:48', NULL),
(29, 7, 17, '2023-07-28 06:06:48', NULL),
(30, 7, 16, '2023-07-28 06:06:48', NULL),
(31, 29, 15, '2023-08-27 02:51:43', NULL),
(32, 29, 25, '2023-08-27 02:51:43', NULL),
(33, 29, 18, '2023-08-27 02:51:43', NULL),
(34, 29, 8, '2023-08-27 02:51:43', NULL),
(35, 29, 16, '2023-08-27 02:51:43', NULL),
(36, 29, 27, '2023-08-27 02:51:43', NULL),
(37, 29, 11, '2023-08-27 02:52:15', NULL),
(38, 29, 10, '2023-08-27 02:52:15', NULL),
(39, 29, 9, '2023-08-27 02:52:15', NULL),
(40, 29, 23, '2023-08-27 02:52:15', NULL),
(41, 37, 27, '2023-09-28 13:29:41', NULL),
(42, 38, 24, '2023-10-12 09:53:04', NULL),
(43, 38, 16, '2023-10-12 09:53:04', NULL),
(44, 29, 41, '2023-10-12 17:13:13', NULL),
(45, 5, 13, '2023-10-12 17:13:42', NULL),
(46, 5, 14, '2023-10-12 17:13:42', NULL),
(47, 5, 21, '2023-10-12 17:13:42', NULL),
(48, 5, 18, '2023-10-12 17:13:42', NULL),
(49, 5, 27, '2023-10-12 17:13:42', NULL),
(50, 5, 21, '2023-10-12 17:14:14', NULL),
(51, 5, 27, '2023-10-12 17:14:14', NULL),
(52, 29, 21, '2023-10-12 17:16:03', NULL),
(53, 29, 15, '2023-10-12 17:16:03', NULL),
(54, 29, 25, '2023-10-12 17:16:03', NULL),
(55, 29, 8, '2023-10-12 17:16:03', NULL),
(56, 29, 16, '2023-10-12 17:16:03', NULL),
(57, 29, 27, '2023-10-12 17:16:03', NULL),
(58, 43, 27, '2023-10-12 17:19:20', NULL),
(59, 44, 13, '2023-10-12 17:22:57', NULL),
(60, 44, 14, '2023-10-12 17:22:57', NULL),
(61, 44, 21, '2023-10-12 17:22:57', NULL),
(62, 44, 18, '2023-10-12 17:22:57', NULL),
(63, 44, 27, '2023-10-12 17:22:57', NULL),
(64, 45, 11, '2023-10-12 17:23:28', NULL),
(65, 45, 10, '2023-10-12 17:23:28', NULL),
(66, 45, 9, '2023-10-12 17:23:28', NULL),
(67, 45, 23, '2023-10-12 17:23:28', NULL),
(68, 45, 21, '2023-10-12 17:23:28', NULL),
(69, 45, 22, '2023-10-12 17:23:28', NULL),
(70, 45, 19, '2023-10-12 17:23:28', NULL),
(71, 45, 20, '2023-10-12 17:23:28', NULL),
(72, 46, 11, '2023-10-12 17:23:58', NULL),
(73, 46, 10, '2023-10-12 17:23:58', NULL),
(74, 46, 9, '2023-10-12 17:23:58', NULL),
(75, 46, 23, '2023-10-12 17:23:58', NULL),
(76, 46, 15, '2023-10-12 17:23:58', NULL),
(77, 46, 25, '2023-10-12 17:23:58', NULL),
(78, 46, 18, '2023-10-12 17:23:58', NULL),
(79, 46, 17, '2023-10-12 17:23:58', NULL),
(80, 46, 8, '2023-10-12 17:23:58', NULL),
(81, 46, 16, '2023-10-12 17:23:58', NULL),
(82, 47, 41, '2023-10-12 17:25:00', NULL),
(83, 47, 26, '2023-10-12 17:25:00', NULL),
(84, 47, 27, '2023-10-12 17:25:00', NULL),
(85, 52, 11, '2023-11-30 17:25:21', NULL),
(86, 52, 10, '2023-11-30 17:25:21', NULL),
(87, 52, 9, '2023-11-30 17:25:21', NULL),
(88, 52, 41, '2023-11-30 17:25:21', NULL),
(89, 52, 26, '2023-11-30 17:25:21', NULL),
(90, 52, 13, '2023-11-30 17:25:21', NULL),
(91, 52, 21, '2023-11-30 17:25:21', NULL),
(92, 52, 22, '2023-11-30 17:25:21', NULL),
(93, 52, 19, '2023-11-30 17:25:21', NULL),
(94, 52, 24, '2023-11-30 17:25:21', NULL),
(95, 52, 12, '2023-11-30 17:25:21', NULL),
(96, 52, 15, '2023-11-30 17:25:21', NULL),
(97, 52, 18, '2023-11-30 17:25:21', NULL),
(98, 52, 17, '2023-11-30 17:25:21', NULL),
(99, 52, 8, '2023-11-30 17:25:21', NULL),
(100, 52, 27, '2023-11-30 17:25:21', NULL),
(101, 52, 48, '2023-11-30 17:25:21', NULL),
(102, 53, 10, '2023-11-30 17:25:44', NULL),
(103, 53, 26, '2023-11-30 17:25:44', NULL),
(104, 53, 22, '2023-11-30 17:25:44', NULL),
(105, 53, 12, '2023-11-30 17:25:44', NULL),
(106, 53, 17, '2023-11-30 17:25:44', NULL),
(107, 53, 48, '2023-11-30 17:25:44', NULL),
(108, 54, 11, '2023-11-30 17:26:12', NULL),
(109, 54, 10, '2023-11-30 17:26:12', NULL),
(110, 54, 9, '2023-11-30 17:26:12', NULL),
(111, 54, 41, '2023-11-30 17:26:12', NULL),
(112, 54, 26, '2023-11-30 17:26:12', NULL),
(113, 54, 21, '2023-11-30 17:26:12', NULL),
(114, 54, 22, '2023-11-30 17:26:12', NULL),
(115, 54, 24, '2023-11-30 17:26:12', NULL),
(116, 54, 18, '2023-11-30 17:26:12', NULL),
(117, 54, 27, '2023-11-30 17:26:12', NULL);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymnets`
--

CREATE TABLE `paymnets` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `due` int(11) NOT NULL DEFAULT 0,
  `ptype` varchar(22) DEFAULT NULL,
  `paidmonth` varchar(22) NOT NULL,
  `paid_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymnets`
--

INSERT INTO `paymnets` (`id`, `profile_id`, `amount`, `paid`, `due`, `ptype`, `paidmonth`, `paid_status`, `created_at`) VALUES
(1, 3, 1000, 1000, 0, '', 'August-2023', 1, '2023-08-08 16:30:24'),
(2, 3, 500, 300, 200, '', 'September-2023', 1, '2023-08-08 16:42:27'),
(14, 15, 300, 300, 0, 'Online', 'October-2023', 1, '2023-10-07 15:23:20'),
(16, 1, 1000, 1000, 0, NULL, 'October-2023', 1, '2023-10-09 05:54:32'),
(17, 18, 1000, 1000, 0, 'Online', 'October-2023', 1, '2023-10-15 13:02:30'),
(19, 20, 3000, 3000, 0, 'Online', 'October-2023', 1, '2023-10-15 15:48:07'),
(20, 21, 2000, 2000, 0, 'Cash', 'October-2023', 1, '2023-10-15 15:48:27'),
(21, 23, 4000, 4000, 0, 'Online', 'October-2023', 1, '2023-10-15 16:34:15'),
(22, 22, 3000, 3000, 0, 'Cash', 'October-2023', 1, '2023-10-15 16:34:38'),
(23, 25, 1000, 1000, 0, 'Online', 'October-2023', 1, '2023-10-20 09:18:33'),
(24, 26, 4000, 4000, 0, 'Online', 'November-2023', 1, '2023-11-30 16:49:40');

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(22) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `email`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Imadul Haque', 'abc@gmail.com', '0', '2023-06-10 00:15:09', '2023-06-11 05:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(22) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', '2023-06-07 14:20:33', NULL),
(2, 'Admin', '2023-06-13 14:13:37', NULL),
(3, 'Member', '2023-09-18 00:06:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `day` varchar(22) NOT NULL,
  `time` varchar(22) NOT NULL,
  `class_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `time`, `class_id`, `trainer_id`, `created_at`, `updated_at`) VALUES
(1, 'Saturday', '8:00 AM', 1, 5, '2023-08-11 14:21:54', NULL),
(2, 'Saturday', '10:00 AM', 2, 2, '2023-08-11 14:22:05', NULL),
(3, 'Saturday', '12:00 PM', 3, 3, '2023-08-11 14:22:17', NULL),
(4, 'Saturday', '4:00 PM', 4, 1, '2023-08-11 14:22:32', NULL),
(5, 'Saturday', '6:00 PM', 1, 3, '2023-08-11 14:25:45', NULL),
(6, 'Saturday', '8:00 PM', 2, 1, '2023-08-11 14:26:55', NULL),
(9, 'Sunday', '8:00 AM', 1, 1, '2023-08-11 14:40:27', NULL),
(10, 'Sunday', '10:00 AM', 2, 1, '2023-08-11 14:40:40', NULL),
(11, 'Sunday', '12:00 PM', 3, 2, '2023-08-11 14:43:29', NULL),
(12, 'Sunday', '4:00 PM', 4, 3, '2023-08-11 14:43:45', NULL),
(13, 'Sunday', '6:00 PM', 2, 2, '2023-08-11 14:44:16', NULL),
(14, 'Sunday', '8:00 PM', 3, 1, '2023-08-11 14:44:37', NULL),
(15, 'Monday', '8:00 AM', 1, 1, '2023-08-11 14:45:56', NULL),
(16, 'Monday', '10:00 AM', 2, 2, '2023-08-11 14:46:06', NULL),
(17, 'Monday', '12:00 PM', 3, 3, '2023-08-11 14:46:20', NULL),
(18, 'Monday', '4:00 PM', 4, 2, '2023-08-11 14:46:37', NULL),
(19, 'Monday', '6:00 PM', 1, 1, '2023-08-11 15:05:22', NULL),
(20, 'Monday', '8:00 PM', 2, 2, '2023-08-11 15:05:22', NULL),
(21, 'Tuesday', '8:00 AM', 1, 1, '2023-08-11 15:27:30', NULL),
(22, 'Tuesday', '10:00 AM', 2, 2, '2023-08-11 15:27:30', NULL),
(23, 'Tuesday', '12:00 PM', 3, 3, '2023-08-11 15:27:30', NULL),
(24, 'Tuesday', '4:00 PM', 4, 1, '2023-08-11 15:27:30', NULL),
(25, 'Tuesday', '6:00 PM', 1, 3, '2023-08-11 15:27:30', NULL),
(26, 'Tuesday', '8:00 PM', 2, 2, '2023-08-11 15:27:30', NULL),
(27, 'Wednesday', '8:00 AM', 1, 1, '2023-08-11 16:08:15', NULL),
(28, 'Wednesday', '10:00 AM', 2, 2, '2023-08-11 16:08:15', NULL),
(29, 'Wednesday', '12:00 PM', 3, 3, '2023-08-11 16:08:15', NULL),
(30, 'Wednesday', '4:00 PM', 4, 1, '2023-08-11 16:08:15', NULL),
(31, 'Wednesday', '6:00 PM', 1, 3, '2023-08-11 16:08:15', NULL),
(32, 'Wednesday', '8:00 PM', 3, 2, '2023-08-11 16:08:15', NULL),
(33, 'Thursday', '8:00 AM', 1, 1, '2023-08-11 16:13:47', NULL),
(34, 'Thursday', '10:00 AM', 2, 2, '2023-08-11 16:13:47', NULL),
(35, 'Thursday', '12:00 PM', 3, 3, '2023-08-11 16:13:47', NULL),
(36, 'Thursday', '4:00 PM', 4, 2, '2023-08-11 16:13:47', NULL),
(37, 'Thursday', '6:00 PM', 1, 3, '2023-08-11 16:13:47', NULL),
(38, 'Thursday', '8:00 PM', 4, 2, '2023-08-11 16:13:47', NULL),
(39, 'Friday', '8:00 AM', 1, 3, '2023-08-11 16:17:52', NULL),
(40, 'Friday', '10:00 AM', 2, 1, '2023-08-11 16:17:52', NULL),
(41, 'Friday', '12:00 PM', 3, 3, '2023-08-11 16:17:52', NULL),
(42, 'Friday', '4:00 PM', 4, 2, '2023-08-11 16:17:52', NULL),
(43, 'Friday', '6:00 PM', 2, 3, '2023-08-11 16:17:52', NULL),
(44, 'Friday', '8:0 PM', 3, 2, '2023-08-11 16:17:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('21MPSoGmRWmOMLtC9NfYgjU5O41Ndepsw3ELppmw', NULL, '198.235.24.68', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHdpR1ZlbTk2Y01vdE1zbnB6dWJHakhOU2pPdmg2N1RXV1YybVdrZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vd3d3Lmd5bS50ZWNoYmRzb2Z0LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701435802),
('AFCaKQFK645541fwmRLzDJJDUAOKnX32PaFHWa5R', NULL, '103.126.12.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFA4UmFtTDJBY3NaTXRlNmxlWmI3ME9FNTRoMlhYVVN6cm1uMktxWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vZ3ltLnRlY2hiZHNvZnQuY29tL2Fib3V0LXVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701425498),
('eWlrIfX85kIzvSLK75Np4eV7kyYmirK5elASTH8u', NULL, '103.126.12.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cHM6Ly9neW0udGVjaGJkc29mdC5jb20vZm9ybWVyLW1lbWJlciI7fXM6NjoiX3Rva2VuIjtzOjQwOiJWV2NDM1B3a2JPbEpRQjU1VnBVY2dNT1NNZk9SWVRxWnh2UXp5Z3hPIjt9', 1701406034),
('jAysp9scbLd7eFG6HcdxUo3z1DAeyMXg1PhJquJu', NULL, '202.134.13.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHVLWHU2TmZCd0ZvaXAzTFhpOUZkYWpXVVZSUnFrRXUyRjVqbzJWbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTY6Imh0dHBzOi8vZ3ltLnRlY2hiZHNvZnQuY29tLz9mYmNsaWQ9SXdBUjFqYXJXcFpJbFYwOThzYXFWUkIzODQ3c0JvZW5hbmJIOU5hZ3BuZjNwS2U3RVBxR29KcEJuaW9KQSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701406058),
('KJS5jgEah1ZTzIc3VgOsgE0PHFudVTEj18fHgnov', 1, '202.134.13.140', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUjlUSXlZR3ZhRzRFdk5FVHdhWGcweEhLTWNWd1h0dXhuWVBiWHlVWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vZ3ltLnRlY2hiZHNvZnQuY29tL2NvbnRhY3QtdXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6Njoicm9sZWlkIjtpOjE7czo3OiJsb2dpbmlkIjtpOjM0Mjt9', 1701406704),
('KTsh4tG1Di4wcihRpS7zBrd0MXO8AEtviO46wibI', NULL, '103.82.95.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUl1UHNJN1dpUDhVVktzTzJLamhXMUFZejcwS0xNSUYwS1pVaDdtZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vZ3ltLnRlY2hiZHNvZnQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701449738),
('qENHgWzgPFYIVLV3fcQOdh6KOwbaYBtQDbC3RvSv', NULL, '103.126.12.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjZ5SXI0UWxyZEFreVQ2Z1FlMWV2cUtEV1NMdUpadTZsZUxMY25nbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vZ3ltLnRlY2hiZHNvZnQuY29tL3JlZ2lzdHJhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1701415675),
('uWZD68RVyzBLemV9b8lcbQSJPEH8YthSTpLoVxgG', NULL, '118.179.156.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDBOZWVnVTVMRVhaaWRCWHdzclJONHVES1M3U2ZkOU1rWm1BMEMzbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vZ3ltLnRlY2hiZHNvZnQuY29tL2NsYXNzZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1701406602),
('zQdiMzfLAldazVrPr8Hp18mM3OHR4SpGgW7iS86H', NULL, '198.235.24.5', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnZPOVYyckZmdnhTZUZiUG9PNzd5OGJaRnlrOGlEMUtzQUh0a3d6MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly93d3cuZ3ltLnRlY2hiZHNvZnQuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1701437590);

-- --------------------------------------------------------

--
-- Table structure for table `singledata`
--

CREATE TABLE `singledata` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `types` varchar(22) NOT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `singledata`
--

INSERT INTO `singledata` (`id`, `name`, `types`, `extra`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Fitness Trainer', 'post', 'N/A', 1, '2023-07-28 04:17:40', NULL),
(3, 'Yoga Trainer', 'post', 'N/A', 1, '2023-07-28 04:17:58', NULL),
(4, 'Aerobics Trainer', 'post', 'N/A', 1, '2023-07-28 04:18:05', NULL),
(8, 'Treadmill', 'equipment', 'N/A', 1, '2023-07-28 04:23:55', NULL),
(9, 'Dumbbell', 'equipment', 'N/A', 1, '2023-07-28 04:24:15', NULL),
(10, 'Bench', 'equipment', 'N/A', 1, '2023-07-28 04:29:50', NULL),
(11, 'Barbell', 'equipment', 'N/A', 1, '2023-07-28 04:29:50', NULL),
(12, 'Rowing machine', 'equipment', 'N/A', 1, '2023-07-28 04:29:50', NULL),
(13, 'Jump rope', 'equipment', 'N/A', 1, '2023-07-28 04:29:50', NULL),
(14, 'Leg extension', 'equipment', 'N/A', 1, '2023-07-28 04:29:50', NULL),
(15, 'Smith machine', 'equipment', 'N/A', 1, '2023-07-28 04:29:50', NULL),
(16, 'Weight plate', 'equipment', 'N/A', 1, '2023-07-28 04:29:50', NULL),
(17, 'Suspension training', 'equipment', 'N/A', 1, '2023-07-28 04:29:50', NULL),
(18, 'Stationary bicycle', 'equipment', 'N/A', 1, '2023-07-28 04:31:12', NULL),
(19, 'Medicine ball', 'equipment', 'N/A', 1, '2023-07-28 04:31:12', NULL),
(20, 'Power rack', 'equipment', 'N/A', 1, '2023-07-28 04:31:12', NULL),
(21, 'Leg Press Machine', 'equipment', 'N/A', 1, '2023-07-28 04:31:12', NULL),
(22, 'Machine bench press', 'equipment', 'N/A', 1, '2023-07-28 04:31:12', NULL),
(23, 'Elliptical trainer', 'equipment', 'N/A', 1, '2023-07-28 04:31:12', NULL),
(24, 'Resistance band', 'equipment', 'N/A', 1, '2023-07-28 04:32:24', NULL),
(25, 'Stability ball', 'equipment', 'N/A', 1, '2023-07-28 04:32:24', NULL),
(26, 'Foam roller', 'equipment', 'N/A', 1, '2023-07-28 04:32:24', NULL),
(27, 'Yoga mat', 'equipment', 'N/A', 1, '2023-07-28 04:32:24', NULL),
(28, 'Boxer', 'post', 'N/A', 1, '2023-07-28 04:58:13', NULL),
(30, '8:00 AM', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(31, '10:00 AM', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(32, '12:00 PM', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(33, '4:00 PM', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(34, '6:00 PM', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(35, '8.00 PM', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(36, 'joharasathi@gmail.com', 'email', 'N/A', 1, '2023-09-28 13:21:50', NULL),
(39, 'Fitness Coach', 'post', 'N/A', 1, '2023-10-03 14:53:43', NULL),
(41, 'Fitness guide', 'equipment', 'N/A', 1, '2023-10-12 16:45:15', NULL),
(44, 'Basic', 'plan', '1000', 1, '2023-10-12 17:21:06', NULL),
(45, 'Gold', 'plan', '2000', 1, '2023-10-12 17:21:25', NULL),
(46, 'Platinum', 'plan', '3000', 1, '2023-10-12 17:21:47', NULL),
(47, 'Hire personal trainer', 'plan', '4000', 1, '2023-10-12 17:22:25', NULL),
(48, 'Zumba', 'equipment', 'N/A', 1, '2023-10-16 15:29:10', NULL),
(49, 'Weight Loss', 'dietplan', 'N/A', 1, '2023-10-21 06:13:49', NULL),
(50, 'Weight Gain', 'dietplan', 'N/A', 1, '2023-10-21 06:13:49', NULL),
(51, 'maintain weight', 'dietplan', 'N/A', 1, '2023-10-23 14:49:21', NULL),
(52, 'Yearly / Discount 20%', 'plan', '10000', 1, '2023-11-30 17:20:06', NULL),
(53, '6 month / Discount 10%', 'plan', '6000', 1, '2023-11-30 17:23:27', NULL),
(54, '3 month', 'plan', '3000', 1, '2023-11-30 17:24:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainerrecords`
--

CREATE TABLE `trainerrecords` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `old_trainer` varchar(100) DEFAULT NULL,
  `new_trainer` varchar(100) NOT NULL,
  `remarks` text DEFAULT NULL,
  `trainer_type` varchar(22) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainerrecords`
--

INSERT INTO `trainerrecords` (`id`, `profile_id`, `old_trainer`, `new_trainer`, `remarks`, `trainer_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Robart D Costa', 'Nothing to say', NULL, 1, '2023-08-08 04:30:03', NULL),
(2, 3, '1', 'Ruth Edwards', 'jtvjhggjgs gerte fdd jkuy', NULL, 1, '2023-08-08 16:47:33', '2023-08-08 16:48:46'),
(3, 3, 'Ruth Edwards', 'Robart D Costa', 'for youga class', NULL, 1, '2023-09-25 17:29:00', '2023-09-25 17:30:37'),
(5, 14, '1', 'Iqbal Hossain', 'gggg', NULL, 1, '2023-10-07 15:08:40', '2023-10-07 15:12:02'),
(6, 15, '2', 'Nafisa haque', 'tyyyy', NULL, 1, '2023-10-07 15:25:58', '2023-10-07 15:26:59'),
(7, 3, 'Robart D Costa', 'Iqbal Hossain', 'best teacher', NULL, 1, '2023-10-09 13:57:29', '2023-10-09 13:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `traniners`
--

CREATE TABLE `traniners` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `name` varchar(55) NOT NULL,
  `post` varchar(55) NOT NULL,
  `about` text NOT NULL,
  `skill` text NOT NULL,
  `award` varchar(255) NOT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `joindate` varchar(22) NOT NULL,
  `experience` tinyint(4) DEFAULT NULL,
  `contact` varchar(22) NOT NULL,
  `email` varchar(255) NOT NULL,
  `social_link` text NOT NULL,
  `social_icon` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `traniners`
--

INSERT INTO `traniners` (`id`, `photo`, `name`, `post`, `about`, `skill`, `award`, `percent`, `joindate`, `experience`, `contact`, `email`, `social_link`, `social_icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'public/trainer/bra0610066e276a1ebd.jpg', 'Iqbal Hossain', 'Fitness Trainer', 'I am a Certified Fitness Professional. Concern about providing each client with a tailored approach to their fitness goals.\r\nI Believe skills and certifications are an important part of any Fitness Trainer or Gym Trainer. With an industry that includes so many areas of specialty, it’s important to specific as to what qualifications I have.\r\nHere are some major skills to consider adding:\r\n• Expert knowledge of the human anatomy\r\n• Ability to prescribe a nutritional and well-balanced diet to clients\r\n• Instructions on muscle toning & endurance.\r\n• Capable of teaching clients how to use gym equipment\r\n• Design fitness programs customized to the client’s abilities\r\n• Dedicated to safety and healthy exercise techniques\r\n• Ensure the safety and injury of the members through the implementation of prevention policies and procedures.', 'Cardio Training', 'ABCD$$CSDF$$HHH', '80$$70$$59', '2023-07-28', 3, '012345678912', 'abc@gmail.com', 'https://www.facebook.com/$$https://www.twitter.com/$$https://www.youtube.com/', 'facebook$$linkedin$$youtube', 1, '2023-07-28 02:38:30', NULL),
(2, 'public/trainer/bra0610571c2e102ab5.jpg', 'Nafisa haque', 'Yoga Trainer', 'ter took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap', 'Weight Lifting$$Fat Loss$$Cardio Training', 'ABCD$$CSDF$$HHH', '80$$70$$59', '2023-07-28', 1, '12345678901', 'vvv@gmail.com', 'https://www.facebook.com/$$https://www.twitter.com/$$https://www.youtube.com/', 'facebook$$twitter$$linkedin', 1, '2023-07-28 02:43:31', NULL),
(3, 'public/trainer/bra16102241e36049ec.jpg', 'Imran Hossain', 'Aerobics Trainer', 'ter took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the', 'Weight Lifting$$Fat Loss$$Cardio Training', 'ABCD$$CSDF$$HHH', '80$$70$$59', '2023-07-28', 4, '1234566789012', 'dd@gmail.com', 'https://www.facebook.com/$$https://www.twitter.com/$$https://www.youtube.com/', 'facebook$$twitter$$linkedin', 1, '2023-07-28 02:46:08', NULL),
(4, 'public/trainer/bra031058de653a2ca7.jpg', 'Sohel Khan', 'Boxer', 'sdf zsdfzsd fsdfzsdfz sdf', 'FRT$$FGG', 'DFR$$HYU', NULL, '2023-10-03', 5, '0123345688', 'jk@gmail.com', 'www.facebook.com$$$$', 'facebook$$instagram$$youtube', 1, '2023-10-03 15:58:06', NULL),
(5, 'public/trainer/bra031009a170b6838f.png', 'Mahima khan', 'Fitness Coach', 'tttt', 'tttt', 'gg', NULL, '2023-10-01', 3, '01234567888', '123@gmail.com', 'https://www.facebook.com/$$https://www.facebook.com/$$https://www.facebook.com/', 'facebook$$instagram$$youtube', 1, '2023-10-03 16:09:15', NULL),
(6, 'public/trainer/bra161047baeb3e80cb.jpg', 'Nazia hasan', 'Fitness Trainer', 'With a vision to change the way Bangladesh 🇧🇩 moves, I am helping hundreds and thousands of Bangladeshis integrate fitness into their lifestyles. Fitness and well-being are the core essentials of the human life and that is what I teach as a coach, to help you create and understand discipline, routine, balance and strength.', 'rr', 'rrr', NULL, '2023-10-16', 3, '09876543', 'nazia@gmail.com', '$$$$', 'facebook$$instagram$$youtube', 1, '2023-10-16 14:47:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `profile_id` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `power` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `role_id`, `profile_id`, `status`, `power`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Imdadul Haque', NULL, NULL, 'superadmin', '$2y$10$swC5iPBw7axfczwTVwNWa.qPolg0sx0ywsaKhL701w4Z.hJXZDhay', 1, 0, 1, 1, NULL, '2023-05-12 10:30:29', '2023-10-06 09:11:50'),
(9, 'Milton Chowdhury', NULL, NULL, 'milton', '$2y$10$pDDJHM2kmyEROsdjlS.vGOXfVtwB1da0WRA19maB.xddd5AsX4IFK', 3, 1, 1, 0, NULL, '2023-08-03 02:29:55', '2023-10-09 05:54:32'),
(11, 'Imdadul Haque', NULL, NULL, 'imdadul', '$2y$10$4ECj9shhGkSMre/Q4GCnj.GzNV5tfmaIlIXWtZnXOqdTdmNeMqjSy', 3, 3, 1, 0, NULL, '2023-08-08 16:23:23', '2023-08-08 16:30:24'),
(25, 'hasan khan', NULL, NULL, 'hasan', '$2y$10$w960qwencKQP4NBvqu8HUuoTmGbEuHE2t6ZoEmwOERF0oqXDZgkpi', 3, 15, 0, 0, NULL, '2023-10-07 15:19:39', '2023-11-30 18:30:25'),
(28, 'Mahadi Hasan', NULL, NULL, 'Mahadi', '$2y$10$WyLz3WyzE1hLbNiIYI/yyeQDtDlmLGV3pGxIAMDqFExaUyF5VNms.', 3, 18, 1, 0, NULL, '2023-10-15 13:01:25', '2023-10-15 13:02:30'),
(30, 'Nabia Islam', NULL, NULL, 'nabia', '$2y$10$/XzUeOx29FJvsF01zwOW8e0m2wVRqXXXT/Lh6HPMhJyJ7VK1f3VXa', 3, 20, 1, 0, NULL, '2023-10-15 15:35:36', '2023-11-17 17:14:11'),
(31, 'Johara sathi', NULL, NULL, 'johara', '$2y$10$.N1HMO9s6XC4u9lAglqMduhtPVpMqDWkHryhLpQd320Ig4tH8pPQa', 3, 21, 1, 0, NULL, '2023-10-15 15:40:04', '2023-10-15 15:48:27'),
(32, 'Abdullah ahmed', NULL, NULL, 'abdullah', '$2y$10$8yTJvo2Rg5gw7UQAVOsHC.1rjGoXHPq5rIZ3lX6LpRObhjCHG1n4i', 3, 22, 1, 0, NULL, '2023-10-15 16:31:02', '2023-10-15 16:34:38'),
(33, 'Farabi haque', NULL, NULL, 'farabi', '$2y$10$zRm0qZcTTCHZhxgVhJ2E4.bJj9tEIxxEjPdbrY2PBt4CaVq/zU8.W', 3, 23, 1, 0, NULL, '2023-10-15 16:33:10', '2023-10-15 16:34:15'),
(35, 'Milon Hasan', NULL, NULL, 'milon', '$2y$10$NcMnXLfus5fxX7nxkq0qDuOIs1iNsgSDqjkfUxvJAbyWGDvtluUpy', 3, 25, 1, 0, NULL, '2023-10-20 09:12:17', '2023-11-17 17:01:11'),
(36, 'Farhana Islam', NULL, NULL, 'farhana', '$2y$10$Dh0KtakeCJFdcAbxiqtN1e5ts.O2PyGKgYHSgn7.kDon3byGR2DWK', 3, 26, 1, 0, NULL, '2023-11-12 15:48:00', '2023-11-30 18:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `id` int(11) NOT NULL,
  `day` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`id`, `day`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday'),
(7, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `workouttimes`
--

CREATE TABLE `workouttimes` (
  `id` int(11) NOT NULL,
  `start_time` varchar(22) NOT NULL,
  `start_weight` varchar(22) NOT NULL,
  `workout_date` varchar(22) NOT NULL,
  `workout_day` varchar(22) NOT NULL,
  `dayserial` int(11) NOT NULL,
  `workout_by` int(11) NOT NULL,
  `workout_status` tinyint(1) NOT NULL,
  `end_time` varchar(22) DEFAULT NULL,
  `workout_time` varchar(22) DEFAULT NULL,
  `end_weight` varchar(22) DEFAULT NULL,
  `workout_balance` varchar(22) DEFAULT NULL,
  `workout_result` varchar(22) DEFAULT NULL,
  `workout_month` varchar(22) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workouttimes`
--

INSERT INTO `workouttimes` (`id`, `start_time`, `start_weight`, `workout_date`, `workout_day`, `dayserial`, `workout_by`, `workout_status`, `end_time`, `workout_time`, `end_weight`, `workout_balance`, `workout_result`, `workout_month`, `created_at`, `updated_at`) VALUES
(1, '12:32 PM', '75', '2023-08-09', 'Saturday', 1, 1, 2, '12:33 PM', '0:1', '65', '2', 'Loss', 'October-2023', '2023-10-09 06:32:35', NULL),
(2, '12:37 PM', '58', '2023-09-09', 'Sunday', 2, 1, 2, '12:37 PM', '0:0', '70', '2', 'Gain', 'October-2023', '2023-10-09 06:37:11', NULL),
(3, '12:47 PM', '65', '2023-10-09', 'Monday', 3, 1, 2, '12:47 PM', '0:0', '70', '5', 'Gain', 'October-2023', '2023-10-09 06:47:13', NULL),
(4, '12:52 PM', '60', '2023-10-09', 'Monday', 3, 15, 2, '12:52 PM', '0:0', '65', '5', 'Gain', 'October-2023', '2023-10-09 06:52:26', NULL),
(5, '10:24 PM', '63', '2023-10-13', 'Friday', 7, 3, 1, NULL, NULL, NULL, NULL, NULL, 'October-2023', '2023-10-13 16:24:32', NULL),
(6, '9:16 PM', '66', '2023-10-18', 'Wednesday', 5, 3, 2, '9:18 PM', '0:2', '65', '1', 'Loss', 'October-2023', '2023-10-18 15:16:18', NULL),
(7, '9:48 PM', '48', '2023-10-18', 'Wednesday', 5, 20, 2, '10:06 PM', '0:18', '49', '1', 'Gain', 'October-2023', '2023-10-18 15:48:30', NULL),
(8, '3:19 PM', '66', '2023-10-20', 'Friday', 7, 3, 2, '3:21 PM', '0:2', '65', '1', 'Loss', 'October-2023', '2023-10-20 09:20:00', NULL),
(9, '6:39 PM', '64', '2023-10-25', 'Wednesday', 5, 3, 2, '6:44 PM', '0:5', '63', '1', 'Loss', 'October-2023', '2023-10-25 12:39:58', NULL),
(10, '5:54 PM', '64', '2023-10-26', 'Thursday', 6, 3, 2, '6:17 PM', '0:23', '63', '1', 'Loss', 'October-2023', '2023-10-26 11:55:00', NULL),
(11, '2:56 PM', '64', '2023-10-28', 'Saturday', 1, 3, 1, NULL, NULL, NULL, NULL, NULL, 'October-2023', '2023-10-28 09:01:01', NULL),
(12, '3:08 PM', '65', '2023-11-02', 'Thursday', 6, 3, 2, '5:42 PM', '2:34', '64', '1', 'Loss', 'November-2023', '2023-11-02 09:08:36', NULL),
(13, '2:56 PM', '64', '2023-11-04', 'Saturday', 1, 3, 2, '4:23 PM', '1:27', '62', '2', 'Loss', 'November-2023', '2023-11-04 08:56:20', NULL),
(14, '2:39 PM', '66', '2023-11-06', 'Monday', 3, 3, 2, '6:26 PM', '3:47', '63', '3', 'Loss', 'November-2023', '2023-11-06 08:39:42', NULL),
(15, '10:06 PM', '65', '2023-11-12', 'Sunday', 2, 3, 2, '10:10 PM', '0:4', '64', '1', 'Loss', 'November-2023', '2023-11-12 16:06:59', NULL),
(16, '9:12 PM', '52', '2023-11-14', 'Tuesday', 4, 21, 2, '9:14 PM', '0:2', '53', '1', 'Gain', 'November-2023', '2023-11-14 15:12:34', NULL),
(17, '9:21 PM', '65', '2023-11-14', 'Tuesday', 4, 3, 2, '9:23 PM', '0:2', '64', '1', 'Loss', 'November-2023', '2023-11-14 15:22:12', NULL),
(18, '11:12 PM', '67', '2023-11-15', 'Wednesday', 5, 3, 2, '11:51 PM', '0:39', '65', '2', 'Loss', 'November-2023', '2023-11-15 17:12:30', NULL),
(19, '11:14 PM', '54', '2023-11-15', 'Wednesday', 5, 21, 2, '11:50 PM', '0:36', '55', '1', 'Gain', 'November-2023', '2023-11-15 17:14:35', NULL),
(20, '11:27 PM', '64', '2023-11-16', 'Thursday', 6, 3, 1, NULL, NULL, NULL, NULL, NULL, 'November-2023', '2023-11-16 17:27:21', NULL),
(21, '11:27 PM', '64', '2023-11-16', 'Thursday', 6, 3, 1, NULL, NULL, NULL, NULL, NULL, 'November-2023', '2023-11-16 17:27:22', NULL),
(22, '11:27 PM', '55', '2023-11-16', 'Thursday', 6, 21, 1, NULL, NULL, NULL, NULL, NULL, 'November-2023', '2023-11-16 17:27:59', NULL),
(23, '7:14 PM', '65', '2023-11-17', 'Friday', 7, 3, 2, '7:16 PM', '0:2', '64', '1', 'Loss', 'November-2023', '2023-11-17 13:15:25', NULL),
(24, '7:17 PM', '55', '2023-11-17', 'Friday', 7, 21, 2, '7:20 PM', '0:3', '56', '1', 'Gain', 'November-2023', '2023-11-17 13:18:03', NULL),
(25, '11:17 AM', '66', '2023-11-18', 'Saturday', 1, 3, 2, '11:19 AM', '0:2', '65', '1', 'Loss', 'November-2023', '2023-11-18 05:17:46', NULL),
(26, '11:26 AM', '56', '2023-11-18', 'Saturday', 1, 21, 2, '11:31 AM', '0:5', '57', '1', 'Gain', 'November-2023', '2023-11-18 05:27:04', NULL),
(27, '6:46 PM', '50', '2023-11-28', 'Tuesday', 4, 1, 1, NULL, NULL, NULL, NULL, NULL, 'November-2023', '2023-11-28 12:47:10', NULL),
(28, '10:43 AM', '56', '2023-11-30', 'Thursday', 6, 3, 2, '3:03 PM', '4:20', '53', '3', 'Loss', 'November-2023', '2023-11-30 04:43:48', NULL),
(29, '8:00 AM', '48', '2023-11-25', 'Saturday', 1, 20, 2, '9:00 AM', '1:0', '49', '1', 'Gain', 'November-2023', '2023-11-30 17:50:23', NULL),
(30, '8:00 AM', '49', '2023-11-26', 'Sunday', 2, 20, 2, '9:00 PM', '13:0', '50', '1', 'Gain', 'November-2023', '2023-11-30 17:52:14', NULL),
(31, '8:00 AM', '50', '2023-11-27', 'Monday', 3, 20, 2, '9:00 AM', '1:0', '49', '1', 'Loss', 'November-2023', '2023-11-30 17:53:37', NULL),
(32, '8:00 AM', '49', '2023-11-28', 'Tuesday', 4, 20, 2, '9:00 AM', '1:0', '51', '2', 'Gain', 'November-2023', '2023-11-30 18:01:03', NULL),
(33, '8:00 AM', '52', '2023-11-25', 'Saturday', 1, 21, 2, '9:00 AM', '1:0', '53', '1', 'Gain', 'November-2023', '2023-11-30 18:22:23', NULL),
(34, '8:00 AM', '53', '2023-11-26', 'Sunday', 2, 21, 2, '9:00 AM', '1:0', '54', '1', 'Gain', 'November-2023', '2023-11-30 18:23:02', NULL),
(35, '8:00 AM', '54', '2023-11-27', 'Monday', 3, 21, 2, '9:00 AM', '1:0', '53', '1', 'Loss', 'November-2023', '2023-11-30 18:24:08', NULL),
(36, '8:00 AM', '53', '2023-11-28', 'Tuesday', 4, 21, 2, '9:00 AM', '1:0', '54', '1', 'Gain', 'November-2023', '2023-11-30 18:25:14', NULL),
(37, '8:00 AM', '54', '2023-11-29', 'Wednesday', 5, 21, 2, '9:00 AM', '1:0', '55', '1', 'Gain', 'November-2023', '2023-11-30 18:26:04', NULL),
(38, '8:00 AM', '55', '2023-11-30', 'Thursday', 6, 21, 2, '9:00 AM', '1:0', '56', '1', 'Gain', 'November-2023', '2023-11-30 18:27:05', NULL),
(39, '12:27 AM', '56', '2023-12-01', 'Friday', 7, 21, 2, '12:27 AM', '0:0', '55', '1', 'Loss', 'December-2023', '2023-11-30 18:27:37', NULL),
(40, '8:00 AM', '56', '2023-12-01', 'Friday', 7, 21, 2, '9:00 AM', '1:0', '55', '1', 'Loss', 'December-2023', '2023-11-30 18:28:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workout_summaries`
--

CREATE TABLE `workout_summaries` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `workout_date` varchar(22) NOT NULL,
  `workout_day` varchar(22) NOT NULL,
  `week_dayslno` int(11) NOT NULL,
  `start_weight` int(11) DEFAULT NULL,
  `end_weight` int(11) DEFAULT NULL,
  `result` varchar(22) DEFAULT NULL,
  `workout_month` varchar(22) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout_summaries`
--

INSERT INTO `workout_summaries` (`id`, `profile_id`, `workout_date`, `workout_day`, `week_dayslno`, `start_weight`, `end_weight`, `result`, `workout_month`, `created_at`, `updated_at`) VALUES
(1, 20, '2023-11-25', 'Saturday', 1, 48, 49, 'Gain', 'November-2023', '2023-11-30 17:50:23', NULL),
(2, 20, '2023-11-26', 'Sunday', 2, 49, 50, 'Gain', 'November-2023', '2023-11-30 17:52:14', NULL),
(3, 20, '2023-11-27', 'Monday', 3, 50, 49, 'Loss', 'November-2023', '2023-11-30 17:53:37', NULL),
(4, 20, '2023-11-28', 'Tuesday', 4, 49, 51, 'Gain', 'November-2023', '2023-11-30 18:01:03', NULL),
(5, 21, '2023-11-25', 'Saturday', 1, 52, 53, 'Gain', 'November-2023', '2023-11-30 18:22:23', NULL),
(6, 21, '2023-11-26', 'Sunday', 2, 53, 54, 'Gain', 'November-2023', '2023-11-30 18:23:02', NULL),
(7, 21, '2023-11-27', 'Monday', 3, 54, 53, 'Loss', 'November-2023', '2023-11-30 18:24:08', NULL),
(8, 21, '2023-11-28', 'Tuesday', 4, 53, 54, 'Gain', 'November-2023', '2023-11-30 18:25:14', NULL),
(9, 21, '2023-11-29', 'Wednesday', 5, 54, 55, 'Gain', 'November-2023', '2023-11-30 18:26:04', NULL),
(10, 21, '2023-11-30', 'Thursday', 6, 55, 56, 'Gain', 'November-2023', '2023-11-30 18:27:05', NULL),
(11, 21, '2023-12-01', 'Friday', 7, 56, 55, 'Loss', 'December-2023', '2023-11-30 18:28:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `dietcharts`
--
ALTER TABLE `dietcharts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gainlosses`
--
ALTER TABLE `gainlosses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gymclasses`
--
ALTER TABLE `gymclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homebanners`
--
ALTER TABLE `homebanners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberschedules`
--
ALTER TABLE `memberschedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_reviews`
--
ALTER TABLE `member_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagerecords`
--
ALTER TABLE `packagerecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `paymnets`
--
ALTER TABLE `paymnets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `singledata`
--
ALTER TABLE `singledata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainerrecords`
--
ALTER TABLE `trainerrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traniners`
--
ALTER TABLE `traniners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workouttimes`
--
ALTER TABLE `workouttimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout_summaries`
--
ALTER TABLE `workout_summaries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `dietcharts`
--
ALTER TABLE `dietcharts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gainlosses`
--
ALTER TABLE `gainlosses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gymclasses`
--
ALTER TABLE `gymclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `homebanners`
--
ALTER TABLE `homebanners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `memberschedules`
--
ALTER TABLE `memberschedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `member_reviews`
--
ALTER TABLE `member_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `packagerecords`
--
ALTER TABLE `packagerecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `paymnets`
--
ALTER TABLE `paymnets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `singledata`
--
ALTER TABLE `singledata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `trainerrecords`
--
ALTER TABLE `trainerrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `traniners`
--
ALTER TABLE `traniners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workouttimes`
--
ALTER TABLE `workouttimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `workout_summaries`
--
ALTER TABLE `workout_summaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
