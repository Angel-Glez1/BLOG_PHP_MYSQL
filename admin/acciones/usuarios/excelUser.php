<?php
// Obtener los USUAROOS  de la base de datos.
require_once '../../../setup/conexion.php';
$getUsers = "SELECT 
        usuarios.ID,
        IFNULL(usuarios.NOMBRE, '-SIN DEFINIR-') AS 'NOMBRE' ,
        IFNULL(usuarios.APELLIDO, '-SIN DEFINIR-') AS 'APELLIDO',
        usuarios.EMAIL,
        DATE_FORMAT(usuarios.FECHA_ALTA, '%d/%m/%y %H:%i' )AS 'FECHA_SPA',
        IF(usuarios.ESTADO = 1 , 'activo' , 'inactivo')AS 'ESTADO',
        usuarios.NIVEL,
        IFNULL(paises.PAIS, '-SIN DEFINIFR-' ) AS 'NACIONALIDAD' ,
        IFNULL(generos.GENERO, '-SIN DEFINIFR-' ) AS 'GENERO' 
FROM usuarios
LEFT JOIN paises ON paises.ID = usuarios.FKPAIS
LEFT JOIN generos ON generos.IDGENERO = usuarios.FKGENERO 
ORDER BY ID";

$resultUsers = mysqli_query($conexion, $getUsers);


while ($a = mysqli_fetch_assoc($resultUsers)) {

    // EL \t es para que me genere una nueva columna en excel
    // El \n es para que pase a la siguiente fila
    // Usamos la funcion utf8_decode para que me respete ñ ó etc
    echo $a['ID'] . "\t";
    echo utf8_decode($a['APELLIDO'])  . "\t";
    echo utf8_decode($a['EMAIL']  )   . "\t";
    echo utf8_decode($a['FECHA_SPA']) . "\t";
    echo utf8_decode($a['ESTADO'])    . "\t";
    echo utf8_decode($a['NIVEL'])     . "\t";
    echo utf8_decode($a['NACIONALIDAD']) . "\t";
    echo utf8_decode($a['GENERO'])    . "\n";

}


// Para que PHP me descarge el excel necesito usar header

// Le dice al navegador que voy usar un exel
header("Content-type:  application/vnd.ms-excel");

// Le cambio en nombre a descargar.
header("Content-disposition:  attachment;filename=usuarios.xls");

?>