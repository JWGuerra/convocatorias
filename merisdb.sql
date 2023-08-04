-- SGBD:          MySQL Server
-- Autor:         Jhon Waldir Guerra Bellido
-- PHP V:         7.3.9
-- Descripción:   01/08/2023

-- --------------------------------------------------------
--                CREACIÓN DE LA BASE DE DATOS
-- --------------------------------------------------------
CREATE DATABASE merissdb;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------
--                   TABLA POSTULANTES
-- --------------------------------------------------------
CREATE TABLE tblPostulante (
  IDPOSTULANTE        int(11)       NOT NULL,
  DNI                 VARCHAR(8)    NOT NULL,
  APELLIDOS           varchar(90)   NOT NULL,
  NOMBRES             varchar(90)   NOT NULL,
  DIRECCION           varchar(255)  NOT NULL,
  EDAD                int(2)        NOT NULL,
  NOMBREUSUARIO       varchar(90)   NOT NULL,
  CONTRASENA          varchar(90)   NOT NULL,
  CORREO              varchar(90)   NOT NULL,
  CELULAR             varchar(90)   NOT NULL,
  FORMACIONACADEMICA  text          NOT NULL,
  FOTO                varchar(255)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--                   TABLA ARCHIVO ADJUNTO
-- --------------------------------------------------------
CREATE TABLE tblArchivoAdjunto (              
  IDARCHIVO           int(11) NOT NULL,
  IDVACANTE           int(11) NOT NULL,
  NOMBREARCHIVO       varchar(90) NOT NULL,
  UBICACIONARCHIVO    varchar(255) NOT NULL,
  IDUSARIOARCHIVO     int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--                    TABLA AUTONUMBERS
-- --------------------------------------------------------
CREATE TABLE  tblautonumbers (
  AUTOID      int(11)     NOT NULL,
  AUTOSTART   varchar(30) NOT NULL,
  AUTOEND     int(11)     NOT NULL,
  AUTOINC     int(11)     NOT NULL,
  AUTOKEY     varchar(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO tblautonumbers (AUTOID, AUTOSTART, AUTOEND, AUTOINC, AUTOKEY) VALUES
(1, '02983', 7, 1, 'IDUSUARIO'),
(3, '0', 16, 1, 'POSTULANTE'),
(4, '69125', 29, 1, 'IDARCHIVO');

-- --------------------------------------------------------
--                    TABLA SERVICIO
-- --------------------------------------------------------
CREATE TABLE tblServicio (
  IDSERVICIO    int(11) NOT NULL,
  SERVICIO      varchar(250) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO tblServicio (IDSERVICIO, SERVICIO) VALUES
(10, 'INSPECTOR DE OBRA'),
(11, 'ASISTENTE TÉCNICO'),
(12, 'AUXILIAR TECNICO');


-- --------------------------------------------------------
--                    TABLA CATEGORIA
-- --------------------------------------------------------
CREATE TABLE tblCategoria (
  IDCATEGORIA    int(11) NOT NULL,
  CATEGORIA      varchar(50) NOT NULL,
  REMUNERACION   VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
--                    TABLA CONVOCATORIA
-- --------------------------------------------------------
CREATE TABLE tblConvocatoria (
  IDCONVOCATORIA        int(11)       NOT NULL,
  NOMBRECONVOCATORIA    varchar(90)   NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--                 TABLA RETROALIMENTACIÓN
-- --------------------------------------------------------
CREATE TABLE tblRetroalimentacion (
  IDRETROALIMENTACION   int(11)   NOT NULL,
  IDPOSTULANTE          int(11)   NOT NULL,
  IDREGISTRO            int(11)   NOT NULL,
  RETROALIMENTACION     text      NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
--                    TABLA VACANTES
-- --------------------------------------------------------
CREATE TABLE tblVacante (
  IDVACANTE           int(11)         NOT NULL,
  IDCONVOCATORIA      int(11)         NOT NULL,
  SERVICIO            varchar(250)    NOT NULL,
  FORMACIONACADEMICA  varchar(90)     NOT NULL,
  NROVACANTES         int(11)         NOT NULL,
  CATEGORIA           VARCHAR(50)     NOT NULL,
  REMUNERACION        double          NOT NULL,
  DURACION            varchar(90)     NOT NULL,
  EXPERIENCIA         text            NOT NULL,
  FUNCIONES           text            NOT NULL,
  LUGARTRABAJO        text            NOT NULL,
  FECHAPUBLICACION    datetime         NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--                    REGISTRO DE POSTULACIÓN
-- --------------------------------------------------------
CREATE TABLE tblRegistroPostulacion (
  IDREGISTRO          int(11)       NOT NULL,
  IDCONVOCATORIA      int(11)       NOT NULL,
  IDVACANTE           int(11)       NOT NULL,
  IDPOSTULANTE        int(11)       NOT NULL,
  POSTULANTE          varchar(90)   NOT NULL,
  REGISTRATIONDATE    date          NOT NULL,
  REMARKS             varchar(255)  NOT NULL DEFAULT 'Pending',
  FILEID              varchar(30)   DEFAULT NULL,
  PENDINGAPPLICATION  tinyint(1)    NOT NULL DEFAULT 1,
  HVIEW               tinyint(1)    NOT NULL DEFAULT 1,
  DATETIMEAPPROVED    datetime      NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--                    TABLA USUARIOS
-- --------------------------------------------------------
CREATE TABLE tblUsuario (
  IDUSUARIO     varchar(30)   NOT NULL,
  NOMBRE        varchar(40)   NOT NULL,
  NOMBREUSUARIO varchar(90)   NOT NULL,
  CONTRASENA    varchar(90)   NOT NULL,
  ROL           varchar(30)   NOT NULL,
  FOTOPERFIL   varchar(255)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblUsuario (IDUSUARIO, NOMBRE, NOMBREUSUARIO, CONTRASENA, ROL, FOTOPERFIL) VALUES
('00018', 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/Koala.jpg');

--
-- Indexes para la tabla tblPostulante
--
ALTER TABLE tblPostulante
ADD PRIMARY KEY (IDPOSTULANTE);

--
-- Indexes para la tabla tblArchivoAdjunto
--
ALTER TABLE tblArchivoAdjunto
ADD PRIMARY KEY (IDARCHIVO);

--
-- Indexes para la tabla tblautonumbers
--
ALTER TABLE tblautonumbers
  ADD PRIMARY KEY (AUTOID);

--
-- Indexes para la tabla `tblServicio`
--
ALTER TABLE tblServicio
ADD PRIMARY KEY (IDSERVICIO);

--
-- Indexes para la tabla `tblCategoria`
--
ALTER TABLE tblCategoria
ADD PRIMARY KEY (IDCATEGORIA);

-- Indexes para la tabla tblConvocatoria
ALTER TABLE tblConvocatoria
ADD PRIMARY KEY (IDCONVOCATORIA);

--
-- Indexes para la tabla tblRetroalimentación
--
ALTER TABLE tblRetroalimentacion
ADD PRIMARY KEY (IDRETROALIMENTACION);

--
-- Indexes para la tabla tblVacante`
--
ALTER TABLE tblVacante
ADD PRIMARY KEY (IDVACANTE);

--
-- Indexes for table `tbljobregistration`
--
ALTER TABLE tblRegistroPostulacion
ADD PRIMARY KEY (IDREGISTRO);

--
-- Indexes for table `tblusers`
--
ALTER TABLE tblUsuario
ADD PRIMARY KEY (IDUSUARIO);

--
-- AUTO_INCREMENT para la tabla `tblPostulante
--
ALTER TABLE tblPostulante
MODIFY IDPOSTULANTE int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2018016;

--
-- AUTO_INCREMENT para la tabla tblArchivoAdjunto
--
ALTER TABLE tblArchivoAdjunto
  MODIFY IDARCHIVO int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT para la tabla tblautonumbers
--
ALTER TABLE tblautonumbers
  MODIFY AUTOID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategoria`
--
ALTER TABLE tblCategoria
MODIFY IDCATEGORIA int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT para la tabla `tblServicio`
--
ALTER TABLE tblServicio
  MODIFY IDSERVICIO int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT para la tabla `tblconvocatoria`
--
ALTER TABLE tblConvocatoria
  MODIFY IDCONVOCATORIA int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- AUTO_INCREMENT para la tabla `tblRetroalimentacion`
--
ALTER TABLE tblRetroalimentacion
  MODIFY IDRETROALIMENTACION int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT para la tabla tblVacante
--
ALTER TABLE tblVacante
  MODIFY IDVACANTE int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT para la tabla tblRegistroPostulacion
--
ALTER TABLE tblRegistroPostulacion
  MODIFY IDREGISTRO int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;