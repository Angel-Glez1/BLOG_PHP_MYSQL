<?php 
$pagina = $_GET['cual'];

// Url de los archivos a leer
$url = "extras/textos/institucional/$pagina.txt";

// Ver si existen esos archivos en la ruta que especificamos.
if(file_exists($url)) {
    $contenido = file_get_contents($url);
    $contenido = nl2br($contenido);
} else {
    $contenido = "<p class='error' > Ups! No exite el archivo $pagina </p>";
}
?>

<!-- Motramos el articulo -->
<article>
    <h1><?php echo $pagina; ?></h1>

    <p><?= $contenido ?></p>
</article>

