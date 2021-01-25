/*
|--------------------------------------------------------------------------------------------------
|                                   La sentencia SELECT 
|--------------------------------------------------------------------------------------------------
|
|   La sentecia select es una de las mas importantes de sql. Ya que esta nos va permitir 
|   mostar la informacion de la BD al usuario. 
|   
|   Algo muy importante de la sentecio select es que va a crear una tabla temporal
|   con los datos que solicitamos
|
|   Estan son una de las tantas cosas que podemos hacer con la sentencia SELECT
|
*/

-- Selecionar todas la columnas
SELECT * FROM usuarios;

-- Agregar una columna temporal. A la hora de mostrar datos.
SELECT name, 'HOLA MUNDO' FROM usuarios;


-- Traer solo el primer valor de una columna si este se repite
SELECT DISTINCT(telefono) FROM usuarios;

-- Taer registros donde su valor en alguna columna se NULL
SELECT name,fotoPerfil FROM usuarios WHERE ISNULL(fotoPerfil);


-- Selecionar registros por rangos
SELECT * FROM usuarios WHERE edad > 18 AND edad < 27;

-- Seleccionar registro por rangos por la PROPIEDAD BETWWEN.
SELECT * FROM usuarios WHERE edad BETWEEN 18 AND 27;





