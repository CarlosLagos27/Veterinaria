-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2024 a las 00:20:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'sistem123', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 'Demo test', 7, 6, 600, '2019-06-29', '9:15 AM', '2019-06-23 18:31:28', 1, 0, '0000-00-00 00:00:00'),
(4, 'Ayurveda', 5, 5, 8050, '2019-11-08', '1:00 PM', '2019-11-05 10:28:54', 1, 1, '0000-00-00 00:00:00'),
(5, 'Dermatologist', 9, 7, 500, '2019-11-30', '5:30 PM', '2019-11-10 18:41:34', 1, 0, '2019-11-10 18:48:30'),
(6, 'Dentista', 7, 2, 200, '2020-10-21', '3:30 PM', '2020-10-16 05:14:44', 0, 1, '2020-10-16 06:32:54'),
(7, 'Dentista', 7, 2, 200, '2020-10-29', '5:00 PM', '2020-10-16 06:32:26', 1, 1, NULL),
(8, 'Enfermera', 10, 9, 40, '2023-11-15', '10:15 AM', '2023-11-15 18:03:38', 1, 1, NULL),
(9, 'Médico General', 11, 9, 100, '2023-11-18', '10:15 AM', '2023-11-17 22:04:14', 1, 1, NULL),
(10, 'Médico General', 11, 9, 100, '2023-11-17', '10:15 AM', '2023-11-17 22:04:51', 0, 1, '2023-11-17 22:05:15'),
(11, 'Médico General', 11, 9, 100, '2023-11-18', '10:15 AM', '2023-11-17 22:05:53', 1, 1, NULL),
(12, 'Médico General', 11, 11, 100, '2023-11-23', '7:30 AM', '2023-11-20 08:19:17', 1, 1, NULL),
(13, 'Médico General', 11, 11, 100, '2023-11-17', '8:30 AM', '2023-11-20 08:19:44', 1, 1, NULL),
(14, 'Médico General', 11, 9, 100, '2023-11-27', '12:30 PM', '2023-11-20 18:25:00', 1, 1, NULL),
(16, 'Enfermera', 10, 9, 40, '2023-12-14', '5:45 PM', '2023-11-22 22:41:24', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` varchar(2000) NOT NULL,
  `Treatment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`id`, `doctorId`, `Title`, `Content`, `Treatment`) VALUES
