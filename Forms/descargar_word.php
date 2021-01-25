<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        require_once '../setup/conexion.php';
        $id = escape($_GET['id']);

        // Obtener un posteo por su ID
        $c = "SELECT * FROM posteos WHERE ID = $id";
        $r = mysqli_query($conexion,$c);
        $a = mysqli_fetch_assoc($r);


        $permisos = explode(',',$a['PREFERENCIAS']);
        if(!in_array('descargar', $permisos)){
            die();
        }

        echo $a['TITULO'];
        echo $a['TEXTO']; 

        // Remplazar espacios en el nombre del archivo
        $titulo = utf8_decode($a['TITULO']);
        $titulo = preg_replace("/\W/", "-", $titulo);

        header("Content-type: application/vnd.ms-word");
        header("Content-disposition: attachment; filename=$titulo.doc");
    }
    ?>
</body>

</html>