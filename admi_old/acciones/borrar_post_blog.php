<?php 

$dir = $_GET['dir'];
$url = "../../extras/blog/$dir";

// Para borrar archivos
unlink("$url/contenido.txt");
unlink("$url/preview.txt");
unlink("$url/titulo.txt");
unlink("$url/imagen.jpg");

rmdir($url);

// var_dump($url);

header('location: ../index.php?seccion=blog');


?>