<?php

require_once '../../../setup/conexion.php';

$id = $_POST['id'];
$email = $_POST['email'];
$nivel = $_POST['nivel'];
$estado = $_POST['estado'];

$c = "UPDATE usuarios SET EMAIL = '$email', NIVEL = '$nivel', ESTADO = '$estado' WHERE ID ='$id' LIMIT 1 ;";
$f = mysqli_query($conexion,$c);



if( mysqli_affected_rows($conexion) == 1  ){

    $_SESSION['rta'] = "ok";

}else{

    $_SESSION['rta'] = "error";

}

header("location: ../../index.php?categoria=usuarios");


?>