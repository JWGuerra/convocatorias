-- SGBD:          MySQL Server
-- Autor:         Jhon Waldir Guerra Bellido
-- PHP V:         7.3.9
-- Descripción:   01/08/2023

-- --------------------------------------------------------
--                CREACIÓN DE LA BASE DE DATOS
-- --------------------------------------------------------
-- CREATE DATABASE merissdb;
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
  APELLIDOS           VARCHAR(90)   NOT NULL,
  NOMBRES             VARCHAR(90)   NOT NULL,
  DIRECCION           VARCHAR(255)  NOT NULL,
  NOMBREUSUARIO       VARCHAR(90)   NOT NULL,
  CONTRASENA          VARCHAR(90)   NOT NULL,
  CORREO              VARCHAR(90)   NOT NULL,
  CELULAR             VARCHAR(90)   NOT NULL,
  FORMACIONACADEMICA  text          NOT NULL,
  FOTO                VARCHAR(255)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--                    REGISTRO DE POSTULACIÓN
-- --------------------------------------------------------
CREATE TABLE tblRegistroPostulacion (
  IDREGISTRO          int(11)       NOT NULL,
  IDCONVOCATORIA      int(11)       NOT NULL,
  IDVACANTE           int(11)       NOT NULL,
  IDPOSTULANTE        int(11)       NOT NULL,
  POSTULANTE          VARCHAR(90)   NOT NULL,
  FECHAREGISTRO       date          NOT NULL,
  OBSERVACIONES       VARCHAR(255)  NOT NULL DEFAULT 'PENDIENTE',
  IDARCHIVO           VARCHAR(30)   DEFAULT NULL,
  SOLICITUDPENDIENTE  tinyint(1)    NOT NULL DEFAULT 1,
  HVISTA              tinyint(1)    NOT NULL DEFAULT 1,
  FECHAAPROBACION     datetime      NOT NULL,
  PUNTAJEENTREVISTA   int(11)       NOT NULL DEFAULT 0,
  RESULTADOENTREVISTA VARCHAR(80)   NOT NULL DEFAULT 'SIN CALIFICAR'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--                   TABLA ARCHIVO ADJUNTO
-- --------------------------------------------------------
CREATE TABLE tblArchivoAdjunto (              
  IDARCHIVO           int(11) NOT NULL,
  IDVACANTE           int(11) NOT NULL,
  NOMBREARCHIVO       VARCHAR(90) NOT NULL,
  UBICACIONARCHIVO    VARCHAR(255) NOT NULL,
  IDUSARIOARCHIVO     int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--                    TABLA AUTONUMBERS
-- --------------------------------------------------------
CREATE TABLE  tblautonumbers (
  AUTOID      int(11)     NOT NULL,
  AUTOSTART   VARCHAR(30) NOT NULL,
  AUTOEND     int(11)     NOT NULL,
  AUTOINC     int(11)     NOT NULL,
  AUTOKEY     VARCHAR(30) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO tblautonumbers (AUTOID, AUTOSTART, AUTOEND, AUTOINC, AUTOKEY) VALUES
(1, '02983', 7, 1, 'userid'),
(3, '0', 16, 1, 'POSTULANTE'),
(4, '69125', 29, 1, 'IDARCHIVO');

-- --------------------------------------------------------
--                    TABLA SERVICIO
-- --------------------------------------------------------
CREATE TABLE tblServicio (
  IDSERVICIO  int(11)       NOT NULL,
  SERVICIO    VARCHAR(250)  NOT NULL,
  CATEGORIA   VARCHAR(50)   NOT NULL,
  REMUNERACIONCATEGORIA   VARCHAR(10) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;


-- --------------------------------------------------------
--                    TABLA CATEGORIA
-- --------------------------------------------------------
CREATE TABLE tblCategoria (
  IDCATEGORIA    VARCHAR(11) NOT NULL,
  CATEGORIA      VARCHAR(50) NOT NULL,
  REMUNERACIONCATEGORIA   VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO tblCategoria(IDCATEGORIA, CATEGORIA, REMUNERACIONCATEGORIA) VALUES
('C001', 'A-4', 2051.00),
('C002', 'A-5', 2198.00),
('C003', 'T-2', 2472.00),
('C004', 'T-3', 2655.00),
('C005', 'T-4', 2838.00),
('C006', 'T-5', 3022.00),
('C007', 'P-2', 3113.00),
('C008', 'P-3', 3296.00),
('C009', 'P-4', 3479.00),
('C010', 'P-5', 3663.00),
('C011', 'P-6', 3846.00),
('C012', 'D-2', 4212.00),
('C013', 'D-3', 4578.00),
('C014', 'D-4', 5494.00),
('C015', 'D-5', 5769.00),
('C016', 'D-6', 6135.00);

-- --------------------------------------------------------
--                    TABLA CONVOCATORIA
-- --------------------------------------------------------
CREATE TABLE tblConvocatoria (
  IDCONVOCATORIA        int(11)       NOT NULL,
  CONVOCATORIA          VARCHAR(90)   NOT NULL,
  NROCONVOCATORIA       VARCHAR(2)    NOT NULL,
  ANIO                  VARCHAR(4)    NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--                 TABLA RETROALIMENTACIÓN
-- --------------------------------------------------------
CREATE TABLE tblRetroalimentacion (
  IDRETROALIMENTACION   int(11)       NOT NULL,
  IDPOSTULANTE          int(11)       NOT NULL,
  IDREGISTRO            int(11)       NOT NULL,
  RETROALIMENTACION     text          NOT NULL,
  MENSAJE               VARCHAR(500)  NOT NULL;
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
--                    TABLA VACANTES
-- --------------------------------------------------------
CREATE TABLE tblVacante (
  IDVACANTE               int(11)         NOT NULL,
  IDCONVOCATORIA          int(11)         NOT NULL,
  SERVICIO                VARCHAR(250)    NOT NULL,
  CATEGORIA               VARCHAR(50)     NOT NULL,
  REMUNERACION            double          NOT NULL,
  FORMACIONACADEMICA      VARCHAR(90)     NOT NULL,
  NROVACANTES             int(11)         NOT NULL,
  DURACION                VARCHAR(90)     NOT NULL,
  EXPERIENCIAGENERAL      int(11)         NOT NULL,
  EXPERIENCIAESPECIFICA   int(11)         NOT NULL,
  FUNCIONES               text            NOT NULL,
  LUGARTRABAJO            VARCHAR(250)    NOT NULL,
  FECHAPUBLICACION        datetime        NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
--                    TABLA USUARIOS
-- --------------------------------------------------------
CREATE TABLE tblusers (
  USERID      varchar(30)   NOT NULL,
  FULLNAME    varchar(40)   NOT NULL,
  USERNAME    varchar(90)   NOT NULL,
  PASS        varchar(90)   NOT NULL,
  ROLE        varchar(30)   NOT NULL,
  PICLOCATION varchar(255)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO tblusers (USERID, FULLNAME, USERNAME, PASS, ROLE, PICLOCATION) VALUES
('00018', 'Campcodes', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/Koala.jpg'),
('2018001', 'Chambe Narciso', 'Narciso', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', 'Employee', '');

CREATE TABLE tblComunicado (
  IDCOMUNICADO          int(11)       NOT NULL,
  CONVOCATORIA          VARCHAR(90)   NOT NULL,
  TIPOCOMUNICADO        varchar(40)   NOT NULL,
  DESCRIPCION           varchar(300)   NOT NULL,
  UBICACIONCOMUNICADO   varchar(255)  NOT NULL,
  FECHAPUBLICACION      datetime      NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE tblRegistroPuestoLaboral (
  IDREGISTROPUESTO    int(11)       NOT NULL,
  DNI                 VARCHAR(8)    NOT NULL,
  APELLIDOS           VARCHAR(90)   NOT NULL,
  NOMBRES             VARCHAR(90)   NOT NULL,
  DIRECCION           VARCHAR(255)  NOT NULL,
  CORREO              VARCHAR(90)   NOT NULL,
  CELULAR             VARCHAR(90)   NOT NULL,
  FORMACIONACADEMICA  text          NOT NULL,
  PROFESION_OFICIO    text          NOT NULL,
  EXPERIENCIAPUBLICA  int(11)       NOT NULL,
  EXPERIENCIAPRIVADA  int(11)       NOT NULL,
  UBICACIONCV         varchar(255)  NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE tblRegistroPuestoLaboral
ADD PRIMARY KEY (IDREGISTROPUESTO);

ALTER TABLE tblComunicado
MODIFY IDCOMUNICADO int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

ALTER TABLE tblRegistroPuestoLaboral
MODIFY IDREGISTROPUESTO int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6000;


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
-- Indexes for table `tblVacanteregistration`
--
ALTER TABLE tblRegistroPostulacion
ADD PRIMARY KEY (IDREGISTRO);

--
-- Indexes for table `tblusers`
--
ALTER TABLE tblusers
ADD PRIMARY KEY (USERID);

ALTER TABLE tblComunicado
ADD PRIMARY KEY (IDCOMUNICADO);

ALTER TABLE tblComunicado
MODIFY IDCOMUNICADO int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
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