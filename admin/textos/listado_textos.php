<?php
// Array para ordernar los registros.
$ordenes = array(
    'TITULO', // Indice por default
    'TITULO', // GET con el valor de 1
    'TITULO DESC', // GET con el valor 2 
    'FECHA_ALTA', // GET CON EL valor de 3
    'FECHA_ALTA DESC , TITULO DESC', // GET con el valor de 4
    'CONTADOR', // GET con el valor de 5
    'CONTADOR DESC , TITULO DESC' // GET con  el valor de 6
);

// Resivo el numero por el cual lo voy a ordenar.
$num_orden = isset($_GET['orden']) ? $_GET['orden'] : 1;
// Validar si exite el indece el el array y si no mostramos uno por defesto
$order = isset($ordenes[$num_orden]) ? $ordenes[$num_orden] : $ordenes[1];


/*----------------------------------------------------------------------
|                         INICIO DEL PAGINADOR...
|---------------------------------------------------------------------*/
$pagina_actual = isset($_GET['p']) ? $_GET['p'] : 1;
$num_items_pag = 20;

// Saber la cantidad de usuarios que hay e la base de datos.
$cant_resgistros = "SELECT COUNT(ID) AS 'TOTAL' FROM posteos";
$query = mysqli_query($conexion, $cant_resgistros);
$fetch = mysqli_fetch_assoc($query);
$total_registros = $fetch['TOTAL'];

// Sacar la cantidad de links para el paginador
$cant_links_paginador = ceil($total_registros / $num_items_pag);

// Validar paginador
if ($pagina_actual > $cant_links_paginador) {$pagina_actual = $cant_links_paginador; }
if ($pagina_actual <= 0) { $pagina_actual = 1; }

// Sirve indicar el inico del limit de foma dinamica cadavez qe cambie de pagina
$inicio =  ($pagina_actual - 1) * $num_items_pag;

// Obtener los PUBLICACION Ó POSTEOS de la base de datos.
$getPosts = "SELECT 
                posteos.ID,
                posteos.TITULO,
                SUBSTRING_INDEX(posteos.TEXTO, ' ' , 25 ) AS 'PREVIEW',
                DATE_FORMAT(posteos.FECHA_ALTA, '%d/%m/%y %H:%i' ) AS 'FECHA_SPA',
                posteos.CONTADOR,
                usuarios.NOMBRE AS 'NOMBRE_USER',
                IF(posteos.ESTADO = 1 , 'ACTIVO', 'INACTIVO' ) AS 'ESTADO'           
            FROM posteos
            LEFT JOIN usuarios
            ON usuarios.ID = posteos.FKAUTOR
            ORDER BY posteos.$order 
            LIMIT $inicio, $num_items_pag ";
$resultPost = mysqli_query($conexion, $getPosts);

?>
<!-- Agregar un nuevo POSTEO -->
<div>
    <a href="index.php?categoria=textos&view=alta" id="alta"> Subir un nuevo texto </a>
</div>

<!-- Tabla de POSTEOS -->
<table border="1px ">
    <thead>
        <tr>
        <th>ID</th>
            <th>Titulo
                <a title="De la A ala Z" class="asc" href="index.php?categoria=textos&orden=1">ASC</a>
                <a title="De la Z ala A" class="desc" href="index.php?categoria=textos&orden=2">DECS</a>

            </th>
            <th>Preview</th>
            <th>Fecha de alta
                <a class="asc" href="index.php?categoria=textos&orden=3">ASC</a>
                <a class="desc" href="index.php?categoria=textos&orden=4">DECS</a>
            </th>
            <th>Cant. Visitas
                <a class="asc" href="index.php?categoria=textos&orden=5">ASC</a>
                <a class="desc" href="index.php?categoria=textos&orden=6">DECS</a>
            </th>
            <th>Autor </th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($post = mysqli_fetch_assoc($resultPost)) : ?>
            <tr id="t_<?= $post['ID'] ?>">

                <td><?= $post['ID'] ?></td>
                <td><?= $post['TITULO'] ?></td>
                <td><?= $post['PREVIEW'] ?></td>
                <td><?= $post['FECHA_SPA'] ?></td>
                <td><?= $post['CONTADOR'] ?></td>
                <td><?= $post['NOMBRE_USER'] ?></td>
                <td><?= $post['ESTADO'] ?></td>
                <td>
                    <a href="index.php?categoria=textos&view=editar&id=<?= $post['ID'] ?>" class="edit"> Editar </a>
                    <a onclick="return confirm('Esta seguro que desea eliminar <?= $post['TITULO']  ?>')" href="acciones/posteos/eliminar_posteo.php?id=<?= $post['ID'] ?>" class="delete"> Eliminar</a>
                </td>
            </tr>
        <?php endwhile;
        mysqli_free_result($resultPost); ?>
    </tbody>
</table>

<!-- Paginador -->
<?php if ($cant_links_paginador > 1) : ?>
    <div class="paginador">
        <ul>
            <?php for ($i = 1; $i <= $cant_links_paginador; $i++) : ?>
                <?php $class_name = ($pagina_actual == $i) ? 'actual' : '' ?>
                <li>
                    <a class="<?= $class_name ?>" href="index.php?categoria=textos&p=<?= $i ?>&orden=<?= $num_orden ?>">Pag. <?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </div>
<?php endif; ?>