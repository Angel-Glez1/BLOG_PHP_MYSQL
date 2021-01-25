<?php session_start(); ?>
<form action="registros.php" method="post">
    <input type="text" name="name" placeholder="Nombre....">
    <div><input type="submit" value="Guardar Nombre"></div>
</form>

<?php
if (isset($_SESSION['name'])) :

    $obtenerArray = $_SESSION['name'];

    for ($i = 0; $i < count($obtenerArray); $i++) : ?>
        <li><?= $obtenerArray[$i] ?></li>
    <?php endfor; ?>


    <?php $_SESSION['name'] = $obtenerArray; ?>
<?php endif; ?>