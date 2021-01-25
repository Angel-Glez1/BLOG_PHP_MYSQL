<?php 

// Para conectarse a una base de datos tenemos que usar PDO o Mysqli 

$host       = "localhost";
$usuario    = "root";
$contrasena = "";
$nombre_DB  = "blog";


$conexion = mysqli_connect($host,$usuario,$contrasena,$nombre_DB);




// Siempre tienes que cerrar la conexion y cualquier varible que contega los resultados de una consulta Pero al final del HTML 

// mysqli_free_result($resultado);  -> Libera espacio en memoria de los resultados de un select
// mysqli_close($conexion);         -> Cierra la conexion y librera espacio en memoria.

?>