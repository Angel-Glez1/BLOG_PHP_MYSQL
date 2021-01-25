/*
|--------------------------------------------------------------------------------------------------------------------------
|                                       INSERT INTO
|--------------------------------------------------------------------------------------------------------------------------
|
|       Para insertar nuevos registros ala base de datos hay dos forma 
|       -- UNO ALA VEZ
|       -- MAS DE UNO
*/

-- INSERTAR DATOS UNO POR UNO
INSERT INTO usuarios (NAME,AGE,LASTNAME,EMAIL) VALUES ("ANGEL",20,"ARMANDO","ANGEL@ANGEL.COM");

-- INSERTAR DATOS MULTIPLES
INSERT INTO usuarios (NAME,AGE,LASTNAME,EMAIL)
VALUES ("ANGEL",20,"ARMANDO","ANGEL@ANGEL.COM"),
       ("CARO",22,"DULCE","CARO@CARO.COM");



/*
|--------------------------------------------------------------------------------------------------------------------------
|                                       DELETE FROM
|--------------------------------------------------------------------------------------------------------------------------
|   Si quieres eliminar mas de un registro ala avez hay dos formas .
|
|   La PRIMERA tenemos que usar un operador logico OR(ó) 
|   -- DELETE FROM usuarios WHERE ID = 1 0R ID = 2;
|   SIEMPRE QUE QUIERAS ELIMINAR MAS DE UN REGISTRO LO QUE TIENES QUE HACER ES USAR OR 
|   POR QUE SI USAN AND VA EXISTIR UN ERROR DE LOGICA
|
|   La SEGUNDA forma Por la palabra reserva IN
|   Si lo que quieres es eliminar mas de un registro ala vez y no tener que estar usando
|   el operador logico OR podemos usar la palabra reservada IN seguida de unos parentesis
|   y a dentro los datos que va a bucar para eliminar los
|
*/


-- Borrar todos los datos de una tabla TODOS
DELETE FROM usuarios; -- Al no ponerle un WHERE LO QUE VA HACER ES ELIMINAR TODA LA INFO DE LA TABLA.

-- Eliminar un registro en particular.
DELETE FROM usuarios WHERE ID = 1;

-- Borrar mas de un registro
DELETE FROM usuarios WHERE NAME = "ANGEL" OR NAME = "CARO";

-- Borrar mas de un registro ala vez
DELETE FROM usuarios WHERE ID IN (1,2,3,4,5,6);



/*
|----------------------------------------------------------------------------------------------------------------
|                                            UPDATE 
|----------------------------------------------------------------------------------------------------------------
|
|   Para actualizar registros usamos la palabra reservada UPDATE tabla SET columna = valor WHERE columna = valor;
|
*/
-- actualizar un registro
UPDATE usuarios SET name = "Nuevo nombre" WHERE ID = 1 ;

-- Actualizar mas de un registro ala vez.
UPDATE usuarios SET rol = "user" WHERE ID IN (1,2,3,4,5,6,7,8,9,10);


/*
|----------------------------------------------------------------------------------------------------------------
|                                           SELECT * FROM 
|----------------------------------------------------------------------------------------------------------------
|
|   Cuando usamos SELECT lo que hace es crear una tabla fictisia donde nos muestra la informacion solicitada.
|   Sabiendo esto podemos modificar como mostramos la informacion 
|
|   DISTINCT => Si exiten mas de un registro con un mismo valor en una columna solo me va a traer la un regristro 
|               de todas esas repeticiones. El DISTINCT siempre se tiene que pedir como primera columna 
*/

-- Crear una nueva columna en la tabla temporal del SELECT
SELECT name, 'HOLA' FROM usuarios;

-- Seleccionar solo un registro si se repiten mas de uno.
SELECT DISTINCT(NAME) FROM usuarios; -- Lo que hace esto es que si en mi tabla exite mas de una vez un mismo valor solo me va a traer uno 

-- Seleccionar registros donde su valor sea NULL por la funcion ISNULL(COLUMNA).
SELECT * FROM usuarios WHERE ISNULL(avatar); -- Esta sentencia lo que va hacer es traer todas los usuarios que no tengan una foto de perfil.

-- Seleccionar registros donde su valor sea NULL por Operadir IS NULL.
SELECT * FROM usuarios WHERE avatar IS NULL;



