/*

    MYSQL nos ofrece funciones para mostrar estadisticas de reportaje
    ejemplo 
    COUNT() -> Sirve para contar el total de registros que hay 
    MAX()   -> ME SACA EL MAXICO DE UNA COLUMNA TALVES EL PRE
    SUM()   -> Suma columnas

*/

-- Sacar cunatos usuarios no tiene apellido 
SELECT 

    COUNT(ID) AS "Num Users",
    COUNT(apellido) AS "Usuarios con apellido",
    COUNT(ID) - COUNT(apellido) AS "Usuarios sin apellido"

FROM usuarios;