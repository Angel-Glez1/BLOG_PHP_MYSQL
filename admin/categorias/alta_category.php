<h3>Nueva Categoria</h3>

<form action="acciones/categorias/guardar_categoria.php" method="post">

    <div>
        <span>Nombre</span><input type="text" name="categoria">
    </div>
    <div>
        <input type="submit" value="Enviar" class='left'>
        <input type="button" value="Cancelar" onclick="location.href = 'index.php?categoria=categoria'">

    </div>
</form>