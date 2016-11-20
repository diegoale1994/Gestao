-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2016 a las 03:51:02
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestao`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cant_equipos` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `cant_personas` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `piso` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `nombre`, `cant_equipos`, `cant_personas`, `piso`, `created_at`, `updated_at`) VALUES
('1', 'Sala 01', '19', '20', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('10', 'Sala 10', '18', '20', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('2', 'Sala 02', '18', '20', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3', 'Sala 03', '20', '20', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('4', 'Sala 04', '13', '20', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5', 'Sala 05', '17', '20', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('6', 'Sala 06', '29', '20', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('7', 'Sala 07', '18', '20', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('8', 'Sala 08', '17', '20', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('9', 'Sala 09', '17', '20', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grupo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creditos` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_docente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `semestre` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cant_estudiantes` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `requerimientos` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id`, `nombre`, `grupo`, `creditos`, `id_docente`, `semestre`, `cant_estudiantes`, `requerimientos`, `created_at`, `updated_at`) VALUES
('ANFIND', 'Analisis Financiero', 'CONT501D', '', NULL, '5', '14', '', '2016-11-20 02:44:03', '2016-11-20 02:44:03'),
('ANFINN', 'Analisis Financiero', 'CONT501N', '', NULL, '', '15', '', '2016-11-20 02:45:02', '2016-11-20 02:45:02'),
('CAPACT', 'Capacitaciones Tics', '', '', NULL, '', '11', '', '2016-11-20 01:53:51', '2016-11-20 01:53:51'),
('CARINF', 'Informatica Basica Cartografia', 'CART101', '', NULL, '1', '11', '', '2016-11-20 01:24:33', '2016-11-20 01:24:33'),
('CARTSIG', 'Cart-S.I.G', '', '', NULL, '', '12', '', '2016-11-20 02:27:40', '2016-11-20 02:27:40'),
('COMDAT', 'Comunicacion De Datos 1', 'SIS601', '', NULL, '6', '21', '', '2016-11-20 01:25:34', '2016-11-20 01:26:45'),
('COMELE', 'Comercio Electronico', 'ADMIN901D', '', NULL, '9', '12', '', '2016-11-20 01:28:53', '2016-11-20 01:28:53'),
('CONTA3', 'Contabilidad 3', 'CONT302N', '', NULL, '3', '11', '', '2016-11-20 02:22:18', '2016-11-20 02:22:18'),
('CONTA4', 'Contabilidad 4', 'CONT401N', '', NULL, '4', '23', '', '2016-11-20 01:38:42', '2016-11-20 01:38:42'),
('ELBAIN', 'Electiva Basica De Ingenieria', 'ELEC104', '', NULL, '1', '20', '', '2016-11-20 02:24:00', '2016-11-20 02:24:00'),
('ELECT6', 'Electiva 6', '', '', NULL, '', '15', '', '2016-11-20 01:35:34', '2016-11-20 01:35:34'),
('ELEED1', 'Electiva Educacion 1', 'MAT801', '', NULL, '8', '18', '', '2016-11-20 01:21:02', '2016-11-20 01:21:02'),
('ELEED2', 'Electiva Educacion 2', 'MAT901', '', NULL, '9', '8', '', '2016-11-20 01:09:40', '2016-11-20 01:18:06'),
('ELPRO3', 'Electiva Profesional 3', 'SIS1001', '', NULL, '10', '22', '', '2016-11-20 01:55:25', '2016-11-20 01:55:25'),
('FODEPR', 'Formulacion De Proyectos', 'ADMIN801N', '', NULL, '8', '20', '', '2016-11-20 01:50:04', '2016-11-20 01:50:04'),
('FUNLO1', 'Fundamentos De Logica', 'ELECT105', '', NULL, '1', '16', '', '2016-11-20 02:17:42', '2016-11-20 02:17:42'),
('FUNLOG', 'Fundamentos De Logica', 'ELECT104', '', NULL, '1', '27', '', '2016-11-20 01:43:20', '2016-11-20 01:43:20'),
('FUNPRO', 'Fundamentos De Programacion', 'ELECT205', '', NULL, '2', '19', '', '2016-11-20 02:19:51', '2016-11-20 02:19:51'),
('GESTEC', 'Gestion Tecnologica', 'ADMIN901D', '', NULL, '9', '22', '', '2016-11-20 01:30:49', '2016-11-20 01:30:49'),
('LEGINF', 'Legislacion Informatica', 'SIS701', '', NULL, '7', '19', '', '2016-11-20 01:40:32', '2016-11-20 01:40:32'),
('MATEM3', 'Matematicas 3', '', '', NULL, '', '14', '', '2016-11-20 01:13:08', '2016-11-20 01:13:08'),
('MOCOFI', 'Modelos Contables Financieros', 'CONT801D', '', NULL, '', '19', '', '2016-11-20 02:38:31', '2016-11-20 02:38:31'),
('OFIEDU', 'Educacion Virtual A Distancia', '', '', NULL, '', '10', '', '2016-11-20 01:11:21', '2016-11-20 01:11:21'),
('PENLOG', 'Pensamiento Logico', 'MAT301', '', NULL, '3', '19', '', '2016-11-20 01:07:47', '2016-11-20 01:07:47'),
('PROGR2', 'Programacion 2', 'SIS303', '', NULL, '3', '20', '', '2016-11-20 01:52:29', '2016-11-20 01:52:29'),
('PROPS1', 'Programacion Para Sig 1', 'CART301', '', NULL, '3', '18', '', '2016-11-20 01:37:01', '2016-11-20 01:37:01'),
('SENINF', 'Informatica Basica', '', '', NULL, '', '17', '', '2016-11-20 01:05:36', '2016-11-20 01:05:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_aula_horario`
--

CREATE TABLE `clase_aula_horario` (
  `id_clase` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_aula` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora_inicio` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `hora_final` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `id_persona` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `observaciones` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clase_aula_horario`
--

INSERT INTO `clase_aula_horario` (`id_clase`, `id_aula`, `hora_inicio`, `hora_final`, `id_persona`, `fecha`, `observaciones`) VALUES
('ANFIND', NULL, '15', '18', NULL, '2016-11-25', NULL),
('ANFIND', NULL, '15', '18', NULL, '2016-12-02', NULL),
('ANFIND', NULL, '15', '18', NULL, '2016-12-09', NULL),
('ANFINN', NULL, '18', '21', NULL, '2016-11-25', NULL),
('ANFINN', NULL, '18', '21', NULL, '2016-12-02', NULL),
('ANFINN', NULL, '18', '21', NULL, '2016-12-09', NULL),
('CAPACT', NULL, '17', '19', NULL, '2016-11-22', NULL),
('CAPACT', NULL, '17', '19', NULL, '2016-11-29', NULL),
('CAPACT', NULL, '17', '19', NULL, '2016-12-06', NULL),
('CAPACT', NULL, '17', '19', NULL, '2016-12-13', NULL),
('CARINF', NULL, '8', '10', NULL, '2016-11-23', NULL),
('CARINF', NULL, '8', '10', NULL, '2016-11-30', NULL),
('CARINF', NULL, '8', '10', NULL, '2016-12-07', NULL),
('CARINF', NULL, '8', '10', NULL, '2016-12-14', NULL),
('CARTSIG', NULL, '13', '15', NULL, '2016-11-24', NULL),
('CARTSIG', NULL, '13', '15', NULL, '2016-12-01', NULL),
('CARTSIG', NULL, '13', '15', NULL, '2016-12-08', NULL),
('CARTSIG', NULL, '13', '15', NULL, '2016-12-15', NULL),
('COMDAT', NULL, '10', '12', NULL, '2016-11-23', NULL),
('COMDAT', NULL, '10', '12', NULL, '2016-11-30', NULL),
('COMDAT', NULL, '10', '12', NULL, '2016-12-07', NULL),
('COMDAT', NULL, '10', '12', NULL, '2016-12-14', NULL),
('COMELE', NULL, '14', '16', NULL, '2016-11-23', NULL),
('COMELE', NULL, '14', '16', NULL, '2016-11-30', NULL),
('COMELE', NULL, '14', '16', NULL, '2016-12-07', NULL),
('COMELE', NULL, '14', '16', NULL, '2016-12-14', NULL),
('CONTA3', NULL, '18', '21', NULL, '2016-11-23', NULL),
('CONTA3', NULL, '18', '21', NULL, '2016-11-30', NULL),
('CONTA3', NULL, '18', '21', NULL, '2016-12-07', NULL),
('CONTA3', NULL, '18', '21', NULL, '2016-12-14', NULL),
('CONTA4', NULL, '18', '21', NULL, '2016-11-24', NULL),
('CONTA4', NULL, '18', '21', NULL, '2016-12-01', NULL),
('CONTA4', NULL, '18', '21', NULL, '2016-12-08', NULL),
('CONTA4', NULL, '18', '21', NULL, '2016-12-15', NULL),
('ELBAIN', NULL, '7', '10', NULL, '2016-11-24', NULL),
('ELBAIN', NULL, '7', '10', NULL, '2016-12-01', NULL),
('ELBAIN', NULL, '7', '10', NULL, '2016-12-08', NULL),
('ELBAIN', NULL, '7', '10', NULL, '2016-12-15', NULL),
('ELECT6', NULL, '13', '15', NULL, '2016-11-24', NULL),
('ELECT6', NULL, '13', '15', NULL, '2016-12-01', NULL),
('ELECT6', NULL, '13', '15', NULL, '2016-12-08', NULL),
('ELECT6', NULL, '13', '15', NULL, '2016-12-15', NULL),
('ELEED1', NULL, '19', '21', NULL, '2016-11-22', NULL),
('ELEED1', NULL, '18', '20', NULL, '2016-11-25', NULL),
('ELEED1', NULL, '19', '21', NULL, '2016-11-29', NULL),
('ELEED1', NULL, '18', '20', NULL, '2016-12-02', NULL),
('ELEED1', NULL, '19', '21', NULL, '2016-12-06', NULL),
('ELEED1', NULL, '18', '20', NULL, '2016-12-09', NULL),
('ELEED1', NULL, '19', '21', NULL, '2016-12-13', NULL),
('ELEED2', NULL, '19', '21', NULL, '2016-11-21', NULL),
('ELEED2', NULL, '14', '16', NULL, '2016-11-25', NULL),
('ELEED2', NULL, '19', '21', NULL, '2016-11-28', NULL),
('ELEED2', NULL, '14', '16', NULL, '2016-12-02', NULL),
('ELEED2', NULL, '19', '21', NULL, '2016-12-05', NULL),
('ELEED2', NULL, '14', '16', NULL, '2016-12-09', NULL),
('ELEED2', NULL, '19', '21', NULL, '2016-12-12', NULL),
('ELPRO3', NULL, '9', '11', NULL, '2016-11-23', NULL),
('ELPRO3', NULL, '9', '11', NULL, '2016-11-30', NULL),
('ELPRO3', NULL, '9', '11', NULL, '2016-12-07', NULL),
('ELPRO3', NULL, '9', '11', NULL, '2016-12-14', NULL),
('FODEPR', NULL, '18', '21', NULL, '2016-11-21', NULL),
('FODEPR', NULL, '18', '21', NULL, '2016-11-28', NULL),
('FODEPR', NULL, '18', '21', NULL, '2016-12-05', NULL),
('FODEPR', NULL, '18', '21', NULL, '2016-12-12', NULL),
('FUNLO1', NULL, '14', '16', NULL, '2016-11-23', NULL),
('FUNLO1', NULL, '11', '13', NULL, '2016-11-25', NULL),
('FUNLO1', NULL, '14', '16', NULL, '2016-11-30', NULL),
('FUNLO1', NULL, '11', '13', NULL, '2016-12-02', NULL),
('FUNLO1', NULL, '14', '16', NULL, '2016-12-07', NULL),
('FUNLO1', NULL, '11', '13', NULL, '2016-12-09', NULL),
('FUNLO1', NULL, '14', '16', NULL, '2016-12-14', NULL),
('FUNLOG', NULL, '16', '18', NULL, '2016-11-25', NULL),
('FUNLOG', NULL, '16', '18', NULL, '2016-12-02', NULL),
('FUNLOG', NULL, '16', '18', NULL, '2016-12-09', NULL),
('FUNPRO', NULL, '16', '18', NULL, '2016-11-23', NULL),
('FUNPRO', NULL, '16', '18', NULL, '2016-11-30', NULL),
('FUNPRO', NULL, '16', '18', NULL, '2016-12-07', NULL),
('FUNPRO', NULL, '16', '18', NULL, '2016-12-14', NULL),
('GESTEC', NULL, '16', '18', NULL, '2016-11-23', NULL),
('GESTEC', NULL, '16', '18', NULL, '2016-11-30', NULL),
('GESTEC', NULL, '16', '18', NULL, '2016-12-07', NULL),
('GESTEC', NULL, '16', '18', NULL, '2016-12-14', NULL),
('LEGINF', NULL, '10', '13', NULL, '2016-11-25', NULL),
('LEGINF', NULL, '10', '13', NULL, '2016-12-02', NULL),
('LEGINF', NULL, '10', '13', NULL, '2016-12-09', NULL),
('MATEM3', NULL, '16', '18', NULL, '2016-11-22', NULL),
('MATEM3', NULL, '16', '18', NULL, '2016-11-29', NULL),
('MATEM3', NULL, '16', '18', NULL, '2016-12-06', NULL),
('MATEM3', NULL, '16', '18', NULL, '2016-12-13', NULL),
('MOCOFI', NULL, '15', '21', NULL, '2016-11-24', NULL),
('MOCOFI', NULL, '15', '21', NULL, '2016-12-01', NULL),
('MOCOFI', NULL, '15', '21', NULL, '2016-12-08', NULL),
('MOCOFI', NULL, '15', '21', NULL, '2016-12-15', NULL),
('OFIEDU', NULL, '8', '12', NULL, '2016-11-21', NULL),
('OFIEDU', NULL, '15', '16', NULL, '2016-11-22', NULL),
('OFIEDU', NULL, '9', '10', NULL, '2016-11-24', NULL),
('OFIEDU', NULL, '8', '12', NULL, '2016-11-28', NULL),
('OFIEDU', NULL, '15', '16', NULL, '2016-11-29', NULL),
('OFIEDU', NULL, '9', '10', NULL, '2016-12-01', NULL),
('OFIEDU', NULL, '8', '12', NULL, '2016-12-05', NULL),
('OFIEDU', NULL, '15', '16', NULL, '2016-12-06', NULL),
('OFIEDU', NULL, '9', '10', NULL, '2016-12-08', NULL),
('OFIEDU', NULL, '8', '12', NULL, '2016-12-12', NULL),
('OFIEDU', NULL, '15', '16', NULL, '2016-12-13', NULL),
('OFIEDU', NULL, '9', '10', NULL, '2016-12-15', NULL),
('PENLOG', NULL, '16', '18', NULL, '2016-11-21', NULL),
('PENLOG', NULL, '18', '20', NULL, '2016-11-23', NULL),
('PENLOG', NULL, '16', '18', NULL, '2016-11-28', NULL),
('PENLOG', NULL, '18', '20', NULL, '2016-11-30', NULL),
('PENLOG', NULL, '16', '18', NULL, '2016-12-05', NULL),
('PENLOG', NULL, '18', '20', NULL, '2016-12-07', NULL),
('PENLOG', NULL, '16', '18', NULL, '2016-12-12', NULL),
('PENLOG', NULL, '18', '20', NULL, '2016-12-14', NULL),
('PROGR2', NULL, '14', '17', NULL, '2016-11-22', NULL),
('PROGR2', NULL, '11', '14', NULL, '2016-11-23', NULL),
('PROGR2', NULL, '14', '17', NULL, '2016-11-29', NULL),
('PROGR2', NULL, '11', '14', NULL, '2016-11-30', NULL),
('PROGR2', NULL, '14', '17', NULL, '2016-12-06', NULL),
('PROGR2', NULL, '11', '14', NULL, '2016-12-07', NULL),
('PROGR2', NULL, '14', '17', NULL, '2016-12-13', NULL),
('PROGR2', NULL, '11', '14', NULL, '2016-12-14', NULL),
('PROPS1', NULL, '14', '16', NULL, '2016-11-24', NULL),
('PROPS1', NULL, '14', '16', NULL, '2016-12-01', NULL),
('PROPS1', NULL, '14', '16', NULL, '2016-12-08', NULL),
('PROPS1', NULL, '14', '16', NULL, '2016-12-15', NULL),
('SENINF', NULL, '7', '11', NULL, '2016-11-21', NULL),
('SENINF', NULL, '7', '11', NULL, '2016-11-28', NULL),
('SENINF', NULL, '7', '11', NULL, '2016-12-05', NULL),
('SENINF', NULL, '7', '11', NULL, '2016-12-12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constante`
--

CREATE TABLE `constante` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `constante`
--

INSERT INTO `constante` (`id`, `valor`, `created_at`, `updated_at`) VALUES
('FINSEM', '2016-12-16', '0000-00-00 00:00:00', '2016-11-20 00:58:19'),
('INISEM', '2016-08-08', '0000-00-00 00:00:00', '2016-11-20 00:58:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `persona_id` int(10) UNSIGNED NOT NULL,
  `codigo` int(11) NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twiter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `activo` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `persona_id` int(10) UNSIGNED NOT NULL,
  `codigo` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`persona_id`, `codigo`, `semestre`, `created_at`, `updated_at`) VALUES
(4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_clase`
--

CREATE TABLE `estudiante_clase` (
  `id_persona` int(10) UNSIGNED NOT NULL,
  `id_clase` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_03_182524_create_programa_table', 1),
('2016_09_03_182530_create_persona_table', 1),
('2016_09_03_184556_create_estudiante_table', 1),
('2016_09_03_192553_create_docente_table', 1),
('2016_09_03_200356_create_clase_table', 1),
('2016_09_03_202226_create_estudiante_clase_table', 1),
('2016_09_03_203340_create_aula_table', 1),
('2016_09_03_211734_create_clase_aula_horario_table', 1),
('2016_09_21_111708_create_constante_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(10) UNSIGNED NOT NULL,
  `programa_id` int(10) UNSIGNED NOT NULL,
  `nombre1` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido1` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellido2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cell_token` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `programa_id`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `email`, `password`, `rol`, `estado`, `telefono`, `cell_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '', NULL, '', NULL, 'mail@mail.com', '$2y$10$Om957BI2vnNwAN/64ZdPL.x2w0mRZ7SmedIkdja5HHzK34QBfif1a', 'M', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '', NULL, '', NULL, 'anieto@mail.com', '$2y$10$ucHqyi1W8cU8vn0MAUOORu5NjcTszzEJyhZbEMdCu1td6gw8DnSaW', 'M', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, '', NULL, '', NULL, 'diego.fc.1@hotmail.com', '$2y$10$nx4ALfKD/1oYRUyIEwtmt.y/CZ/vPUihEWg9AdZ63JhBNsgZYY8jK', 'M', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'd', NULL, 'd', NULL, 'd@d.com', '7c222fb2927d828af22f592134e8932480637c0d', 'E', 'A', '', 'e3RcjYOButg:APA91bFvOy2H3H4rlivraFsy6t98yse1eGGFGWKYO97oOdC4a0Wx9DVEfwE7MqLm0GnKctc2i3dn8uTeOrnm6gTwitV44y_CRdoVhdIrXNVurDkqxN_8WcGrdJeLiAvOguxMCE1RaVJx', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ingenieria de sistemas', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aula_nombre_unique` (`nombre`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clase_aula_horario`
--
ALTER TABLE `clase_aula_horario`
  ADD PRIMARY KEY (`id_clase`,`fecha`);

--
-- Indices de la tabla `constante`
--
ALTER TABLE `constante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`persona_id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`persona_id`);

--
-- Indices de la tabla `estudiante_clase`
--
ALTER TABLE `estudiante_clase`
  ADD PRIMARY KEY (`id_persona`,`id_clase`),
  ADD KEY `estudiante_clase_id_clase_foreign` (`id_clase`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persona_email_unique` (`email`),
  ADD KEY `persona_programa_id_foreign` (`programa_id`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clase_aula_horario`
--
ALTER TABLE `clase_aula_horario`
  ADD CONSTRAINT `clase_aula_horario_id_clase_foreign` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `estudiante_clase`
--
ALTER TABLE `estudiante_clase`
  ADD CONSTRAINT `estudiante_clase_id_clase_foreign` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id`),
  ADD CONSTRAINT `estudiante_clase_id_persona_foreign` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_programa_id_foreign` FOREIGN KEY (`programa_id`) REFERENCES `programa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
