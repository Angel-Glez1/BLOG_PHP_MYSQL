/*
|----------------------------------------------------------------------------------------------------------------
|                                   SUBCADENAS DE TEXTO EN MYSQL    
|----------------------------------------------------------------------------------------------------------------
|   
|      Para crear subcadenas de texto tenemos varias funciones para hacer  
|
|      INSTR  -> Me devuelve la pocision de donde encontro la el Caracter que le indique
|                   INSERT(EMAIL, '@' ) otra cosa esta funcion tambien cuenta el indice donde 
|                   encontro el caracter.
|
|       LEFT([1] , [2]) -> Esta funcion me trae la catidad que le indique apartir del segundo parametro empezando
|                   de izquierda a derecha.
|                  1)- La columna donde va extraer la subcadena
|                  2)- La posicion donde me va a extraer el caracter  
|
|
|       RIGHT -> HACE LOS MISMO QUE LEFT PERO DE DERECHA A IZQUIERDA 
|
|       Hay una funcion que es mejor que estas
|       SUBSTRING_INDEX( 'COLIMNA', 'CARCATER', 'VECES QUE VA A MOSTAR' )
*/

-- Ejercicio1: Extraer la informacion que este antes del @ de todos los correos electronicos. 

-- Primero tenemos que saber en que posicion esta el @ para eso usamos instr
SELECT INSTR(EMAIL, "@" ) FROM usuarios; -- Esto me va a traer la posicion de donde se encuntra el @ 

-- A hora vamos a usar INSTR con otra funcion de MYSQL que nos sirve para extraer un subcateda de texto
SELECT nombre, LEFT(EMAIL, INSTR(EMAIL)-1) FROM usuarios; -- le restamos uno por que INSTR tambien cuenta la posicion del arroba


-- Mostar un preview de la columna texto de los post de dos palabras
SELECT SUBSTRING_INDEX(TEXTO, " ", 2) FROM posteos;


-- Esto tambien lo podemos del final osea sacr las ultimas dos poalbras del texto 
SELECT SUBSTRING_INDEX(TEXTO, " ", -2) FROM posteos;