(5, 11, 'PRUEBA ARTICULO 234', 'TEXTO DE PRUEBA 1\r\nTEXTO DE PRUEBA 1\r\nTEXTO DE PRUEBA 1\r\nTEXTO DE PRUEBA 1', 'TEXTO DE PRUEBA 2\r\nTEXTO DE PRUEBA 2\r\nTEXTO DE PRUEBA 2'),
(6, 11, 'PRUEBA ARTICULO 2345', 'TEXTO DE PRUEBA 1\r\nTEXTO DE PRUEBA 1\r\nTEXTO DE PRUEBA 1\r\nTEXTO DE PRUEBA 1', 'TEXTO DE PRUEBA 2\r\nTEXTO DE PRUEBA 2\r\nTEXTO DE PRUEBA 2'),
(9, 11, 'xd', 'xd', 'xd'),
(10, 11, 'SDRSAHEAJHE45RAJRSJSHSDF', 'RWYGSAGSAGSDGSDAGSAG', 'FSDFSFGSDGS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(225) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(7, 'Dentista', 'Edison', 'LORICA-KENNEDY', '200', 985632654, 'edison@gmail.com', '99439beaa5378bba676f7cab7dbcf4d8', '2017-01-07 08:08:58', '2023-11-19 01:13:32'),
(10, 'Enfermera', 'Norma Barrientos ', 'MONTERIA-LA GRANJA', '40', 956123548, 'Norma@gmail.com', '5e175f26d946b0d41259012ef4b075b1', '2020-10-16 06:20:49', '2023-11-19 01:14:05'),
(11, 'Médico General', 'Carlos Lagos', 'LORICA - SAN CARLOS Calle 22', '100', 3005568758, 'clagos@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2023-11-17 20:54:03', '2023-11-21 01:05:56'),
(12, 'Veterinario cirujano', 'Guillermo', '1', '1', 1, 'DGuillermo@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2024-05-11 19:42:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(26, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-17 21:45:20', '18-11-2023 03:16:09 AM', 1),
(27, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-17 21:46:13', '18-11-2023 03:16:29 AM', 1),
(28, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-17 22:02:27', '18-11-2023 03:32:52 AM', 1),
(29, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-17 22:07:59', '18-11-2023 03:38:29 AM', 1),
(30, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 19:55:53', '19-11-2023 02:42:24 AM', 1),
(31, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 22:31:26', '19-11-2023 04:01:53 AM', 1),
(32, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 22:32:57', '19-11-2023 04:03:58 AM', 1),
(33, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 00:23:12', '19-11-2023 05:58:35 AM', 1),
(34, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 00:50:11', '19-11-2023 06:25:31 AM', 1),
(35, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 00:57:18', NULL, 1),
(36, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 01:02:25', NULL, 1),
(37, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 01:18:29', NULL, 1),
(38, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 01:23:08', '19-11-2023 07:23:06 AM', 1),
(39, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 04:55:33', '19-11-2023 10:25:38 AM', 1),
(40, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 05:12:56', '19-11-2023 12:01:53 PM', 1),
(41, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 18:51:31', '20-11-2023 12:21:48 AM', 1),
(42, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 18:53:31', '20-11-2023 12:23:51 AM', 1),
(43, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:05:06', NULL, 0),
(44, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:05:11', '20-11-2023 01:37:36 AM', 1),
(45, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:09:52', NULL, 0),
(46, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:10:01', '20-11-2023 01:44:48 AM', 1),
(47, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:15:33', NULL, 0),
(48, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:15:38', NULL, 1),
(49, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:31:27', NULL, 1),
(50, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 00:07:53', NULL, 1),
(51, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 04:45:00', NULL, 1),
(52, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 05:52:09', NULL, 1),
(53, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 07:06:18', NULL, 1),
(54, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 07:29:07', '20-11-2023 01:00:33 PM', 1),
(55, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 07:35:41', '20-11-2023 01:11:29 PM', 1),
(56, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 07:41:36', '20-11-2023 01:52:21 PM', 1),
(57, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:23:08', NULL, 1),
(58, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:49:21', '20-11-2023 08:22:04 PM', 1),
(59, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:52:40', NULL, 0),
(60, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:52:46', NULL, 1),
(61, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 15:01:29', NULL, 1),
(62, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 15:02:43', NULL, 1),
(63, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 18:15:43', '20-11-2023 11:54:15 PM', 1),
(64, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 18:40:39', NULL, 0),
(65, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 18:40:52', '21-11-2023 12:16:41 AM', 1),
(66, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 19:19:22', NULL, 1),
(67, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-21 00:37:48', NULL, 1),
(68, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 19:05:14', '23-11-2023 01:21:50 AM', 1),
(69, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 20:35:52', '23-11-2023 02:07:52 AM', 1),
(70, NULL, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 20:37:59', NULL, 0),
(71, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 20:41:35', NULL, 0),
(72, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 20:41:39', '23-11-2023 02:15:21 AM', 1),
(73, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 21:22:27', '23-11-2023 03:01:56 AM', 1),
(74, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 21:39:53', '23-11-2023 03:16:21 AM', 1),
(75, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 22:33:37', '23-11-2023 04:04:07 AM', 1),
(76, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 22:34:14', NULL, 1),
(77, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-23 17:58:41', NULL, 1),
(78, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-24 18:40:36', NULL, 1),
(79, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-25 01:05:23', NULL, 1),
(80, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 09:59:45', NULL, 1),
(81, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 22:18:35', '09-05-2024 04:27:28 AM', 1),
(82, NULL, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 23:56:41', NULL, 0),
(83, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 23:56:45', '09-05-2024 05:27:54 AM', 1),
(84, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-10 18:52:56', '11-05-2024 12:23:00 AM', 1),
(85, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2024-05-10 18:54:52', NULL, 0),
(86, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-10 18:54:57', '11-05-2024 12:25:16 AM', 1),
(87, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-10 19:01:37', '11-05-2024 12:31:44 AM', 1),
(88, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 08:32:29', NULL, 1),
(89, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 08:38:43', NULL, 1),
(90, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 09:09:56', '11-05-2024 02:40:09 PM', 1),
(91, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 09:13:51', '11-05-2024 02:44:28 PM', 1),
(92, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 09:15:05', '11-05-2024 02:49:57 PM', 1),
(93, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:08:12', '12-05-2024 12:38:25 AM', 1),
(94, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:26:50', '12-05-2024 12:57:33 AM', 1),
(95, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:29:32', '12-05-2024 01:01:40 AM', 1),
(96, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:32:50', '12-05-2024 01:04:08 AM', 1),
(97, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:35:10', '12-05-2024 01:05:35 AM', 1),
(98, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:36:16', '12-05-2024 01:06:37 AM', 1),
(99, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:36:54', '12-05-2024 01:10:00 AM', 1),
(100, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:43:10', '12-05-2024 01:13:23 AM', 1),
(101, 12, 'DGuillermo@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:43:32', '12-05-2024 01:13:49 AM', 1),
(102, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 20:07:20', '12-05-2024 01:38:06 AM', 1),
(103, 11, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 20:08:33', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(15, 'Veterinario ortopedista', '2024-04-28 18:31:03', NULL),
(16, 'Veterinario cirujano', '2024-04-28 18:31:22', NULL),
(17, 'Veterinario oncólogo', '2024-04-28 18:31:33', NULL),
(18, 'Veterinario oftalmólogo', '2024-04-28 18:31:48', NULL),
(19, 'Veterinario fisioterapeuta', '2024-04-28 18:32:12', NULL),
(20, 'Veterinario dermatólogo', '2024-04-28 18:32:36', NULL),
(22, 'Veterinario general', '2024-04-28 18:32:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `Time`) VALUES
(71, 11, 9, 'Hola', '2024-05-11 19:01:27'),
(72, 11, 9, 'Doc', '2024-05-11 19:01:34'),
(73, 11, 9, 'Doc', '2024-05-11 19:03:13'),
(74, 11, 9, '1', '2024-05-11 19:03:19'),
(75, 9, 11, 'Si', '2024-05-11 19:08:20'),
(76, 9, 11, 'cOMO ESTAS', '2024-05-11 19:30:25'),
(77, 9, 11, 'SGASGDAFHDAFGHDFHDFAHDFSHDFAHDFHDF', '2024-05-11 19:33:14'),
(78, 11, 9, 'WDQWDDSA', '2024-05-11 19:35:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'test user', 'test@gmail.com', 2523523522523523, ' This is sample text for the test.', '2019-06-29 19:03:08', 'Test Admin Remark', '2019-06-30 12:55:23', 1),
(2, 'Anuj kumar', 'phpgurukulofficial@gmail.com', 1111111111111111, ' This is sample text for testing.  This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing.', '2019-06-30 13:06:50', 'aaaaaaaaaaaaa', '2020-10-16 06:04:47', 1),
(3, 'fdsfsdf', 'fsdfsd@ghashhgs.com', 3264826346, 'sample text   sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  ', '2019-11-10 18:53:48', 'vfdsfgfd', '2019-11-10 18:54:04', 1),
(4, 'jhon machado', 'herfory@gmail.com', 3333, ' hola! esto es un ejemplo', '2023-11-17 21:44:24', 'esto es una respuesta de ejemplo', '2023-11-19 06:03:17', 1),
(5, 'Edwin Gonzales', 'edwin@gmail.com', 3234568756, ' esto es un texto de pruebaaa!!!!', '2024-04-26 01:49:43', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `NombreM` varchar(100) NOT NULL,
  `TMascota` varchar(100) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Sex` varchar(100) NOT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `Rmedica` varchar(500) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `NombreM`, `TMascota`, `Weight`, `Sex`, `MedicalPres`, `Rmedica`, `CreationDate`) VALUES
(2, 3, '', '', '85 Kg', '', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '', '2019-11-06 04:20:07'),
(3, 2, '', '', '86 kg', '', '#Sugar High\r\n1.Petz 30', '', '2019-11-06 04:31:24'),
(4, 1, '', '', '56 kg', '', '# blood pressure is high\r\n1.koil cipla', '', '2019-11-06 04:52:42'),
(5, 1, '', '', '57 kg', '', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '', '2019-11-06 04:56:55'),
(6, 4, '', '', '56', '', '#blood sugar high\r\n#Asthma problem', '', '2019-11-06 14:38:33'),
(7, 5, '', '', '85', '', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '', '2019-11-10 18:50:23'),
(8, 7, '', '', '70', '', 'dolor de estomago y colico ', '', '2020-10-16 06:28:28'),
(9, 11, '', '', '70', 'masculino', '', '', '2024-04-28 21:08:13'),
(10, 11, '', '', '86', 'masculino', '', '', '2024-04-28 21:15:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientAdd`, `CreationDate`, `UpdationDate`) VALUES
(3, 7, 'Maria', 9878978798, 'jk@gmail.com', 'NARIÑO', '2019-11-05 10:49:41', '2023-11-19 05:29:21'),
(5, 9, 'John', 1234567890, 'john@test.com', 'Test ', '2019-11-10 18:49:24', NULL),
(6, 7, 'carlos', 945632186, 'carlos@gmail.com', 'NARIÑO', '2020-10-15 04:56:00', '2023-11-19 05:28:33'),
(7, 7, 'Juan carlos', 945632186, 'juancarlos@gmail.com', 'PALO DE AGUA', '2020-10-16 06:27:36', '2023-11-19 05:28:43'),
(8, 11, 'Jose', 3052640317, 'Jose@gmail.com', 'San carlos Lorica call 14', '2023-11-19 20:11:42', '2023-11-21 00:54:36'),
(11, 11, 'Francisco Cavadia', 312000988, 'Francisco@gmail.com', 'San Carlos', '2024-04-28 20:29:10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-15 05:56:38', NULL, 1),
(25, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-16 04:39:08', '16-10-2020 11:02:58 AM', 1),
(26, NULL, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-16 06:29:47', NULL, 0),
(27, 2, 'edisonsistem@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-16 06:30:03', '16-10-2020 12:03:14 PM', 1),
(28, NULL, 'herfory@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-15 05:34:34', NULL, 0),
(29, 8, 'herfory@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-15 05:34:45', '15-11-2023 11:07:40 AM', 1),
(30, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-15 05:55:00', '15-11-2023 11:25:08 AM', 1),
(31, NULL, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-15 18:01:31', NULL, 0),
(32, NULL, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-15 18:01:47', NULL, 0),
(33, NULL, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-15 18:01:58', NULL, 0),
(34, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-15 18:02:43', '15-11-2023 11:34:00 PM', 1),
(35, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-16 03:47:26', '16-11-2023 09:17:50 AM', 1),
(36, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-17 21:46:36', NULL, 1),
(37, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-17 22:03:02', NULL, 1),
(38, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 06:01:21', '18-11-2023 11:33:24 AM', 1),
(39, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 19:42:11', '19-11-2023 01:13:20 AM', 1),
(40, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 19:53:32', '19-11-2023 01:23:35 AM', 1),
(41, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 19:55:36', NULL, 1),
(42, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 21:23:31', NULL, 1),
(43, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-18 22:38:29', '19-11-2023 05:44:06 AM', 1),
(44, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 00:55:41', '19-11-2023 06:27:04 AM', 1),
(45, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 00:58:39', NULL, 1),
(46, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 01:06:53', NULL, 1),
(47, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 01:19:02', '19-11-2023 06:52:46 AM', 1),
(48, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 18:51:55', '20-11-2023 12:23:23 AM', 1),
(49, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 18:54:00', NULL, 1),
(50, NULL, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:03:30', NULL, 0),
(51, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:03:35', '20-11-2023 01:34:55 AM', 1),
(52, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-19 20:14:54', '20-11-2023 05:37:47 AM', 1),
(53, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 07:28:07', NULL, 1),
(54, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 07:30:48', '20-11-2023 01:05:34 PM', 1),
(55, NULL, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:18:33', NULL, 0),
(56, 11, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:19:04', '20-11-2023 01:51:25 PM', 1),
(57, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:21:32', NULL, 0),
(58, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:21:37', NULL, 0),
(59, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:21:43', NULL, 0),
(60, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:21:48', NULL, 0),
(61, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:21:57', NULL, 0),
(62, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:22:08', NULL, 0),
(63, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 08:22:30', '20-11-2023 08:19:43 PM', 1),
(64, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:49:54', '20-11-2023 08:21:57 PM', 1),
(65, 11, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:52:11', '20-11-2023 08:25:54 PM', 1),
(66, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:56:00', NULL, 0),
(67, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:56:07', NULL, 0),
(68, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:56:15', NULL, 0),
(69, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:56:21', NULL, 0),
(70, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:56:35', NULL, 0),
(71, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:56:40', NULL, 0),
(72, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:56:51', NULL, 0),
(73, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:57:20', NULL, 0),
(74, 11, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:57:27', '25-11-2023 12:12:50 AM', 1),
(75, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 14:59:35', NULL, 0),
(76, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 15:01:10', NULL, 1),
(77, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 18:24:25', '21-11-2023 12:00:48 AM', 1),
(78, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 18:31:11', '21-11-2023 12:10:11 AM', 1),
(79, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 18:47:10', '21-11-2023 12:21:23 AM', 1),
(80, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-20 19:17:18', '21-11-2023 06:07:41 AM', 1),
(81, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 18:54:49', '23-11-2023 12:35:07 AM', 1),
(82, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 19:17:58', NULL, 0),
(83, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 19:18:03', NULL, 0),
(84, NULL, 'Fracisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 19:18:07', NULL, 0),
(85, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 19:18:24', '23-11-2023 12:54:53 AM', 1),
(86, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 19:51:58', '23-11-2023 02:05:45 AM', 1),
(87, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 20:38:20', '23-11-2023 02:11:28 AM', 1),
(88, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 20:45:32', '23-11-2023 02:52:18 AM', 1),
(89, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-22 21:46:31', NULL, 1),
(90, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-23 17:57:37', NULL, 1),
(91, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-24 18:40:16', NULL, 1),
(92, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-24 18:42:58', NULL, 1),
(93, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-26 02:18:05', NULL, 0),
(94, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2024-04-26 02:18:10', NULL, 0),
(95, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-26 02:18:13', NULL, 0),
(96, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2024-04-26 02:18:20', NULL, 0),
(97, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2024-04-26 02:18:28', NULL, 0),
(98, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-26 02:19:39', '26-04-2024 07:50:49 AM', 1),
(99, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-27 14:50:37', '27-04-2024 08:21:01 PM', 1),
(100, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-27 14:58:58', '27-04-2024 08:29:02 PM', 1),
(101, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-27 15:46:12', '27-04-2024 09:16:43 PM', 1),
(102, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-27 16:09:42', '27-04-2024 09:39:52 PM', 1),
(103, 12, 'ED@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-27 18:43:28', '28-04-2024 12:13:33 AM', 1),
(104, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-27 19:15:06', '28-04-2024 12:46:42 AM', 1),
(105, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-28 18:10:32', '28-04-2024 11:41:07 PM', 1),
(106, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-28 18:19:09', '28-04-2024 11:58:31 PM', 1),
(107, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-28 18:37:53', '29-04-2024 12:08:16 AM', 1),
(108, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 20:28:52', '09-05-2024 01:59:40 AM', 1),
(109, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 20:31:41', NULL, 1),
(110, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 22:59:11', NULL, 0),
(111, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 22:59:14', '09-05-2024 05:01:15 AM', 1),
(112, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 23:56:01', '09-05-2024 05:26:33 AM', 1),
(113, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-08 23:58:00', '09-05-2024 05:41:24 AM', 1),
(114, 11, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-09 00:08:15', NULL, 1),
(115, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-09 00:38:08', '09-05-2024 06:34:08 AM', 1),
(116, 11, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-09 01:12:46', NULL, 1),
(117, 11, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-10 18:52:29', '11-05-2024 12:22:47 AM', 1),
(118, 11, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-10 18:55:23', '11-05-2024 12:25:32 AM', 1),
(119, NULL, 'clagos@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-10 19:02:13', NULL, 0),
(120, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-10 19:02:16', '11-05-2024 12:32:26 AM', 1),
(121, 11, 'LuisG@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 08:23:36', '11-05-2024 02:17:10 PM', 1),
(122, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 08:47:17', NULL, 1),
(123, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 09:10:16', '11-05-2024 02:43:45 PM', 1),
(124, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 09:14:35', '11-05-2024 02:44:56 PM', 1),
(125, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 09:20:07', '12-05-2024 12:38:02 AM', 1),
(126, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:08:32', '12-05-2024 12:56:44 AM', 1),
(127, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:27:40', '12-05-2024 12:59:01 AM', 1),
(128, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:31:49', '12-05-2024 01:02:44 AM', 1),
(129, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:34:30', '12-05-2024 01:05:03 AM', 1),
(130, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:35:39', '12-05-2024 01:06:10 AM', 1),
(131, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:37:37', NULL, 1),
(132, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 19:48:06', '12-05-2024 01:22:00 AM', 1),
(133, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 20:08:14', '12-05-2024 01:38:26 AM', 1),
(134, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 20:17:59', '12-05-2024 01:52:31 AM', 1),
(135, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 21:48:22', '12-05-2024 03:18:26 AM', 1),
(136, 9, 'Francisco@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-11 22:17:18', '12-05-2024 03:47:53 AM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(6, 'Test', 'Nariño', 'Lorica', 'male', 'tetuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-06-23 18:24:53', '2023-11-19 22:14:09'),
(9, 'Francisco Cavadia', 'Nariño\r\n', 'Lorica', 'male', 'Francisco@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-11-15 05:45:38', '2023-11-19 21:37:48'),
(11, 'Luis Guillermo', 'Calle 21', 'Lorica', 'male', 'LuisG@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-11-20 08:18:03', '2023-11-20 08:18:57'),
(12, 'EDWIN GONZA', 'BARRIO FINZENÚ', 'Lorica', 'male', 'ED@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2024-04-27 18:42:07', '2024-05-09 01:05:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indices de la tabla `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
