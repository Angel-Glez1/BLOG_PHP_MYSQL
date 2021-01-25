<?php
// Creamos la sentencia
$sentencia = "SELECT * FROM categorias";
$resulto = mysqli_query($conexion, $sentencia);

?>
<nav>
    <ul>
        <li> <a href="<?= URL_BASE ?>" class="<?= ($seccion == 'home') ? 'seccion' : ''  ?>">Home</a></li>
        <li><a href="<?= URL_BASE ?>/categorias" class="<?= ($seccion == 'categorias') ? 'seccion' : '' ?>">Categorias</a>
            <ul>
                <?php while ($categoria = mysqli_fetch_assoc($resulto)) : ?>
                    <li>
                        <a class="<?= ($categoria['ID']) == $_GET['idc'] ? 'seccion' : '' ?>" href="index.php?seccion=categoria&idc=<?= $categoria['ID'] ?>">
                            <?= $categoria['CATEGORIA'] ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </li>
        <li><a href="<?= URL_BASE ?>/contacto" class="<?= ($seccion == 'contacto') ? 'seccion' : '' ?>">Contacto</a></li>
    </ul>
</nav>