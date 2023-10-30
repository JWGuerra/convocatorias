-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2023 a las 15:30:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `merissdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblarchivoadjunto`
--

CREATE TABLE `tblarchivoadjunto` (
  `IDARCHIVO` int(11) NOT NULL,
  `IDVACANTE` int(11) NOT NULL,
  `NOMBREARCHIVO` varchar(90) NOT NULL,
  `UBICACIONARCHIVO` varchar(255) NOT NULL,
  `IDUSARIOARCHIVO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblarchivoadjunto`
--

INSERT INTO `tblarchivoadjunto` (`IDARCHIVO`, `IDVACANTE`, `NOMBREARCHIVO`, `UBICACIONARCHIVO`, `IDUSARIOARCHIVO`) VALUES
(6912529, 5, 'Curriculum Vitae', 'photos/02102023105752CV_Guerra_Bellido_Ingeniería_Informática_Sistemas.pdf', 2023016),
(6912530, 7, 'Curriculum Vitae', 'photos/1210202312140829092023101526yasmany valverde torre cv.pdf', 2023017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblautonumbers`
--

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblautonumbers`
--

INSERT INTO `tblautonumbers` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 7, 1, 'userid'),
(3, '0', 18, 1, 'POSTULANTE'),
(4, '69125', 31, 1, 'IDARCHIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE `tblcategoria` (
  `IDCATEGORIA` varchar(11) NOT NULL,
  `CATEGORIA` varchar(50) NOT NULL,
  `REMUNERACIONCATEGORIA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`IDCATEGORIA`, `CATEGORIA`, `REMUNERACIONCATEGORIA`) VALUES
('C001', 'A-4', '2051.00'),
('C002', 'A-5', '2198.00'),
('C003', 'T-2', '2472.00'),
('C004', 'T-3', '2655.00'),
('C005', 'T-4', '2838.00'),
('C006', 'T-5', '3022.00'),
('C007', 'P-2', '3113.00'),
('C008', 'P-3', '3296.00'),
('C009', 'P-4', '3479.00'),
('C010', 'P-5', '3663.00'),
('C011', 'P-6', '3846.00'),
('C012', 'D-2', '4212.00'),
('C013', 'D-3', '4578.00'),
('C014', 'D-4', '5494.00'),
('C015', 'D-5', '5769.00'),
('C016', 'D-6', '6135.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcomunicado`
--

CREATE TABLE `tblcomunicado` (
  `IDCOMUNICADO` int(11) NOT NULL,
  `CONVOCATORIA` varchar(90) NOT NULL,
  `TIPOCOMUNICADO` varchar(40) NOT NULL,
  `DESCRIPCION` varchar(300) NOT NULL,
  `UBICACIONCOMUNICADO` varchar(255) NOT NULL,
  `FECHAPUBLICACION` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblcomunicado`
--

INSERT INTO `tblcomunicado` (`IDCOMUNICADO`, `CONVOCATORIA`, `TIPOCOMUNICADO`, `DESCRIPCION`, `UBICACIONCOMUNICADO`, `FECHAPUBLICACION`) VALUES
(1000, 'Convocatoria-4-2023', 'otros', 'FICHA RESUMEN', 'documentos/ficharesumen.xlsx', '2023-10-11 19:16:00'),
(1001, 'Convocatoria-4-2023', 'otros', 'BASES DEL PROCESO DE SELECCIÓN', 'documentos/bases4taconvocatoria.pdf', '2023-10-11 19:17:00'),
(1002, 'Convocatoria-4-2023', 'otros', 'PERFILES DE LA CONVOCATORIA', 'documentos/Perfiles.pdf', '2023-10-11 19:18:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconvocatoria`
--

CREATE TABLE `tblconvocatoria` (
  `IDCONVOCATORIA` int(11) NOT NULL,
  `CONVOCATORIA` varchar(90) NOT NULL,
  `NROCONVOCATORIA` varchar(2) NOT NULL,
  `ANIO` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblconvocatoria`
--

INSERT INTO `tblconvocatoria` (`IDCONVOCATORIA`, `CONVOCATORIA`, `NROCONVOCATORIA`, `ANIO`) VALUES
(8, 'Convocatoria-5-2023', '5', '2023'),
(10, 'Convocatoria-1-2024', '1', '2024'),
(14, 'Convocatoria-4-2023', '4', '2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpostulante`
--

CREATE TABLE `tblpostulante` (
  `IDPOSTULANTE` int(11) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `APELLIDOS` varchar(90) NOT NULL,
  `NOMBRES` varchar(90) NOT NULL,
  `DIRECCION` varchar(255) NOT NULL,
  `NOMBREUSUARIO` varchar(90) NOT NULL,
  `CONTRASENA` varchar(90) NOT NULL,
  `CORREO` varchar(90) NOT NULL,
  `CELULAR` varchar(90) NOT NULL,
  `FORMACIONACADEMICA` text NOT NULL,
  `FOTO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblpostulante`
--

INSERT INTO `tblpostulante` (`IDPOSTULANTE`, `DNI`, `APELLIDOS`, `NOMBRES`, `DIRECCION`, `NOMBREUSUARIO`, `CONTRASENA`, `CORREO`, `CELULAR`, `FORMACIONACADEMICA`, `FOTO`) VALUES
(2023016, '74073759', 'GUERRA BELLIDO', 'JHON WALDIR', 'CUSIPATA-QUISPICANCHI-CUSCO', 'WALDIR', '849403c34abb8018ea088597466533e79acf1f09', '171910@unsaac.edu.pe', '961170584', 'EGRESADO DE INGENIERÍA INFORMÁTICA Y DE SISTEMAS', ''),
(2023017, '70419804', 'VALVERDE TORRE', 'YASMANY', 'DISTRITO SANTIAGO, PROVINCIA CUSCO, REGIÓN CUSCO', 'YASMANY', '20cd9e5b76b2e58f75cb25e6127cbcdba0813e2b', '141512@unsaac.edu.pe', '963857412', 'BACHILLER EN DERECHO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblregistropostulacion`
--

CREATE TABLE `tblregistropostulacion` (
  `IDREGISTRO` int(11) NOT NULL,
  `IDCONVOCATORIA` int(11) NOT NULL,
  `IDVACANTE` int(11) NOT NULL,
  `IDPOSTULANTE` int(11) NOT NULL,
  `POSTULANTE` varchar(90) NOT NULL,
  `FECHAREGISTRO` date NOT NULL,
  `OBSERVACIONES` varchar(255) NOT NULL DEFAULT 'PENDIENTE',
  `IDARCHIVO` varchar(30) DEFAULT NULL,
  `SOLICITUDPENDIENTE` tinyint(1) NOT NULL DEFAULT 1,
  `HVISTA` tinyint(1) NOT NULL DEFAULT 1,
  `FECHAAPROBACION` datetime NOT NULL,
  `PUNTAJEENTREVISTA` int(11) NOT NULL DEFAULT 0,
  `RESULTADOENTREVISTA` varchar(80) NOT NULL DEFAULT 'SIN CALIFICAR'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblregistropostulacion`
--

INSERT INTO `tblregistropostulacion` (`IDREGISTRO`, `IDCONVOCATORIA`, `IDVACANTE`, `IDPOSTULANTE`, `POSTULANTE`, `FECHAREGISTRO`, `OBSERVACIONES`, `IDARCHIVO`, `SOLICITUDPENDIENTE`, `HVISTA`, `FECHAAPROBACION`, `PUNTAJEENTREVISTA`, `RESULTADOENTREVISTA`) VALUES
(3, 8, 5, 2023016, 'GUERRA BELLIDO JHON WALDIR', '2023-10-02', 'NO-APTO', '20236912529', 0, 0, '2023-10-17 14:34:14', 100, 'SELECCIONADO'),
(4, 14, 7, 2023017, 'VALVERDE TORRE YASMANY', '2023-10-12', 'APTO', '20236912530', 0, 0, '2023-10-12 08:53:32', 70, 'SELECCIONADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblregistropuestolaboral`
--

CREATE TABLE `tblregistropuestolaboral` (
  `IDREGISTROPUESTO` int(11) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `APELLIDOS` varchar(90) NOT NULL,
  `NOMBRES` varchar(90) NOT NULL,
  `DIRECCION` varchar(255) NOT NULL,
  `CORREO` varchar(90) NOT NULL,
  `CELULAR` varchar(90) NOT NULL,
  `FORMACIONACADEMICA` text NOT NULL,
  `PROFESION_OFICIO` text NOT NULL,
  `EXPERIENCIAPUBLICA` int(11) NOT NULL,
  `EXPERIENCIAPRIVADA` int(11) NOT NULL,
  `UBICACIONCV` varchar(255) NOT NULL,
  `HVISTA` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblregistropuestolaboral`
--

INSERT INTO `tblregistropuestolaboral` (`IDREGISTROPUESTO`, `DNI`, `APELLIDOS`, `NOMBRES`, `DIRECCION`, `CORREO`, `CELULAR`, `FORMACIONACADEMICA`, `PROFESION_OFICIO`, `EXPERIENCIAPUBLICA`, `EXPERIENCIAPRIVADA`, `UBICACIONCV`, `HVISTA`) VALUES
(6001, '25252525', 'FERNANDEZ TILCA', 'CHRIS IALLEN', 'YUCAY-URUBAMBA', '141419@unsaac.edu.pe', '963852147', 'SUPERIOR-UNIVERSITARIA-INCOMPLETA', 'EGRESADO INGENIERIA INFORMATICA Y DE SISTEMAS', 9, 9, 'admin/solicitud_trabajo/documentos/CAS N° 043 - 2023.pdf', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblretroalimentacion`
--

CREATE TABLE `tblretroalimentacion` (
  `IDRETROALIMENTACION` int(11) NOT NULL,
  `IDPOSTULANTE` int(11) NOT NULL,
  `IDREGISTRO` int(11) NOT NULL,
  `RETROALIMENTACION` text NOT NULL,
  `MENSAJE` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblretroalimentacion`
--

INSERT INTO `tblretroalimentacion` (`IDRETROALIMENTACION`, `IDPOSTULANTE`, `IDREGISTRO`, `RETROALIMENTACION`, `MENSAJE`) VALUES
(2, 2023016, 3, 'NO-APTO', 'NO CUMPLE CON EL PERFIL'),
(3, 2023017, 4, 'APTO', 'Su Curriculum Vitae cumple con el perfil del Servico Solicitado. Esté atento a la publicación del CRONOGRAMA de entrevista, publicado en la página WEB.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblservicio`
--

CREATE TABLE `tblservicio` (
  `IDSERVICIO` int(11) NOT NULL,
  `SERVICIO` varchar(250) NOT NULL,
  `CATEGORIA` varchar(50) NOT NULL,
  `REMUNERACIONCATEGORIA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblservicio`
--

INSERT INTO `tblservicio` (`IDSERVICIO`, `SERVICIO`, `CATEGORIA`, `REMUNERACIONCATEGORIA`) VALUES
(29, 'CONDUCTOR DE CAMIONETA', 'T-2', ' 2472.00'),
(30, 'ASISTENTE TÉCNICO', 'T-4', ' 2838.00'),
(31, 'TOPÓGRAFO', 'T-4', ' 2838.00'),
(32, 'RESIDENTE DE OBRA', 'P-6', ' 3846.00'),
(33, 'SOPORTE TÉCNICO', 'T-2', ' 2472.00'),
(34, 'RESPONSABLE DE SSOMA', 'P-4', ' 3479.00'),
(35, 'APOYO EN LA ELABORACIÓN DE CONTRATOS', 'A-5', ' 2198.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` varchar(30) NOT NULL,
  `FULLNAME` varchar(40) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PICLOCATION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES
('00018', 'Oficina de Recursos Humanos', 'RRHH', 'fee04e51fd4ca188f2d6026d1dc1470ac7b50746', 'Administrator', 'photos/OTRITO-300x218.png'),
('2018001', 'Jhon Waldir Guerra Bellido', 'Waldir', 'e667a16955e89707d2c56a840edcf5a588c2ae02', 'Trabajador', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvacante`
--

CREATE TABLE `tblvacante` (
  `IDVACANTE` int(11) NOT NULL,
  `IDCONVOCATORIA` int(11) NOT NULL,
  `SERVICIO` varchar(250) NOT NULL,
  `CATEGORIA` varchar(50) NOT NULL,
  `REMUNERACION` double NOT NULL,
  `FORMACIONACADEMICA` varchar(90) NOT NULL,
  `NROVACANTES` int(11) NOT NULL,
  `DURACION` varchar(90) NOT NULL,
  `EXPERIENCIAGENERAL` int(11) NOT NULL,
  `EXPERIENCIAESPECIFICA` int(11) NOT NULL,
  `FUNCIONES` text NOT NULL,
  `LUGARTRABAJO` varchar(250) NOT NULL,
  `FECHAPUBLICACION` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblvacante`
--

INSERT INTO `tblvacante` (`IDVACANTE`, `IDCONVOCATORIA`, `SERVICIO`, `CATEGORIA`, `REMUNERACION`, `FORMACIONACADEMICA`, `NROVACANTES`, `DURACION`, `EXPERIENCIAGENERAL`, `EXPERIENCIAESPECIFICA`, `FUNCIONES`, `LUGARTRABAJO`, `FECHAPUBLICACION`) VALUES
(3, 8, 'ASISTENTE TÉCNICO', 'T-4', 2838, 'BACHILLER O INGENIERO CIVIL', 2, '03 MESES', 24, 12, 'FUNCION 01<br>FUNCION 02<br>FUNCION 03', 'MARANGANI', '2023-10-02 10:52:00'),
(4, 8, 'CONDUCTOR DE CAMIONETA', 'T-2', 2472, 'SECUNDARIA COMPLETA', 1, '03 MESES', 24, 12, 'FUNCION 01<br>FUNCION 02<br>FUNCION 03<br>FUNCION 04', 'LIMATAMBO', '2023-10-02 10:53:00'),
(5, 8, 'SOPORTE TÉCNICO', 'T-2', 2472, 'BACHILLER O EGRESADO DE INGENIERÍA INFORMÁTICA Y DE SISTEMAS', 1, '03 MESES', 6, 6, 'FUNCION 01<br>FUNCION 02<br>FUNCION 03<br>FUNCION 04', 'SEDE-CENTRAL', '2023-10-02 10:54:00'),
(6, 14, 'RESPONSABLE DE SSOMA', 'P-4', 3479, 'INGENIERO INDUSTRIAL, AMBIENTAL, METALÚRGICA, MINAS O AFINES.', 1, '03 MESES', 36, 24, '-	Elaborar el plan de seguridad y salud ocupacional y medio ambiente en el trabajo.<br>-	Dar cumplimiento a la ley 29783 ley de seguridad y salud en el trabajo en el Perú<br>-	Elaborar, implementar, gestionar y controlar el funcionamiento del programa anual de seguridad y salud ocupacional brindar las capacitaciones sobre temas de seguridad y salud ocupacional para el personal de estudios.<br>-	Promover y mantener condiciones de trabajo seguras y saludables mediante el uso adecuado de señales preventivas de seguridad.<br>-	Hacer cumplir a todo el personal el uso adecuado de los equipos de protección personal (epp) otras actividades relacionadas a las funciones y que viera por conveniente el responsable de SSOMA.<br>', 'MARGEN-DERECHA', '2023-10-11 21:41:00'),
(7, 14, 'APOYO EN LA ELABORACIÓN DE CONTRATOS', 'A-5', 2198, 'BACHILLER EN DERECHO', 1, '03 MESES', 12, 0, 'FUNCION 01<br>FUNCION 03<br>FUNCION 04', 'SEDE-CENTRAL', '2023-10-12 00:11:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblarchivoadjunto`
--
ALTER TABLE `tblarchivoadjunto`
  ADD PRIMARY KEY (`IDARCHIVO`);

--
-- Indices de la tabla `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indices de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  ADD PRIMARY KEY (`IDCATEGORIA`);

--
-- Indices de la tabla `tblcomunicado`
--
ALTER TABLE `tblcomunicado`
  ADD PRIMARY KEY (`IDCOMUNICADO`);

--
-- Indices de la tabla `tblconvocatoria`
--
ALTER TABLE `tblconvocatoria`
  ADD PRIMARY KEY (`IDCONVOCATORIA`);

--
-- Indices de la tabla `tblpostulante`
--
ALTER TABLE `tblpostulante`
  ADD PRIMARY KEY (`IDPOSTULANTE`);

--
-- Indices de la tabla `tblregistropostulacion`
--
ALTER TABLE `tblregistropostulacion`
  ADD PRIMARY KEY (`IDREGISTRO`);

--
-- Indices de la tabla `tblregistropuestolaboral`
--
ALTER TABLE `tblregistropuestolaboral`
  ADD PRIMARY KEY (`IDREGISTROPUESTO`);

--
-- Indices de la tabla `tblretroalimentacion`
--
ALTER TABLE `tblretroalimentacion`
  ADD PRIMARY KEY (`IDRETROALIMENTACION`);

--
-- Indices de la tabla `tblservicio`
--
ALTER TABLE `tblservicio`
  ADD PRIMARY KEY (`IDSERVICIO`);

--
-- Indices de la tabla `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- Indices de la tabla `tblvacante`
--
ALTER TABLE `tblvacante`
  ADD PRIMARY KEY (`IDVACANTE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblarchivoadjunto`
--
ALTER TABLE `tblarchivoadjunto`
  MODIFY `IDARCHIVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6912531;

--
-- AUTO_INCREMENT de la tabla `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblcomunicado`
--
ALTER TABLE `tblcomunicado`
  MODIFY `IDCOMUNICADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT de la tabla `tblconvocatoria`
--
ALTER TABLE `tblconvocatoria`
  MODIFY `IDCONVOCATORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblpostulante`
--
ALTER TABLE `tblpostulante`
  MODIFY `IDPOSTULANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023018;

--
-- AUTO_INCREMENT de la tabla `tblregistropostulacion`
--
ALTER TABLE `tblregistropostulacion`
  MODIFY `IDREGISTRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblregistropuestolaboral`
--
ALTER TABLE `tblregistropuestolaboral`
  MODIFY `IDREGISTROPUESTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6002;

--
-- AUTO_INCREMENT de la tabla `tblretroalimentacion`
--
ALTER TABLE `tblretroalimentacion`
  MODIFY `IDRETROALIMENTACION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblservicio`
--
ALTER TABLE `tblservicio`
  MODIFY `IDSERVICIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tblvacante`
--
ALTER TABLE `tblvacante`
  MODIFY `IDVACANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
