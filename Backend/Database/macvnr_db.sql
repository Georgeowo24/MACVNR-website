-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2024 a las 22:29:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `macvnr_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `First_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`First_Name`, `Email`, `Password`) VALUES
('Jose Francisco', 'fmartine@inaoep.mx', '$2y$10$JkudT245nuvcVa5xzVnWTOudb/uYaSNZK1zX7GWn7bMqHlWo7EIJu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `Event_Name` varchar(25) NOT NULL,
  `Event_Description_En` varchar(100) NOT NULL,
  `Event_Description_Es` varchar(100) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Deadline` date NOT NULL,
  `Date` date NOT NULL,
  `Event_Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`ID`, `Event_Name`, `Event_Description_En`, `Event_Description_Es`, `Country`, `City`, `Deadline`, `Date`, `Event_Link`) VALUES
(1, 'MCPR2025', '17th Mexican Conference on Pattern Recognition', '17ª Conferencia Mexicana sobre Reconocimiento de Patrones', 'México', 'Guanajuato, Guanajuato', '2025-01-29', '2025-06-25', 'http://www.mcpr.org.mx'),
(2, 'ICPR 2024', '27th International Conference on Pattern Recognition', '27ª Conferencia Internacional sobre Reconocimiento de Patrones', 'India', 'Kolkata', '2024-03-20', '2024-12-01', 'https://icpr2024.org/'),
(3, 'CIARP 2024', '27th Iberoamerican Congress on Pattern Recognition', '27º Congreso Iberoamericano sobre Reconocimiento de Patrones', 'Chile', 'Talca', '2024-06-01', '2024-11-26', 'http://www.ciarp24.org/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `governing_board`
--

CREATE TABLE `governing_board` (
  `ID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(50) NOT NULL,
  `Position_Es` varchar(100) NOT NULL,
  `Position_En` varchar(100) NOT NULL,
  `Institution` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `governing_board`
--

INSERT INTO `governing_board` (`ID`, `Image`, `First_Name`, `Last_Name`, `Middle_Name`, `Position_Es`, `Position_En`, `Institution`) VALUES
(1, './Resources/Img/Governing_Board/José Francisco_Martínez_Trinidad.jpg', 'José Francisco', 'Martínez', 'Trinidad', 'Presidente', 'Chairman', 'INAOE'),
(2, './Resources/Img/Governing_Board/Jesús Ariel_Carrasco_Ochoa.jpg', 'Jesús Ariel', 'Carrasco', 'Ochoa', 'Vice-Presidente', 'Co-Chairman', NULL),
(3, './Resources/Img/Governing_Board/Manuel S._Lazo_Cortés.jpeg', 'Manuel S.', 'Lazo', 'Cortés', 'Secretario', 'Secretary', NULL),
(6, './Resources/Img/Governing_Board/José Arturo_Olvera_López.jpg', 'José Arturo', 'Olvera', 'López', 'Tesorero', 'Treasurer', 'BUAP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Middle_Name` varchar(50) DEFAULT NULL,
  `Institution` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`ID`, `First_Name`, `Last_Name`, `Middle_Name`, `Institution`) VALUES
(1, 'José Antonio', 'Camarena', 'Ibarrola', 'UMSNH'),
(2, 'Martha Paola', 'Jiménez ', 'Martínez', 'CICESE'),
(3, 'Juan Carlos', 'Olivares', 'Rojas', 'TecNM-Morelia'),
(4, 'Eduardo', 'De Ávila', 'A.', 'Universidad Autonoma de Zacatecas'),
(5, 'Carlos A.', 'Hernández', 'Linares', 'Universidad Veracruzana'),
(6, 'Petra', 'Wiederhold', ' ', 'CINVESTAV-IPN'),
(7, 'Alejandro', 'Moreno', 'Martínez', 'UAEM-Valle de México'),
(8, 'Mario', 'Bañuelos', ' ', 'California State University Fresno'),
(9, 'Tovar', 'Vidal', 'Mireya', 'BUAP'),
(10, 'Eric', 'Valedez', 'Valenzuela', 'UNAM'),
(11, 'Andrés', 'Cureño', 'Ramírez', 'Cinvestav-IPN'),
(12, 'Verónica', 'Neri', 'Mendoza', 'UAEMéx'),
(13, 'Jonathan', 'Rojas', 'Simón', 'UAEMéx'),
(14, 'Erick G.', 'G.', 'de Paz', 'Colegio de Postgraduados'),
(15, 'José', 'Ambrosio', 'Bastrán', 'Universidad La Salle'),
(16, 'Alfonso', 'Rojas', 'Domínguez', 'TecNM-León'),
(17, 'María', 'Valdovinos', 'Rosa', 'UAEMéx'),
(18, 'José Raymundo', 'Marcial', 'Romero', 'UAEMéx'),
(19, 'Eliaf Yahir', 'García', 'Loya', 'INAOE'),
(20, 'Hugo Jair', 'Escalante', 'Balderas', 'INAOE'),
(21, 'Claudia', 'Feregrino', 'Uribe', 'INAOE'),
(22, 'Leopoldo', 'Altamirano', 'Robles', 'INAOE'),
(23, 'Juan Carlos', 'Belén', ' ', 'CINVESTAV-IPN'),
(24, 'Lázaro', 'Bustio', 'Martínez', 'Universidad Iberoamericana'),
(25, 'María del Carmen', 'García', 'Galindo', 'UAEMéx'),
(26, 'Juan Ángel', 'Acosta', 'Ceja', 'Universidad Iberoamericana'),
(27, 'Juan Pablo', 'Guerra', 'I.', 'Centro de Investigaciones en Óptica'),
(28, 'Emmanuel', 'Ovalle', 'Magallanes', 'Universidad La Salle - Bajío'),
(29, 'Dora E.', 'Alvarado', 'Carrillo', 'CIMAT'),
(30, 'José C.', 'Ortiz', 'Bailyss', 'ITESM'),
(31, 'Daniel', 'Martínez', 'Barba', 'Centro de Investigaciones en Óptica'),
(32, 'José Luis', 'Silván', 'Cárdenas', 'Universidad La Salle'),
(33, 'Efren', 'Mezura', 'Montes', 'Universidad Veracruzana'),
(34, 'Héctor Gabriel', 'Acosta', 'Mesa', 'Universidad Veracruzana'),
(35, 'Ansel Y.', 'Rodríguez', 'González', 'CICESE-UT3'),
(36, 'Humberto', 'Pérez', 'Espinosa', 'INAOE'),
(37, 'Osslan Osiris', 'Vergara', 'Villegas', 'UACJ'),
(38, 'Vianey Guadalupe', 'Cruz', 'Sánchez', 'UACJ'),
(39, 'Juan Humberto', 'Sossa', 'Azuela', 'CIC-IPN'),
(40, 'Edgar', 'Román', 'Rangel', 'ITAM'),
(41, 'Ángel Fernando', 'Kuri', 'Morales', 'ITAM'),
(42, 'Karina Mariela', 'Figueroa', 'Mora', 'UMSNH'),
(43, 'Jaime', 'Cerda', ' ', 'UMSNH'),
(44, 'Juan', 'Anzurez', 'Marín', 'UMSNH'),
(45, 'Joaquín', 'Salas', ' ', 'CICATA-IPN'),
(46, 'Víctor', 'Ayala', 'Ramírez', 'Universidad de Guanajuato'),
(47, 'Cherif Ben', 'Youssef', 'Brants', 'TecNM—Cancún'),
(48, 'Eduardo', 'Bayro', 'Corrochano', 'CINVESTAV-Guadalajara');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `governing_board`
--
ALTER TABLE `governing_board`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `governing_board`
--
ALTER TABLE `governing_board`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
