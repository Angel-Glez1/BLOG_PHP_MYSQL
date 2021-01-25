<h1>Textos del blog</h1>
<h2>Textos del blog</h2>
<table border="1">
    <thead>
        <tr>
            <th>Nombre de la carpeta</th>
            <th>Titulo</th>
            <th>Preview</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $directorio = opendir('../extras/blog');
        while ($carpeta = readdir($directorio)) :

            if ($carpeta == '.' || $carpeta == '..') continue;
            $titulo = file_get_contents("../extras/blog/$carpeta/titulo.txt");
            $preview = file_get_contents("../extras/blog/$carpeta/preview.txt");
        ?>

            <tr>
                <td><?= $carpeta ?></td>
                <td><?= $titulo ?></td>
                <td><?= $preview ?></td>
                <td>
                    <!-- <a href="index.php?seccion=blog&cual=">Editar</a> -->
                    <a href="acciones/borrar_post_blog.php?dir=<?= $carpeta ?>">Elimar</a>
                </td>
            </tr>


        <?php endwhile;
        closedir($directorio);
        ?>
    </tbody>
</table>
<br><br>
<!-- Formulario de lo quesea -->
<form action="acciones/crear_post_blog.php" method="post" enctype="multipart/form-data">



    imagen :<input type="file" name="fname" id=""> <br>
    <input type="text" name="titulo" placeholder="Titulo....">
    <br>
    <textarea name="preview" cols="30" rows="10" placeholder="Introduccion..."></textarea>
    <br>
    <textarea name="contenido" cols="30" rows="10" placeholder="Contenido...."></textarea>
    <div>Marca de agua <input type="checkbox" name="marca"></div>
    <input type="submit" value="Crear post"><br>


</form>