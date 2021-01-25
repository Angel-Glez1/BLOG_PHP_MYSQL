<?php
$getCategorias = "SELECT * FROM categorias";
$resultCategorias = mysqli_query($conexion, $getCategorias);

// Ver si exite un error ala ora de hacer el insert
if (isset($_GET['rta'])) {
    if ($_GET['rta'] == 'ok') {

        echo "<p class='ok'>La accion se realizo satisfactoriamente</p>";
    } else {
        echo "<p class='error'>";

        // Mostar error segun el numero que llego
        if(isset($_GET['m']) && $_GET['m'] == 1){
            echo "El campo categoria no puede estar vacio";

        // Si el numero que nos llega no exite pues valio madres. jajaj y mostramos un mensaje general
        }elseif (($_GET['m'] > 1)) {

            echo 'Algo fallo';
        // Mostar el mensaje que mandamos directamente desde el archivo que hace el insert. 
        }elseif(is_string($_GET['m'])){
            // Mostar un mensaje por si la url algun dia cambia.
            echo $_GET['m'];

        }
        echo "</p>";
    }
}
?>

<!-- Agregar nueva categoria -->
<div>
    <a href="index.php?categoria=categoria&view=alta" id="alta"> Nueva categoria</a>
</div>

<!-- Tabla de categorias -->
<table>
    <thead>
        <tr>
            <th>Nombre de la categoria</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($categoria = mysqli_fetch_assoc($resultCategorias)) : ?>
            <tr>
                <td><?= $categoria['CATEGORIA'] ?></td>
                <td>
                    <a href="index.php?categoria=categoria&view=editar&id=<?=$categoria['ID']?>" class="edit" title="Editar">Editar</a>
                    <a onclick="return confirm('Seguro que desea eliminar el registro?')" href="acciones/categorias/eliminar_categoria.php?id=<?= $categoria['ID'] ?>" class="delete" title="Eliminar">Eliminar</a>
                </td>
            </tr>
        <?php endwhile;
        mysqli_free_result($resultCategorias); ?>
    </tbody>
</table>