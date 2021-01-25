/*
|----------------------------------------------------------------------------------------------
|                   LIMIT
|----------------------------------------------------------------------------------------------
    Con el operador limit podemos limitar los numeros de filas que quiero mostar


    Un solo valor
    Si ala funcion limit le pongo un solo parametro le estamos inidcando la cantidad exacta de cuantas columnas quiero traer
    SELECT * FROM usuarios LIMIT 5; -> Aqui le estamos diciendo a sql que solo quiero los primeros 5 registros.



    Dos valores en limit
    Si le pasamos dos parametros al operador limit lo que significa es el primero desde que pocision va a agarrar y segundo 
    el numero de registros a mostrar
    Ejemplo.
    SELECT * FROM usuarios LIMIT 0,5; -> Le estamos diciendo que empiece el la posicion 0 y que solo me muestre 5 registros


*/


-- Limit con un solo parametro
SELECT * FROM usuarios LIMIT 10;


-- Limit con dos parametros
SELECT * FROM usuarios LIMIT 0,20;



/*
|------------------------------------------------------------------------------------------------------------------------
|                                       ORDER BY
|------------------------------------------------------------------------------------------------------------------------
|
|   Podemos ordenar los registros Con el FILTRO ORDER BY ya sea por alguna situacion en particular de forma DECENDENTE O ASEDENTE
|
|                               Estructura SINTACTICA.
|  SELECT 
|       [COLUMNAS] 
|  FROM
|       [TABLAS]
|  WHERE
|       [CONDICIONES AND|OR ]   
| ORDER BY
|       [CRITERIO_DE_ORDENAMIENTO]
| LIMIT  
|      [CRITERIOS DE LIMITACION]
|        
*/

-- Ordenar por columnas   
SELECT * FROM usuarios ORDER BY nombre; -- Al ejecutar esta consulta me los va a ordenar en order alfabetico y el caso de INT del 1 al infinito

-- Ordernar por mas de dos columnas.
SELECT * FROM usuarios ORDER BY nombre, email; 

-- Ordenar de forma Desendente osea dela z-a ó del mayor al menor en numeros
SELECT * FROM usuarios ORDER BY nombre DESC;

-- Ordenar los registros manual mente
-- Para eso ocupamos la funcion FIELD(COLUMNA, 'PRIMER VALOR', 'SEGUNDO VALOR' ECT)
-- Hasta el momento esto solo se puede guardar los con los ARRAYS falsos de sql
SELECT * FROM usuarios ORDER BY FIELD(NIVEL, 'ADMI','USER','MODERADOR');




