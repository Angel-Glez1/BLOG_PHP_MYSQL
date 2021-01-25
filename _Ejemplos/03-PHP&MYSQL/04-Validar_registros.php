<?php 
/*
|-------------------------------------------------------------
|       Para validar si exiten registros en la DB
|-------------------------------------------------------------
|
|   Para validar si exite registros o no al hacer la consulta 
|   sql podemos usar usar la funcion
|   mysqli_nums_rows() esto se hace cuando haces el mysqli_query
|   o pregunatar si no exiten el fecth que realizamos.
|
*/


$getusuarios = "SELECT * FROM usuarios";
$query_usuarios = mysqli_query($conexion,$usuarios);
$fetch_usuarios = mysqli_fetch_assoc($$query_usuarios);


// Validar por mysqli_nums_rows 
if(mysqli_num_rows($query_usuarios) > 1 ){
    foreach($fetch_usuarios as $usuarios){
        echo $usuarios['NOMBRE'];
    }
} 

// Validar por el fetch
if(!$fetch_usuarios){
    die();
}else{
    foreach ($fetch_usuarios as $usuarios) {
        echo $usuarios['NOMBRE'];
    }
}









?>