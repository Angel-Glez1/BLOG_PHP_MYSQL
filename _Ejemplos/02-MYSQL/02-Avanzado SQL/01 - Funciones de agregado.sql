/*
TOTAL DE USUARIOS -
- CUANTOS CON NOMBRE Y APELLIDO
- CUANTOS SIN NOMBRE Y SIN APELLIDO 
*/
SELECT 
	COUNT( ID ) AS TOTAL,
	COUNT( APELLIDO ) AS APELLIDOS,
	COUNT( ID ) - COUNT( APELLIDO ) AS SIN_APELLIDOS,
	COUNT( NOMBRE ) AS NOMBRES,
	COUNT( ID ) - COUNT( NOMBRE ) AS SIN_NOMBRES
FROM 
	usuarios;
	
/*
TOTAL DE TEXTOS
SUMA DE VISITAS EN LOS TEXTOS 
*/
SELECT
	COUNT( ID ) AS TOTAL,
	SUM(CONTADOR) AS LECTURAS
FROM 
	posteos;