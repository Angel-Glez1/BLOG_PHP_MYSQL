/*
|------------------------------------------------------------------------------------------------------------------------
|                                   JOIN (LEFT | RIGHT )
|------------------------------------------------------------------------------------------------------------------------
|
|   Los join nos permiten mostar informacion de las tablas cuyo valores en columnas sean nulos osea que no tiene nada
|   
|   El filtro JOIN se puede usar sin los left ó right SOLO tenemos que comparar las columnas que va a relacinar
|   EJEMPLO => SELECT usuarios.nombre , paises.pais 
|              FROM usuarios 
|              JOIN paises ON paises.id = usuarios.pais_id  
|   Esta consulta lo que va hacer es remplazar el 1 que tiene como referencia la tabla usuarios y e va a poder el valor
|   de ese ID  PERO ESTA CONSULTA LO QUE ME VA A RETORNAR SON SOLO LOS VALORES QUE TIENEN ESOS CAPOS LLENOS
|
|  PARA MOSTAR REGISTROS QUE SUS VALORES SEAN NULOS LO QUE TENEMOS QUE HACER EN USAR LEFT 
|   SI A ESTA CONSUNTA LE AGREGO UN LEFT ANTES DEL JOIN ME VA A MOSTAR TODOS LOS RESULTADOS QUE SEAN NULOS 
|
|   LEFT   -> Me muestra todos los campos que sean NULL de la tabla que este como padre
|   
|   RIGHT  -> ME muestra todos los campos que sean NULL de la tabla que este en el JOIN    
|   
|   IFNULL -> Verifica si un campo de una columna es null y nos permite mostar NO CAMBIAR un valor determinado
|              IFNULL(nombre, 'Sin definir'); Esta funcion solo se recomienda usarla en los SELECT  
|
|   NULLIF -> Verifica si un campo tiene un determinado patron y los comvierte en null
|              ifnull(nombre, '') busca si en la columna nombre hay uno string vacio y lo cambia por null                     
|
*/  
-- Sacar solo los usuarios que tengan un valor en su FKPAIS 
SELECT usuarios.NOMBRE, paises.PAIS -- Columnas que quiero mostar
FROM usuarios -- Mi tabla padre
JOIN paises -- La tabla que quiero unir
ON paises.ID = usuarios.FKPAIS -- las comparacion de PRIMARY KEY con la FOREING KEY


-- Sacar solo los usuarios  tengan O no un valor en su FKPAIS 
SELECT usuarios.NOMBRE, paises.PAIS -- Columnas que quiero mostar
FROM usuarios -- Mi tabla padre
left JOIN paises -- La tabla que quiero unir
ON paises.ID = usuarios.FKPAIS -- las comparacion de PRIMARY KEY con la FOREING KEY



-- SI QUIERO AGREGAR UN VALOR POR DEFECTO A ESOS CAPOS NUELOS TENGO QUE PONER USAR LA FUNCION IFNULL
SELECT 
usuarios.NOMBRE,
IFNULL(paises.PAIS, '-Sin especificar') -- Columnas que quiero mostar
FROM usuarios -- Mi tabla padre
left JOIN paises -- La tabla que quiero unir
ON paises.ID = usuarios.FKPAIS -- las comparacion de PRIMARY KEY con la FOREING KEY


-- Forzar A null Si una registro de una columna no es lo qe quiero mostar 
SELECT NULLIF(apellido, "") FROM usuarios; -- lo que hace NULLIF forzar a null y valor que no queremos que se 