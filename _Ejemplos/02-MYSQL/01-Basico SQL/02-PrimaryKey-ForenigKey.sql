/*
|-------------------------------------------------------------------------
|       LLAVES FORANEAS Y PRIMARIS
|--------------------------------------------------------------------------
|
|   PRIMARY KEY => Para crear llaves primarias hay dos formas 
|                   1)-Por el atributo PRIMARY KEY desde la columna
|                   2)-Usando la funcion PRIMARY KEY(). Esta funcion
|                       Se ocupa cuando tenemos una tabla que une una                        
|                       relacion de muchos a muchos, y tenemos que hacer 
|                       referencia a dos campos, La funcion la vamos a ocupar,
|                       cuando tengamos que decir mas de una columna van hacer 
|                       llaves primarias como en una tabla que se encarga
|                       de normalizar relaciones muchos a muchos
*/

--
--  CREAR PRIMARY KEY POR ATRIBUTO AL CREAR LA COLUMNA.
--
CREATE TABLE genero(

    ID              INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sexo          VARCHAR(200) -- Hombre|mujer
)ENGINE=innoDB;


-- 
-- CREAR PRIMARYS KEYS POR FUNCION
-- 
CREATE TABLE usuario(

    ID          INT UNSIGNED AUTO_INCREMENT,
    NOMBRE      VARCHAR(50),

    CONSTRAINT PKusuario PRIMARY KEY(ID);

)ENGINE=innoDB;