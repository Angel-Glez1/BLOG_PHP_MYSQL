<?php 

echo "<pre>";
print_r($_POST);
echo "</pre>";


$n  = $_POST['nombre'];
$a  = $_POST['apellido'];
$e  = $_POST['emial'];
$id = $_POST['id'];


$C = "UPDATE usuario SET NOMBRE = '$n' , APELLIDO = '$a', EMAIL = '$e' WHERE ID = '$id'";
echo $C;




?>