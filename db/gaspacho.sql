-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 18:31:07
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gaspacho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atributo`
--

CREATE TABLE `atributo` (
  `id_atributo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `atributo`
--

INSERT INTO `atributo` (`id_atributo`, `nombre`) VALUES
(2, 'Agilidad'),
(3, 'Inteligencia'),
(7, 'Fuerza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `heroe`
--

CREATE TABLE `heroe` (
  `id_heroe` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `type_atack` varchar(50) NOT NULL,
  `id_atributo_fk` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `heroe`
--

INSERT INTO `heroe` (`id_heroe`, `nombre`, `type_atack`, `id_atributo_fk`, `descripcion`) VALUES
(3, 'Hoodwink', 'A Distancia', 2, 'Siempre alerta por si surgen problemas, Hoodwink vive para hacer frente a las amenazas que llenan el bosque embrujado que adoptó como su hogar. Atravesándolo con la mayor facilidad incluso llevando una enorme ballesta, es casi imposible vigilar a Hoodwink en la batalla. Piérdele la pista y ella aparecerá por detrás: tu cadáver aturdido ya cuelga en una de sus redes.'),
(4, 'Medusa', 'A Distancia', 2, 'El ataque constante es la clave del éxito de Medusa. Haciendo uso de su escudo de maná para soportar el asalto, es capaz de activar su disparo dividido para acribillar a oleadas de enemigos. Una vez que reúne todo su poder, se convierte en una fuerza lo suficientemente poderosa como para detener a cualquiera en su camino.'),
(5, 'Bane', 'A Distancia', 3, 'Bane lleva el terror a sus enemigos con su arsenal de habilidades incapacitantes. Ya sea atrapando a un enemigo dentro de una pesadilla contagiosa, o agarrando un adversario en el sitio, le da a sus aliados todo el tiempo que necesitan para matar a sus enemigos.'),
(6, 'DarkSeer', 'Cuerpo A Cuerpo', 3, 'Versátil y estratega, Dark Seer destaca en la manipulación de las posiciones de sus enemigos. Con su habilidad de succión de enemigos, a los que puede mover para que sus aliados los ataquen, es capaz de volver la fuerza del enemigo en su contra haciendo que atraviesen su muro de réplicas.'),
(22, 'Abaddon', 'Cuerpo A Cuerpo', 7, 'Capaz de transformar los ataques enemigos en una cura para él mismo, Abaddon puede sobrevivir casi cualquier enfrentamiento. Con su habilidad para poner escudos sobre sus aliados y lanzar la espiral de doble filo a aliados o enemigos, siempre está listo para marchar a la batalla.'),
(23, 'Marci', 'Cuerpo A Cuerpo', 7, 'Demostrando que la lealtad eterna produce un poder inigualable, Marci siempre marcha hacia el combate lista para levantar los puños en defensa de sus compañeros. Lanzando amigos y enemigos sin esfuerzo por el campo de batalla, se adentra felizmente a cualquier pelea, capaz de otorgar a los aliados una ventaja mortal y desatar un poder oculto lo suficientemente fuerte como para hacer que incluso los dioses reconsideren la sabiduría de un camino hostil.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `passwd`, `rol`) VALUES
(15, 'Administrador', 'admin@admin', '$2y$10$DmQ7u2skPeJl2v8mPmtmR.BudOJRWL817o07PcUjTZdlCjBCYjuxu', 'admin'),
(0, 'lelo', 'g@gg', '$2y$10$SMcsBbaFspW0nehbKIQEaOFj4CU/u2sMLOW29c2GeiKQq7/Qnwh5O', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atributo`
--
ALTER TABLE `atributo`
  ADD PRIMARY KEY (`id_atributo`);

--
-- Indices de la tabla `heroe`
--
ALTER TABLE `heroe`
  ADD PRIMARY KEY (`id_heroe`),
  ADD KEY `foreing_key` (`id_atributo_fk`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atributo`
--
ALTER TABLE `atributo`
  MODIFY `id_atributo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `heroe`
--
ALTER TABLE `heroe`
  MODIFY `id_heroe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `heroe`
--
ALTER TABLE `heroe`
  ADD CONSTRAINT `foreing_key` FOREIGN KEY (`id_atributo_fk`) REFERENCES `atributo` (`id_atributo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
