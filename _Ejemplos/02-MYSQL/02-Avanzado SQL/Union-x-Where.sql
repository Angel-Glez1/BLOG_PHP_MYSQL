/*
|--------------------------------------------------------------------------------------------------
|                           UNION DE TABLAS POR WHERE
|--------------------------------------------------------------------------------------------------
|      IMPORTANTE.....Cuando hacemos union de tablas por WHERE lo que va a pasar es que si un 
|                       registro en este caso de usuarios, no tiene un valor el la columna de 
|                       la foreing key lo que va hacer es que no lo va a mostar. Y para evitar
|                       eso ocupamos los INNER JOIN pero eso es aparte
|
|
|      Para unir tablas, podemos hacerlo de varias formas. Aqui lo vamos hacer con la filtro WHERE
|      Para unir dos tablas o mas con el filtro where tenemos que tener en cuentas varios conceptos
|      El primero. Cuando hacer un SELECT recuerda que no estas manipulando la informacion original
|      sino mas bien una copia
|      Segundo, recuerda que despues del select van las columnas que vamos a mostar su info.
|      Sabiendo esto ahora tenemos tenemos que seguir esta series de pasos al hacer la sentencia select
|      
|      Ejemplo. Vamos a sacar el genero pos su nombre que tiene cada usuario
|       1)-SELECT usuarios.NOMBRE, generos.GENERO
|       2)-FROM   usuarios, generos
|       3)-WHERE usuarios.FKGENERO = generos.id;
|
|       Okey!!!
|       El paso Num.1 -> Tienes que definir las columnas que vas a mostar en un tabla temporal, en este caso 
|                        estamos sacando el nombre de los usuarios y su genero(esta columna tiene Masculino ó 
|                        Femenino)                
|       El paso Num2  -> Es decirle a sql que queremos sacar esas columnas definidas en el Select 
|       
|       El paso Num3. -> Aqui vamos a ocupar los campos de cada tabla que estan relacidos
*/


-- Sacar que genero son los usuarios Union de dos tablas
SELECT usuarios.nombre, geneneros.genero
FROM   usuarios, geneneros
WHERE usuarios.FKGENERO = geneneros.id;


/* 
    Para unir mas de una tabla lo qe tenemos que hacer es exportar la tabla que vamos a usar en el From,
    Y Con un solo WHERE hacer las comparaciones de las FOREING KEY con ayuda de un AND(&&) 
*/
-- Mostar el nombre, la nacionalidad, y el sexo de cada los usuairos
SELECT usuarios.NOMBRE, paises.PAIS, generos.GENERO
FROM usuarios,paises,generos
WHERE usuarios.FKPAIS = paises.ID AND usuarios.FKGENERO = generos.ID ;



