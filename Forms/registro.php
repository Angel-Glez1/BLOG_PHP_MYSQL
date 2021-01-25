<?php 
require_once '../setup/conexion.php';
$email = escape($_POST['email']);
$password = sha1(escape($_POST['password']));
$c = "INSERT INTO usuarios SET EMAIL = '$email', CLAVE = '$password' , FECHA_ALTA = NOW() ";
mysqli_query($conexion, $c);


header("Location: ../index.php");

?>