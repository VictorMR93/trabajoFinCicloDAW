-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2018 a las 10:17:36
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `ID` int(11) NOT NULL,
  `USUARIO` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `CONTRASENA` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`ID`, `USUARIO`, `CONTRASENA`) VALUES
(1, 'adminMairena', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ID` int(11) NOT NULL,
  `PORTADA` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ISBN` bigint(40) NOT NULL,
  `TITULO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `AUTOR` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `GENERO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `PUBLICACION` int(11) NOT NULL,
  `EDITORIAL` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `PAGINAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ID`, `PORTADA`, `ISBN`, `TITULO`, `AUTOR`, `GENERO`, `PUBLICACION`, `EDITORIAL`, `PAGINAS`) VALUES
(4, 'imagenes/JurassicPark.png', 9788497597807, 'Jurassic Park', 'Michael Crichton', 'Novela Ciencia Ficcion', 1991, 'DeBolsillo', 480),
(5, 'imagenes/deRatonesYHombres.png', 9788435009140, 'De ratones y hombres 2', 'John Steinbeck 2', 'Novela Contemporanea 2', 1937, 'Edhasa 2', 1677),
(6, 'imagenes/porQuienDoblanLasCampanas.jpg', 9788497935029, 'Por quien doblan las campanas', 'Ernest Hemingway', 'Novela Belica', 1940, 'DeBolsillo', 624),
(7, 'imagenes/1984.jpg', 9788499890944, '1984', 'George Orwell', 'Novela Distopica', 1949, 'DeBolsillo', 352),
(8, 'imagenes/unMundoFeliz.jpg', 9788497594257, 'Un mundo feliz', 'Aldous Huxley', 'Novela Distopica', 1932, 'DeBolsillo', 256),
(9, 'imagenes/elGuardianEntreElCenteno.jpg', 9788420674209, 'El guardian entre el centeno', 'J.D. Salinger', 'Novela', 1951, 'Alianza', 288),
(10, 'imagenes/diasPasados.jpg', 9786245561386, 'Los muertos vivientes #01: Dias pasados', 'Robert Kirkman', 'Comic', 2008, 'Planeta DeAgostini', 144),
(11, 'imagenes/gomorra.jpg', 9788483468463, 'Gomorra', 'Roberto Saviano', 'Novela Policiaca', 2006, 'DeBolsillo', 328),
(12, 'imagenes/laUltimaLegion.jpg', 9788497933407, 'La ultima legion', 'Valerio Massimo Manfredi', 'Novela', 2002, 'DeBolsillo', 496),
(13, 'imagenes/harryPotterYLasReliquiasDeLaMuerte.jpg', 9788498386370, 'Harry Potter y las Reliquias de la Muerte', 'J.K. Rowling', 'Novela Fantastica', 2007, 'Salamandra', 638),
(17, 'imagenes/sinImagen.png', 9456589213658, 'Prueba Libro', 'Antonio Ortiz', 'Novela', 1985, 'Salamandra', 329);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `ID_NOTICIA` int(11) NOT NULL,
  `TITULO_NOTICIA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CONTENIDO` varchar(6500) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_NOTICIA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`ID_NOTICIA`, `TITULO_NOTICIA`, `CONTENIDO`, `FECHA_NOTICIA`) VALUES
