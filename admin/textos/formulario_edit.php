<?php
require_once '../setup/conexion.php';

// Obtoner el ID del posteo a editar.
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Obtener los datos del POSTEO por medio del ID que resivimos.
$sql = "SELECT * FROM posteos WHERE ID = $id";
$query = mysqli_query($conexion, $sql);
$dato = mysqli_fetch_assoc($query);


// Traer los usaurios 
$s = "SELECT ID, CONCAT(NOMBRE, ' ' , APELLIDO) AS USUARIO
      FROM usuarios
      WHERE APELLIDO IS NOT NULL AND NOMBRE IS NOT NULL
      ORDER BY APELLIDO, NOMBRE";
$f = mysqli_query($conexion, $s);

// Traer categorias para que pueda seleccionar mas de las que ya tiene.
$s2 = "SELECT * FROM CATEGORIAS";
$f2 = mysqli_query($conexion, $s2);


// Obtener las categorias a las que pertenece el posteo (Por una tabla NORMALIZADA).
$sql2 = "SELECT FKCATEGORIA FROM relacion WHERE FKPOSTEO = $id ";
$query2 = mysqli_query($conexion, $sql2);

/**
 * --------------------------------------------------------------
 *    Obtener las categorias que estan relacionadas al POSTEO.
 * 
 *          (Esto se hace en una tabla normalizada)
 * --------------------------------------------------------------
 * Vamos a guardar en un array vacio todas las categorias
 * alas que pertenece el POSTEO que estamos editando
 * para despues poder tildar en el formulario las categorias
 * alas que ya pertene el posteo
 * 
 */
$categorias_anteriores = array();
while ($categorias = mysqli_fetch_assoc($query2)) {

    $categorias_anteriores[] = $categorias['FKCATEGORIA'];
}

/**
 * -----------------------------------------------------------
 *     Obtener las REFERENCIAS alas que pertenece el POSTEO
 *          (Esto se hace en una columna de tipo SET)
 * -----------------------------------------------------------
 * 
 * Para poder mostrar los campos que tengamos en una columna
 * de tipo SET tenemos que crear nuestros propios un array como
 * los mismos valores que tenemos en la BD en la tabla correspondiente
 * 
 * Lo que tenemos que hacer despues es obtener los valores de la 
 * columna de tipo SET que esten relacionados con el posteo que estamos
 * esditando una vez que obtengamos los valores los obtenemos en forma
 * de string ahora los tenemos que transformar a un array para poder 
 * hacer la busqueda y todo eso que ya sabes 
 * 
 */

$preferencia = array('comentar', 'descargar', 'enviar');
$preferencia_anteriores = explode(',', $dato['PREFERENCIAS']);
?>

<h3>Editar Posteo</h3>
<form enctype="multipart/form-data" action="acciones/posteos/update_posteo.php" method="post">

    <div>
        <span>Titulo</span>
        <input type="text" name="titulo" value="<?= $dato['TITULO'] ?>">
    </div>
    <div>

        <div>
            <span>Imagen </span>
            <input type="file" name="foto" id="">
            <sapn>
           <img src="../uploads/posts-thumbs/<?= $dato['FOTO'] ?>" width="100">
            </sapn>
        </div>

        <span>Texto</span>
        <textarea name="texto" id="" cols="30" rows="10"><?= $dato['TEXTO'] ?></textarea>
    </div>
    <div>
        <span>Autor</span>
        <select name="FKAUTOR" id="">
            <?php while ($u = mysqli_fetch_assoc($f)) : ?>
                <?php $atributo = ($u['ID']  == $dato['FKAUTOR']) ? 'selected' : '' ?>
                <option <?= $atributo ?> value="<?= $u['ID'] ?>"><?= $u['USUARIO'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <!-- Categorias Uno -->

    <div>
        <span>Categorias</span>
        <span>
            <?php 
            while ($c = mysqli_fetch_assoc($f2)) :
                /** Buscar si esta el ID de alguna de las categorias que estmos recorriendo 
                 * en el array donde estan los IDS de las categorias alas que ya pertenecia
                 * el POSTEO... */
                $checked =  in_array($c['ID'], $categorias_anteriores )  ? 'checked' : '';
                echo "<label><input $checked type='checkbox' name='categoria[]' value='$c[ID]'>$c[CATEGORIA] </label>";
            endwhile;
            ?>
        </span>
    </div>

    <div>
        <span>Configuracion</span>
        <span>
            <?php 
            foreach($preferencia as $acciones):

                $checked = in_array($acciones , $preferencia_anteriores) ? 'checked' : '';
                echo "<label><input $checked type='checkbox' name='pref[]' value='$acciones' /> $acciones  </label>";
            endforeach;
            ?>
        </span>
    </div>


    <div>
        <input type="hidden" name="id" value="<?= $dato['ID'] ?>">
        <input type="submit" value="Enviar" class='left'>
        <input type="button" value="Cancelar" onclick="location.href = 'index.php?categoria=textos'">

    </div>
</form>