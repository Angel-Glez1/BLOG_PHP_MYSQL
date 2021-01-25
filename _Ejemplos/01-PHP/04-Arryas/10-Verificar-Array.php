<?php 

// Buscar si Existe un ELEMENTO EN UN ARRAY.
$nombre = ['angel', 'pepe', 1 ];
in_array('angel', $nombre); //retorna un boleano dependiendo si encontro o no un elemeto.


// Buscar si exite un INDICE EN UN ARRAY
var_dump(isset($nombre[8])); //Retorna un boolean dependiedo si encontro o no el indice.

$var = 'juan';
if(in_array( $var,  $datos)){

    $swich = true;
    $nombre['edad'] = 17;
    

}else{

    echo 'el Nombre ya exite';
    return $swich;

}

print_r($datos);


?>