(2, 'Esta es la primera notiiiicia de prueba', 'Y este es el contenido de la primerísima noticia de prueba\nY este es el contenido de la primerísima noticia de prueba\nY este es el contenido de la primerísima noticia de prueba\nY este es el contenido de la primerísima noticia de pruebaY este es el contenido de la primerísima noticia de prueba', '2018-06-05'),
(3, 'Presentación \"El Secreto de Laura\" ', 'La autora es la mairenera Laura Velasco, ex concursante de Gran Hermano, que ha decidido contar sus vivencias a través de este libro. \n\n<br><center><img src=\"https://1.bp.blogspot.com/-wSpTjrXbzMQ/Wvp7fX7qVlI/AAAAAAAAHm4/BkFt5W_h_msR4i5lqvnB0eRWvnswTDo8QCLcBGAs/s1600/25may_A3%2B-%2BLetrame-PRES-cartel.jpg\" style=\"width: 285px; height: 400px\"></img></center><br>\n\n“Es un libro en el que hablo desde mi infancia hasta día de hoy. Sin tapujos. De todo lo que me habéis preguntado, de todo lo que queréis saber… Me ha costado mucho porque me desnudo completamente. En él hablo de cosas que no sabéis y que nunca se han comentado. He llorado mucho, tanto escribiéndolo como presentándolo... La portada tiene 5 mariposas: cuando naces, cuando te sientes diferente, cuando comienza el cambio, cuando el cambio ha terminado, y cuando quieres ser libre, como yo ahora. En los coles creo que haría mucha falta un libro como \'El secreto de Laura\'. .... Es un libro para sacar fuerza.  Para ayudaros. Es un libro positivo\"\n\n<br><br><center><img src=\"https://3.bp.blogspot.com/-3dqtovcsNiw/Wwvm4aRKUYI/AAAAAAAAHos/l6WzoihOufwHViMwfPqW59BhOr2jGkpJwCLcBGAs/s1600/20180525_201438_resized_1.jpg\" style=\"width: 420px; height: 285px\"></img>\n\n<img src=\"https://2.bp.blogspot.com/-8l2dbPCoNl8/WwvoSkMBa7I/AAAAAAAAHpo/7HcG0mLfyq4Pl8eZQi35irTmOh6UluIngCLcBGAs/s1600/20180525_204306_resized_1.jpg\" style=\"width: 420px; height: 285px\"></img></center>\n', '2018-06-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `ID_PRESTAMO` int(11) NOT NULL,
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `ISBN` bigint(40) NOT NULL,
  `TITULO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_PRESTAMO` date NOT NULL,
  `FECHA_DEVOLUCION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`ID_PRESTAMO`, `DNI`, `ISBN`, `TITULO`, `FECHA_PRESTAMO`, `FECHA_DEVOLUCION`) VALUES
(1, '13568524X', 9788497935029, 'Por quien doblan las campanas', '2018-05-30', '2018-06-01'),
(6, '23668511Z', 9788497594257, 'Un mundo feliz', '2018-06-06', '2018-06-12'),
(7, '13568524X', 9788497933407, 'La ultima legion', '2018-07-04', '2018-07-13'),
(8, '48994412L', 9788499890944, '1984', '2018-06-08', '2018-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` int(9) NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `FECHA_ALTA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `DNI`, `NOMBRE`, `APELLIDOS`, `TELEFONO`, `EMAIL`, `FECHA_NACIMIENTO`, `FECHA_ALTA`) VALUES
(1, '45982265F', 'Eustaquio', 'Pruebini Chiquitini', 656325648, 'eus122@hotmail.com', '2018-05-17', '2018-05-27'),
(3, '95982265F', 'antonio3', 'garcia ruiz', 659632467, 'antoniopruebas@hotmail.com', '2018-05-02', '2018-05-31'),
(7, '23668511J', 'Mesias', 'El Autentico', 956325681, 'mesi@gmail.com', '1832-03-19', '2018-05-29'),
(8, '23668511J', 'Manu', 'Carrasco Segura', 632568943, 'pruebamanu@gmail.com', '1992-04-19', '2018-05-27'),
(9, '23668511Y', 'Pepe', 'Carrasco Segura4', 956123681, '', '1992-03-19', '2018-05-28'),
(10, '23668511Y', 'Neferino', 'Carrasco Segura4', 695632456, 'nefius@gmail.com', '1992-03-19', '2018-05-28'),
(11, '23668511Y', 'ana', 'Carrasco Segura4', 956326589, '', '1992-03-19', '2018-05-28'),
(12, '23668511Z', 'julia', 'pruebini secundini', 632569874, 'juls@gmail.com', '2016-03-30', '2018-05-28'),
(13, '13568524X', 'David', 'Perez Nuñez', 956563269, '', '1989-03-07', '2018-05-29'),
(14, '65568524K', 'Federico', 'Noguera Rodriguez', 956325698, 'fede11@gmail.com', '2001-03-07', '2018-05-29'),
(15, '65568524K', 'Emilio', 'Pandereta Niz', 653259641, 'emil545@gmail.com', '1975-03-07', '2018-05-29'),
(16, '56225463M', 'Rodolfo', 'Pomez Piedra', 624586321, 'pomez55@gmail.com', '1981-05-23', '2018-05-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`ID_NOTICIA`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`ID_PRESTAMO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `ID_NOTICIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `ID_PRESTAMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
