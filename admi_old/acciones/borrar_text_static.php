<?php 

var_dump($_GET);
$filename = $_GET['filename'];
$url = "../../extras/textos/institucional/".$filename.'.txt';


unlink($url);
header('location: ../index.php?seccion=estaticos');

?>