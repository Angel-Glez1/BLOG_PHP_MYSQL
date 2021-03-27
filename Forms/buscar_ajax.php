<?php 

// Sirve para avilitar peticiones JSON
header("Acces-Controll-Allow-Origin: *");

require_once '../setup/conexion.php';
$buscar = escape($_POST['buscar']);

$c= "SELECT TITULO, ID FROM posteos WHERE TITULO LIKE  '%$buscar%' OR TEXTO LIKE '%$buscar%' ORDER BY TITULO";

$fila = mysqli_query($conexion,$c);


$datos = [];
while ($a = mysqli_fetch_assoc($fila)) {
    // echo  "<li><a href='index.php?seccion=leer&id=$a[ID]'>$a[TITULO]</a></li>";

    $datos[] = $a;

}

// Trasforma a json
echo json_encode($datos);




?>