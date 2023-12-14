-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 06:18 AM
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
-- Database: `fithub_database`
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
(3, 'Sathi', 'Sathiakter@gmail.com', '01777777777', NULL, 'i want to join gym', 0, NULL, NULL, '2023-08-13 14:43:35', NULL),
(4, 'Imdadu', 'imdadulhaque330@gmail.com', '01780881330', NULL, '🤦‍♂️', 1, '2023-08-13 8:46 PM', NULL, '2023-08-13 14:45:21', NULL);

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
(1, 'public/images/fithub.png', 'Welcome To Our Fithub Gym Center', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1247/Plot No. 39, airport road, kawla, Dhaka', '1800-121-3637', '+91 555 234-8765', 'info@gmail.com', 'services@gmail.com', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://www.instagram.com', 'https://www.youtube.com/', NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `memberidno`, `fname`, `lname`, `contact`, `email`, `address`, `gender`, `occupation`, `weight`, `height`, `reason`, `package`, `packageamt`, `trainer`, `profilestatus`, `photo`, `addmonth`, `change_weight`, `paid_month`, `due_amount`, `paymethod`, `created_at`, `updated_at`) VALUES
(1, 'GYM01', 'Milton', 'Chowdhury', '01737539213', 'miltonk288@gmail.com', '318/3, East Nakhalpara, Tejgoan I/A, Dhaka-1215', 'Male', 'Service', 78, '5 feet 3 inch', 'Weight Loss', 'Platinum', 1000, 'Robart D Costa', 1, 'public/member/fithub.png', 'August-2023', '75', 'August-2023', 0, NULL, '2023-08-03 01:53:57', '2023-09-15 04:09:53'),
(2, 'GYM02', 'Asif', 'Kamal', '01918866839', 'ek46559@gmail.com', '318/3, East Nakhalpara, Tejgoan I/A, Dhaka-1215', 'Male', 'Businessman', 70, '5 feet 3 inch', 'Weight Loss', 'Gold', 2000, '2', 1, NULL, 'August-2023', '70', 'August-2023', 0, NULL, '2023-08-08 13:15:29', '2023-08-08 13:28:38'),
(3, 'GYM03', 'Imdadul', 'Haque', '1234567891', 'imdadulhaque330@gmail.com', 'ssd d  r tertetr', 'Male', 'Student', 65, '6 feet 5inch', 'Weight Loss', 'Basic', 500, 'Ruth Edwards', 1, 'public/member/fithub.jpg', 'August-2023', '67', 'September-2023', 200, NULL, '2023-08-08 16:23:23', '2023-08-13 19:20:47'),
(4, 'GYM04', 'Shawon', 'Helal', '01923456877', 'Shawon@gmail.com', 'Dhaka', 'Male', 'Service', 56, '5\" 8', 'Body Fit', 'Platinum', 1000, '1', 1, NULL, 'August-2023', '56', 'August-2023', 0, NULL, '2023-08-12 08:05:19', '2023-08-13 18:40:02'),
(5, 'GYM05', 'Akash', 'Khan', '01711111111', 'akashkhan@gmail.com', 'Narayanganj', 'Male', 'Student', 56, '5 feet 5 inch', 'Weight Gain', 'Basic', 500, '1', 1, NULL, 'August-2023', '55', 'August-2023', 0, NULL, '2023-08-13 14:21:58', '2023-08-13 19:09:57');

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
(1, 'public/class/bra270702e4b635808d.jpg', 'Power Yoga', 'power-yoga', '<p>Maecenas ut urna nec lorem sollicitudin tempor sed non arcu. In augue libero, bibendum quis purus ut, hendrerit blandit nulla. Nunc auctor lacus tincidunt faucibus sodales. Cras et arcu consectetur, faucibus ligula vel, pellentesque quam. Sed at velit consectetur, semper elit sit amet, tempus ante.</p>\r\n\r\n<p>Donec euismod nisl enim, ac feugiat est rhoncus pulvinar. Vestibulum eu orci sed turpis varius faucibus. Mauris semper facilisis erat et pulvinar. Nullam a tempor justo, in imperdiet nisl. Vivamus sed nibh sit amet orci gravida ullamcorper nec a lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu commodo ex. Aliquam molestie posuere nibh sed congue.</p>', 'dgsdg', '2023-07-27 16:02:41', NULL),
(2, 'public/class/bra2807354e34beeeb2.jpg', 'Weight Lifting', 'weight-lifting', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</p>', 'Lorem Ipsum is simply dummy text$$Lorem Ipsum is simply dummy text$$Lorem Ipsum is simply dummy text', '2023-07-27 23:35:55', NULL),
(3, 'public/class/bra280737cff37cf100.jpg', 'Cardio & Strength', 'cardio-strength', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>', 'Contrary to popular belief, Lorem Ipsum is not simply random text$$Contrary to popular belief, Lorem Ipsum is not simply random text$$Contrary to popular belief, Lorem Ipsum is not simply random text', '2023-07-27 23:37:31', NULL),
(4, 'public/class/bra280741902a31c9ac.jpg', 'Boxing & Martial Arts', 'boxing-martial-arts', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'It is a long established fact that a reader will be distracted$$It is a long established fact that a reader will be distracted', '2023-07-27 23:41:50', NULL);

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
(60, 9, 1, 3, '10:11 AM', NULL, '2023-09-15', 'September-2023', 1, '::1', 'Desktop', 'Windows 10.0', 'Chrome 116.0.0.0', '2023-09-15 04:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `memberschedules`
--

CREATE TABLE `memberschedules` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
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

INSERT INTO `memberschedules` (`id`, `profile_id`, `day`, `class_id`, `trainer_id`, `time`, `appstatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saturday', 1, 1, '8:00 Am', 1, '2023-08-12 02:50:29', '2023-08-12 03:25:47'),
(2, 1, 'Sunday', 1, 1, '8:00 Am', 1, '2023-08-12 02:50:29', '2023-08-12 03:25:47'),
(3, 1, 'Monday', 4, 2, '4:00 Pm', 1, '2023-08-12 02:50:29', '2023-08-12 03:25:47'),
(4, 1, 'Tuesday', 3, 3, '12:00 Pm', 1, '2023-08-12 02:50:29', '2023-08-12 03:25:47'),
(5, 1, 'Wednesday', 1, 3, '6:00 Pm', 1, '2023-08-12 02:50:29', '2023-08-12 03:25:47'),
(6, 1, 'Thursday', 4, 2, '8:00 Pm', 1, '2023-08-12 02:50:29', '2023-08-12 03:25:47'),
(7, 1, 'Friday', 2, 3, '6:00 Pm', 1, '2023-08-12 02:50:29', '2023-08-12 03:25:47'),
(8, 3, 'Saturday', 2, 2, '10:00 Am', 0, '2023-08-13 15:23:46', NULL),
(9, 3, 'Sunday', 3, 2, '12:00 Pm', 0, '2023-08-13 15:23:46', NULL),
(10, 3, 'Monday', 2, 2, '10:00 Am', 0, '2023-08-13 15:23:46', NULL),
(11, 3, 'Tuesday', 2, 2, '10:00 Am', 0, '2023-08-13 15:23:46', NULL),
(12, 3, 'Wednesday', 3, 2, '8:00 Pm', 0, '2023-08-13 15:23:46', NULL),
(13, 3, 'Thursday', 2, 2, '10:00 Am', 0, '2023-08-13 15:23:46', NULL),
(14, 3, 'Friday', 4, 2, '4:00 Pm', 0, '2023-08-13 15:23:46', NULL);

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `from`, `reason`, `for`, `type`, `route`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Milton Chowdhury', 1, 'Package Change Request', 3, 'package', 'change_membership_package', '1', '2023-08-05 14:48:12', '2023-08-05 16:23:11'),
(2, 'Milton Chowdhury', 1, 'Trainer Change Request', 1, 'trainer', 'change_membership_trainer', '1', '2023-08-08 04:30:03', '2023-08-08 11:47:54'),
(3, 'Asif Kamal', 2, 'New Membership Request', 0, 'registration', 'view_new_registration_info', '1', '2023-08-08 13:15:29', '2023-08-08 13:28:38'),
(4, 'Imdadul Haque', 3, 'New Membership Request', 0, 'registration', 'view_new_registration_info', '1', '2023-08-08 16:23:23', '2023-08-08 16:30:24'),
(5, 'Imdadul Haque', 3, 'Package Change Request', 4, 'package', 'change_membership_package', '1', '2023-08-08 16:35:13', '2023-08-08 16:37:28'),
(6, 'Imdadul Haque', 3, 'Trainer Change Request', 2, 'trainer', 'change_membership_trainer', '1', '2023-08-08 16:47:33', '2023-08-08 16:48:46'),
(7, 'dfgsd', 1, 'New Appointment Request', 0, 'appointment', 'view_new_appointment_info', '1', '2023-08-11 05:36:49', NULL),
(9, 'Milton Chowdhury', 1, 'Schedule Add Request', 0, 'schedule', 'add_new_schedule_request', '1', '2023-08-12 02:50:29', '2023-08-12 03:25:47'),
(10, 'Shawon Helal', 4, 'New Membership Request', 0, 'registration', 'view_new_registration_info', '1', '2023-08-12 08:05:19', '2023-08-13 18:40:03'),
(11, 'Akash Khan', 5, 'New Membership Request', 0, 'registration', 'view_new_registration_info', '1', '2023-08-13 14:21:58', '2023-08-13 19:09:57'),
(12, 'Sathi', 3, 'New Appointment Request', 0, 'appointment', 'view_new_appointment_info', '0', '2023-08-13 14:43:35', NULL),
(13, 'Imdadu', 4, 'New Appointment Request', 0, 'appointment', 'view_new_appointment_info', '0', '2023-08-13 14:45:21', NULL),
(14, 'Imdadul Haque', 3, 'Schedule Add Request', 0, 'schedule', 'add_new_schedule_request', '0', '2023-08-13 15:23:46', NULL);

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
(6, 'Akash Khan', 'akashkhan@gmail.com', '01711111111', 500, 'Narayanganj', 'Pending', '64d8e7135d4f2', 'BDT', 'GYM05');

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
(4, 3, 'GYM03', 'Basic', 500, 'Platinum', 1000, 1, '2023-08-08 16:35:13', '2023-08-08 16:37:28');

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
(40, 29, 23, '2023-08-27 02:52:15', NULL);

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
(3, 4, 1000, 1000, 0, NULL, 'August-2023', 1, '2023-08-13 14:40:03'),
(4, 5, 500, 500, 0, NULL, 'August-2023', 1, '2023-08-13 15:09:57');

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
  `role_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-06-07 14:20:33', NULL),
(2, 'Manager', '2023-06-07 14:20:33', NULL),
(3, 'Member', '2023-06-13 14:13:37', NULL);

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
(1, 'Saturday', '8:00 Am', 1, 1, '2023-08-11 14:21:54', NULL),
(2, 'Saturday', '10:00 Am', 2, 2, '2023-08-11 14:22:05', NULL),
(3, 'Saturday', '12:00 Pm', 3, 3, '2023-08-11 14:22:17', NULL),
(4, 'Saturday', '4:00 Pm', 4, 1, '2023-08-11 14:22:32', NULL),
(5, 'Saturday', '6:00 Pm', 1, 3, '2023-08-11 14:25:45', NULL),
(6, 'Saturday', '8:00 Pm', 2, 1, '2023-08-11 14:26:55', NULL),
(9, 'Sunday', '8:00 Am', 1, 1, '2023-08-11 14:40:27', NULL),
(10, 'Sunday', '10:00 Am', 2, 1, '2023-08-11 14:40:40', NULL),
(11, 'Sunday', '12:00 Pm', 3, 2, '2023-08-11 14:43:29', NULL),
(12, 'Sunday', '4:00 Pm', 4, 3, '2023-08-11 14:43:45', NULL),
(13, 'Sunday', '6:00 Pm', 2, 2, '2023-08-11 14:44:16', NULL),
(14, 'Sunday', '8:00 Pm', 3, 1, '2023-08-11 14:44:37', NULL),
(15, 'Monday', '8:00 Am', 1, 1, '2023-08-11 14:45:56', NULL),
(16, 'Monday', '10:00 Am', 2, 2, '2023-08-11 14:46:06', NULL),
(17, 'Monday', '12:00 Pm', 3, 3, '2023-08-11 14:46:20', NULL),
(18, 'Monday', '4:00 Pm', 4, 2, '2023-08-11 14:46:37', NULL),
(19, 'Monday', '6:00 Pm', 1, 1, '2023-08-11 15:05:22', NULL),
(20, 'Monday', '8:00 Pm', 2, 2, '2023-08-11 15:05:22', NULL),
(21, 'Tuesday', '8:00 Am', 1, 1, '2023-08-11 15:27:30', NULL),
(22, 'Tuesday', '10:00 Am', 2, 2, '2023-08-11 15:27:30', NULL),
(23, 'Tuesday', '12:00 Pm', 3, 3, '2023-08-11 15:27:30', NULL),
(24, 'Tuesday', '4:00 Pm', 4, 1, '2023-08-11 15:27:30', NULL),
(25, 'Tuesday', '6:00 Pm', 1, 3, '2023-08-11 15:27:30', NULL),
(26, 'Tuesday', '8:00 Pm', 2, 2, '2023-08-11 15:27:30', NULL),
(27, 'Wednesday', '8:00 Am', 1, 1, '2023-08-11 16:08:15', NULL),
(28, 'Wednesday', '10:00 Am', 2, 2, '2023-08-11 16:08:15', NULL),
(29, 'Wednesday', '12:00 Pm', 3, 3, '2023-08-11 16:08:15', NULL),
(30, 'Wednesday', '4:00 Pm', 4, 1, '2023-08-11 16:08:15', NULL),
(31, 'Wednesday', '6:00 Pm', 1, 3, '2023-08-11 16:08:15', NULL),
(32, 'Wednesday', '8:00 Pm', 3, 2, '2023-08-11 16:08:15', NULL),
(33, 'Thursday', '8:00 Am', 1, 1, '2023-08-11 16:13:47', NULL),
(34, 'Thursday', '10:00 Am', 2, 2, '2023-08-11 16:13:47', NULL),
(35, 'Thursday', '12:00 Pm', 3, 3, '2023-08-11 16:13:47', NULL),
(36, 'Thursday', '4:00 Pm', 4, 2, '2023-08-11 16:13:47', NULL),
(37, 'Thursday', '6:00 Pm', 1, 3, '2023-08-11 16:13:47', NULL),
(38, 'Thursday', '8:00 Pm', 4, 2, '2023-08-11 16:13:47', NULL),
(39, 'Friday', '8:00 Am', 1, 3, '2023-08-11 16:17:52', NULL),
(40, 'Friday', '10:00 Am', 2, 1, '2023-08-11 16:17:52', NULL),
(41, 'Friday', '12:00 Pm', 3, 3, '2023-08-11 16:17:52', NULL),
(42, 'Friday', '4:00 Pm', 4, 2, '2023-08-11 16:17:52', NULL),
(43, 'Friday', '6:00 Pm', 2, 3, '2023-08-11 16:17:52', NULL),
(44, 'Friday', '8:00 Pm', 3, 2, '2023-08-11 16:17:52', NULL);

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
('BXPL0vSPiZX70ILbakoQgDF6svFmexMimZfFVUil', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSVY5NEdaSkcwTjg3NUdsaHpoSXprNmljUE9qQkdqSGQ5cDZzeFZnNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3QvZml0aHViL21lbWJlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czo2OiJyb2xlaWQiO2k6MztzOjc6ImxvZ2luaWQiO2k6NTg7fQ==', 1694718231),
('mmZjSVdr0fHLiQVsU4qxJsHGioMYwoUbxnJgP2yH', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMDoiaHR0cDovL2xvY2FsaG9zdC9maXRodWIvbWVtYmVyIjt9czo2OiJfdG9rZW4iO3M6NDA6Ill2ZjJERkJxWWlEZ28xTEZNQkNTUUc1SGxPVnU4SnNmZFhCRTVCUkYiO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czo2OiJyb2xlaWQiO2k6MztzOjc6ImxvZ2luaWQiO2k6NjA7fQ==', 1694751500);

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
(1, 'miltonk875@gmail.com', 'email', 'N/A', 1, '2023-07-28 04:01:43', NULL),
(2, 'Fitness Trainer', 'post', 'N/A', 1, '2023-07-28 04:17:40', NULL),
(3, 'Yoga Trainer', 'post', 'N/A', 1, '2023-07-28 04:17:58', NULL),
(4, 'Aerobics Trainer', 'post', 'N/A', 1, '2023-07-28 04:18:05', NULL),
(5, 'Basic', 'plan', '500', 1, '2023-07-28 04:18:53', NULL),
(6, 'Platinum', 'plan', '1000', 1, '2023-07-28 04:20:36', NULL),
(7, 'Gold', 'plan', '2000', 1, '2023-07-28 04:20:49', NULL),
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
(29, 'SFF', 'plan', '3000', 1, '2023-08-08 17:07:41', NULL),
(30, '8:00 Am', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(31, '10:00 Am', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(32, '12:00 Pm', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(33, '4:00 Pm', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(34, '6:00 Pm', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL),
(35, '8:00 Pm', 'time', 'N/A', 1, '2023-08-11 10:49:51', NULL);

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
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainerrecords`
--

INSERT INTO `trainerrecords` (`id`, `profile_id`, `old_trainer`, `new_trainer`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Robart D Costa', 'Nothing to say', 1, '2023-08-08 04:30:03', NULL),
(2, 3, '1', 'Ruth Edwards', 'jtvjhggjgs gerte fdd jkuy', 1, '2023-08-08 16:47:33', '2023-08-08 16:48:46');

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
  `percent` varchar(255) NOT NULL,
  `joindate` varchar(22) NOT NULL,
  `experience` tinyint(4) NOT NULL,
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
(1, 'public/trainer/bra280738517083cd71.jpg', 'Robart D Costa', 'Fitness Trainer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever.', 'Weight Lifting$$Fat Loss$$Cardio Training', 'ABCD$$CSDF$$HHH', '80$$70$$59', '2023-07-28', 3, '012345678912', 'abc@gmail.com', 'https://www.facebook.com/$$https://www.twitter.com/$$https://www.youtube.com/', 'facebook$$linkedin$$youtube', 1, '2023-07-28 02:38:30', NULL),
(2, 'public/trainer/bra280743b0ad30d159.jpg', 'Ruth Edwards', 'Yoga Trainer', 'ter took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap', 'Weight Lifting$$Fat Loss$$Cardio Training', 'ABCD$$CSDF$$HHH', '80$$70$$59', '2023-07-28', 1, '12345678901', 'vvv@gmail.com', 'https://www.facebook.com/$$https://www.twitter.com/$$https://www.youtube.com/', 'facebook$$twitter$$linkedin$$instagram$$youtube', 1, '2023-07-28 02:43:31', NULL),
(3, 'public/trainer/bra280746fa1b589fd1.jpg', 'Kate Johnson', 'Aerobics Trainer', 'ter took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the', 'Weight Lifting$$Fat Loss$$Cardio Training', 'ABCD$$CSDF$$HHH', '80$$70$$59', '2023-07-28', 4, '1234566789012', 'dd@gmail.com', 'https://www.facebook.com/$$https://www.twitter.com/$$https://www.youtube.com/', 'facebook$$twitter$$linkedin$$instagram$$youtube', 1, '2023-07-28 02:46:08', NULL);

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
  `profile_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `role_id`, `profile_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Imadul Haque', NULL, NULL, 'admin', '$2y$10$swC5iPBw7axfczwTVwNWa.qPolg0sx0ywsaKhL701w4Z.hJXZDhay', 1, 0, 1, NULL, '2023-05-12 10:30:29', '2023-06-12 13:59:45'),
(9, 'Milton Chowdhury', NULL, NULL, 'milton', '$2y$10$pDDJHM2kmyEROsdjlS.vGOXfVtwB1da0WRA19maB.xddd5AsX4IFK', 3, 1, 1, NULL, '2023-08-03 02:29:55', '2023-08-04 05:32:34'),
(10, 'Asif Kamal', NULL, NULL, 'asifkamal', '$2y$10$2ByyqrnuANEM3uiU4l0BAecdkR5GCaj/BX4aPsucbxK3JADEg2Yem', 3, 2, 1, NULL, '2023-08-08 13:15:29', '2023-08-08 13:28:38'),
(11, 'Imdadul Haque', NULL, NULL, 'imdadul', '$2y$10$4ECj9shhGkSMre/Q4GCnj.GzNV5tfmaIlIXWtZnXOqdTdmNeMqjSy', 3, 3, 1, NULL, '2023-08-08 16:23:23', '2023-08-08 16:30:24'),
(12, 'Shawon Helal', NULL, NULL, 'Shawon', '$2y$10$Tt16kBXSYHr95O7sykmHUu3SA1urdbt2C0S9vbYEmsV4whoCdlICu', 3, 4, 1, NULL, '2023-08-12 12:05:19', '2023-08-13 18:40:02'),
(13, 'Akash Khan', NULL, NULL, 'akash', '$2y$10$.vBoQ8MAXBudeQqnWmsa2epqsQpqqc/9OJUOiIj701iMiWSbubjoi', 3, 5, 1, NULL, '2023-08-13 18:21:58', '2023-08-13 19:09:57');

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
-- Indexes for table `gymclasses`
--
ALTER TABLE `gymclasses`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gainlosses`
--
ALTER TABLE `gainlosses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gymclasses`
--
ALTER TABLE `gymclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `memberschedules`
--
ALTER TABLE `memberschedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packagerecords`
--
ALTER TABLE `packagerecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `paymnets`
--
ALTER TABLE `paymnets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `singledata`
--
ALTER TABLE `singledata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `trainerrecords`
--
ALTER TABLE `trainerrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `traniners`
--
ALTER TABLE `traniners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
