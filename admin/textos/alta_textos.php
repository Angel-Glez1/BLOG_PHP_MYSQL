<?php
// Obtener la conexion ala base de datos.
require_once '../setup/conexion.php';

// Traer los usaurios 
$s = "SELECT ID, CONCAT(NOMBRE, ' ' , APELLIDO) AS USUARIO
      FROM usuarios
      WHERE APELLIDO IS NOT NULL AND NOMBRE IS NOT NULL
      ORDER BY APELLIDO, NOMBRE";
$f = mysqli_query($conexion, $s);

// Traer categorias
$s2 = "SELECT * FROM CATEGORIAS";
$f2 = mysqli_query($conexion, $s2);


$preferencia = array('comentar', 'descargar', 'enviar');



?>



<h3>Nueva Texto</h3>
<form enctype="multipart/form-data" action="acciones/posteos/guardar_posteo.php" method="post">

    <div>
        <span>Titulo</span>
        <input type="text" name="titulo">
    </div>

    <div>
        <span>Imagen para el posteo</span>
        <input type="file" name="foto" id="">
    </div>


    <div>
        <span>Texto</span>
        <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
    </div>
    <div>
        <span>Autor</span>
        <select name="FKAUTOR" id="">
            <?php while ($u = mysqli_fetch_assoc($f)) : ?>
                <option value="<?= $u['ID'] ?>"><?= $u['USUARIO'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div>
        <span>Categorias</span>
        <span>
            <?php while ($categoria = mysqli_fetch_assoc($f2)) : ?>
                <label><input type="checkbox" name="categoria[]" value="<?= $categoria['ID'] ?>" id=""><?= $categoria['CATEGORIA'] ?></label>
            <?php endwhile; ?>
        </span>
    </div>

    <div>
        <span>Configuracion</span>
        <span>
            <?php foreach ($preferencia as $accion) : ?>
                <label><input type="checkbox" name="accion[]" value="<?= $accion ?>"><?= $accion ?></label>
            <?php endforeach; ?>
        </span>
    </div>


    <div>
        <input type="submit" value="Enviar" class='left'>
        <input type="button" value="Cancelar" onclick="location.href = 'index.php?categoria=textos'">

    </div>
</form>
<script src="recursos/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('texto',{
        enterMode :  CKEDITOR.ENTER_BR,
        entities: false,
        toolbar : [
            { items: ['Bold', 'Italic', 'NumberedList', 'BulletedList'] },
            { items: ['Link', 'Unlink'] },
            { items: ['RemoveFormat'] }
        ]
    });
</script>