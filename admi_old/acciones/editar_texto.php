<?php 

// Cachamos lo que venga por post para poder modificar el archivo
$file = $_POST['file'];
$contenido = $_POST['content'];
$url  = "../../extras/textos/institucional/$file.txt";




// Hacemos la modificacion el archivo
file_put_contents($url, $contenido);


header("location: ../index.php?seccion=estaticos");


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
?>