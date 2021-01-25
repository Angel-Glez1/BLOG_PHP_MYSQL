<?php
date_default_timezone_set('America/Mexico_city');

if (isset($_GET['cual'])  &&  $_GET['cual'] != "") {
    $archivo = $_GET['cual'];
    $contenido = file_get_contents("../extras/textos/institucional/$archivo.txt");
    // $contenido = nl2br($contenido);
    $solo_lectura = 'readonly';
    $boton = 'editar';
} else {

    $archivo = "new";
    $contenido = '';
    $solo_lectura = '';
    $boton = "Guardar";
}
?>
<h2>Manejo de texto</h2>

<table border="1" " >
        <tr >
            <th>Nombre Archivo</th>
            <th>tamaño</th>
            <th>fecha de creacion</th>
            <th>Editar</th>
        </tr>

        <?php
        $carpeta = glob('../extras/textos/institucional/*.txt');
        foreach ($carpeta as $file) :
            echo '<tr>';
            $nombre = $file;
            $tamaño = filesize($file);
            $makeDateFile = date('Y-m-d H:i', filemtime($file));
            $info = pathinfo($file);



            echo "<td>$info[filename]</td>";
            echo "<td>$tamaño</td>";
            echo "<td>$makeDateFile</td>";
            echo "<td><a href='index.php?seccion=estaticos&cual=$info[filename]'>editar</a></td>";
            echo "<td><a href='acciones/borrar_text_static.php?filename=$info[filename]'>elimimar</a></td>";
            echo '</tr>';
        endforeach;
        ?>
        
    </table>

    <!-- Formulario para la creacion de textos staticos -->
    <form action="acciones/editar_texto.php" method="post">
        <input type="text" <?= $solo_lectura ?> name="file" value="<?= $archivo ?>">
        <button type="submit"><?= $boton ?></button>
        <div><textarea name="content" rows="20" cols="80"><?= $contenido ?></textarea></div>
    </form>