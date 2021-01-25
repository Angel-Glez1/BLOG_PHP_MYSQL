<?php
require_once '../setup/conexion.php';

$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM categorias WHERE ID = $id";
$query = mysqli_query($conexion,$sql);
$fetch = mysqli_fetch_assoc($query);

if(!$fetch){

    echo "<h3>ERROR</h3>";
    echo "<p class='error'>La categoria solicitada no exite</p>";
    die();
}
?>

<h3>Editar categoria</h3>

<form action="acciones/categorias/update_categoria.php" method="post">

    <div>
        <span>Nombre</span><input type="text" name="categoria" value="<?= $fetch['CATEGORIA']?>">
    </div>
    <div>
        <input type="hidden" name="categoria_id" value="<?= $fetch['ID'] ?>" >
        <input type="submit" value="Enviar" class='left'>
        <input type="button" value="Cancelar" onclick="location.href = 'index.php?categoria=categoria'">

    </div>
</form>