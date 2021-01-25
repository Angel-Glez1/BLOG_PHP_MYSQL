<?php
include_once '01-CrearConexion.php';

// Creamos la sentencia
$sentencia = "SELECT * FROM categorias";

// Ejecutamos la sentenica
$resulto = mysqli_query($conexion,$sentencia);

// Obtenemos Y recorrer los resultados pro medio de una array asociativo Y usar el fetch como condicion en el while.
while($datos = mysqli_fetch_object($resulto)):

    echo "<li>". $datos->CATEGORIA . "</li>";
endwhile;







?>