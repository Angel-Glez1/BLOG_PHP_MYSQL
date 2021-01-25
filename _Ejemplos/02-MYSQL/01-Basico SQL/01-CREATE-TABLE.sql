/*
|-------------------------------------------------------------------------------------
|                       CREAR UNA TABLA
|-------------------------------------------------------------------------------------
|
|   En un hosting los comandos DROP DATA BASE O CREATE DATABASE. Estan desabilitados.
|   
|   Las conficionales IF EXITS O IF NOT EXIST. nos sirven para decirle a mysql 
|   Si exite algo has esto ó Si no exite algo has esto
|   
|   Ejemplo Crear una base datos Y borrar una base de datos
|   -PRIMEO TENEMOS QUE HACER LA SENTECIA QUE DESEAMOS Y LUEGO LAS CONDICINAL DE QUE SI EXISTE O NO
|
|
|   UNSIGNED -> Solo aceptamos numeros positivos y siempre va como primer atributo 
|
*/

DROP DATABASE IF EXISTS php_mysql;
CREATE DATABASE IF NOT EXISTS php_mysql CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE php_mysql;


-- TABLA GENEROS
CREATE TABLE generos(
    ID INT  PRIMARY KEY AUTO_INCREMENT,
    GENERO VARCHAR(200)

)ENGINE=innoDB;

--PAISES
CREATE TABLE paises(
    ID INT  PRIMARY KEY AUTO_INCREMENT,
    PAIS VARCHAR(200)

)ENGINE=innoDB;


-- TABLA DE USUARIO
CREATE TABLE usuarios(
    ID          INT  PRIMARY KEY AUTO_INCREMENT ,
    NOMBRE      VARCHAR(200),
    APELLIDO    VARCHAR(200),
    AVATAR      VARCHAR(200),
    EMIAL       VARCHAR(80) UNIQUE,
    CLAVE       VARCHAR(200),
    NIVEL       ENUM('administrador','moderador','lector') DEFAULT 'lector';
    ESTADO      INT ,
    FKPAIS      INT ,
    FKGENERO    INT ,
    FECHA_ALTA  DATETIME,
    CONSTRAINT FKIDPAIS FOREIGN KEY ( FKPAIS  )  REFERENCES paises (ID),
    CONSTRAINT FKGENERO FOREIGN KEY ( FKGENERO ) REFERENCES generos(ID)


)ENGINE=innoDB;

CREATE TABLE categorias (
    ID INT  PRIMARY KEY AUTO_INCREMENT ,
    NOMBRE VARCHAR(200)

)ENGINE=innoDB;

-- POSTEOS
CREATE TABLE posteos(
    ID          INT  PRIMARY KEY  AUTO_INCREMENT,
    TITULO      VARCHAR(200),
    FOTO        VARCHAR(200),
    TEXTO       TEXT,
    CONTADOR    INT DEFAULT 0,
    ESTADO      INT,  
    FKUSUARIO   INT, 
    FKCATEGORIA INT,
    FECHA_ALTA  DATETIME,
    CONSTRAINT FKIDUSUARIO FOREIGN KEY ( FKUSUARIO ) REFERENCES usuarios(ID);
    CONSTRAINT FKIDCATEGORIA FOREIGN KEY ( FKCATEGORIA ) REFERENCES categorias(ID);

)ENGINE=innoDB;


-- COMENTARIOS
CREATE TABLE comentarios (
    ID          INT  PRIMARY KEY AUTO_INCREMENT,
    FKUSUARIO   INT,
    FKPOSTEO    INT,
    COMENTARIO  TEXT,
    ESTADO      INT,
    FECHA_ALTA  DATETIME,

    CONSTRAINT FKIDUSUARIO FOREIGN KEY ( FKUSUARIO ) REFERENCES usuarios(ID) ,
    CONSTRAINT FKIDPOSTEO FOREIGN KEY ( FKPOSTEO )   REFERENCES posteos (ID)

)ENGINE=innoDB;



-- TABLA POR LA RECION MUCHOS A MUCHOS
CREATE TABLE relacion (

    FKPOSTEO INT ,
    FKCATEGORIA INT ,
    PRIMARY KEY (FKPOSTEO, FKCATEGORIA),
    CONSTRAINT FKIDPOSTEOS FOREIGN KEY ( FKPOSTEO )  REFERENCES posteos(ID),
    CONSTRAINT FKIDCATEGORIA FOREIGN KEY ( FKCATEGORIA) REFERENCES categorias(ID)

)ENGINE=innoDB;
