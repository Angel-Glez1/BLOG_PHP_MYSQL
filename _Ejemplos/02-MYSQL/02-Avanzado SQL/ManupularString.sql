/*
|-------------------------------------------------------------------------
|       Funciones para el manejo de string
|-----------------------------------------------------------------------
|   IMPORTANTE -> CUANDO OCUPES UNA FUNCION DE SQL TIENE QUE AGREGAR UN 
|                  ALIAS PARA QUE PUEDAS ACCEDER SIN PROBLEMA CON PHP
|                   A ESOS DATOS QUE NOS TRAE.
|  
|   UPPER() -> Convierte a MAYUSCULAS TODOS LOS RESULTADOS
|   
|   LOWER() -> Convierte a minusculas los resultados de pongamos a dentro
|
|
|   CONCAT -> Concateno Columnas para no mostar dos columnas
|  
|   trim -> Elimina espacios
|
|   INSTR -> Busca subcadenas de texto y devuelve su posicion   
|
|

|

*/



-- Convertir la columna Apellido a mayusculas
SELECT UPPER(APPELIDO) AS apellido FROM usuarios;

-- Convertir a minusculas el nombre
SELECT LOWER(NOMBRE) AS nombre FROM usuarios;

-- Concatener en una misma columna el nombre el apellido y el email
SELECT CONCAT(NOMBRE,Apellido,EMAIL) AS datos   FROM usuarios

-- Eliminar espacios de resultados de una columna
SELECT TRIM(NOMBRE) AS NOMBRE FROM usuarios;