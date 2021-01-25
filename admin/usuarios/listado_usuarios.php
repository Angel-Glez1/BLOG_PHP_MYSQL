<?php
/*----------------------------------------------------------------
|  Configuracion para ordenar los registros en la tabla de users
------------------------------------------------------------------*/
$ordenes = [

    'usuarios.ID', // INDICE 0
    'usuarios.NOMBRE', // INDICE 1
    'usuarios.NOMBRE DESC', // INDICE 2
    'usuarios.FECHA_ALTA , usuarios.APELLIDO ', // INDICE 3
    'usuarios.FECHA_ALTA DESC ,usuarios.APELLIDO DESC', // INDICE 4
    'usuarios.NIVEL, usuarios.APELLIDO ', // INDICE 5
    'usuarios.NIVEL DESC, usuarios.APELLIDO DESC', // INDICE 6

];

// Obtner la referenica del indice por GET para ORDENAR los usuarios
$num_orden = isset($_GET['orden']) ? $_GET['orden'] : 1;
// Si exite el inice que nos llego por GET lo usuamos y si no usamos el indice 1 como default.
$orderBy = isset($ordenes[$num_orden]) ? $ordenes[$num_orden] : $ordenes[1];


/*----------------------------------------------------------------------
|                         INICIO DEL PAGINADOR...                      |
|                                                                     */
$pagina_actual = isset($_GET['p']) ? $_GET['p'] : 1;
$cant_items_pag = 50;

$cant_registros = "SELECT COUNT(ID) AS 'TOTAL' FROM usuarios";
$query = mysqli_query($conexion, $cant_registros);
$fetch = mysqli_fetch_assoc($query);
$total_registros = $fetch['TOTAL'];
$cant_link_paginador = ceil($total_registros / $cant_items_pag);

// Validaciones del paginador si es negativo el numero o mayor
if ($pagina_actual  > $cant_link_paginador) $pagina_actual = $cant_link_paginador;
if ($pagina_actual <= 0) $pagina_actual = 1;

// Saber cuales son los registros que me tiene que mostrar por pagina dinamicamente
$inicio = ($pagina_actual - 1) * $cant_items_pag;

/*
|                         FIN DEL PAGINADOR...                         |
|---------------------------------------------------------------------*/


// Obtener los USUAROOS  de la base de datos.
$getUsers = "SELECT 
        usuarios.ID,
        IFNULL(usuarios.NOMBRE, '-SIN DEFINIR-') AS 'NOMBRE' ,
        IFNULL(usuarios.APELLIDO, '-SIN DEFINIR-') AS 'APELLIDO',
        usuarios.EMAIL,
        DATE_FORMAT(usuarios.FECHA_ALTA, '%d/%m/%y %H:%i' )AS 'FECHA_SPA',
        IF(usuarios.ESTADO = 1 , 'activo' , 'inactivo')AS 'ESTADO',
        usuarios.NIVEL,
        IFNULL(paises.PAIS, '-SIN DEFINIFR-' ) AS 'NACIONALIDAD' ,
        IFNULL(generos.GENERO, '-SIN DEFINIFR-' ) AS 'GENERO' 
FROM usuarios
LEFT JOIN paises ON paises.ID = usuarios.FKPAIS
LEFT JOIN generos ON generos.IDGENERO = usuarios.FKGENERO 
ORDER BY $orderBy
LIMIT $inicio , $cant_items_pag";

$resultUsers = mysqli_query($conexion, $getUsers);

if(isset($_SESSION['rta'])){
    switch ($_SESSION['rta']):
        case 'ok':
            echo "<p class='ok'>Usuario actualizado </p>";
        break;
        case 'error':
            echo "<p class='error'>No se pudo actualizar el usuario</p>";
        break;
    endswitch;

    unset($_SESSION['rta']);
}

?>
<!-- Tabla de POSTEOS -->
<a href="acciones/usuarios/excelUser.php">Descargar en Excel La tabla de usuarios</a>
<table border="1px ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre
                <a class="asc" href="index.php?categoria=usuarios&orden=1"></a>
                <a class="desc" href="index.php?categoria=usuarios&orden=2"></a>
            </th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Fecha De Alta
                <a class="asc" href="index.php?categoria=usuarios&orden=3"></a>
                <a class="desc" href="index.php?categoria=usuarios&orden=4"></a>
            </th>
            <th>Estado </th>
            <th>Nivel
                <a class="asc" href="index.php?categoria=usuarios&orden=5"></a>
                <a class="desc" href="index.php?categoria=usuarios&orden=6"></a>
            </th>
            <th>Nacionalidad</th>
            <th>Genero</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($user = mysqli_fetch_assoc($resultUsers)) : ?>
            <tr>
                <td><?= $user['ID'] ?> </td>
                <td><?= $user['NOMBRE'] ?></td>
                <td><?= $user['APELLIDO'] ?></td>
                <td><?= $user['EMAIL'] ?></td>
                <td><?= $user['FECHA_SPA'] ?></td>
                <td><?= $user['ESTADO'] ?></td>
                <td><?= $user['NIVEL'] ?></td>
                <td><?= $user['NACIONALIDAD'] ?></td>
                <td><?= $user['GENERO'] ?></td>
                <td>
                    <a href="index.php?categoria=usuarios&accion=editar&id=<?= $user['ID'] ?>" class="edit">Editar</a>
                    <a href="acciones/usuarios/eliminar_user.php?id=<?= $user['ID'] ?>"" class=" delete">Eliminar</a>
                </td>
            </tr>
        <?php endwhile;
        mysqli_free_result($resultUsers); ?>
    </tbody>
</table>



<div class="paginador">
    <ul>
        <?php for ($i = 1; $i <= $cant_link_paginador; $i++) : ?>
            <?php $name_class = ($pagina_actual == $i) ? 'actual' : ''  ?>
            <li>
                <a class="<?= $name_class ?>" href="index.php?categoria=usuarios&p=<?= $i ?>&orden=<?= $num_orden ?> ">
                    Pag. <?= $i ?> </a>
            </li>
        <?php endfor; ?>
    </ul>
</div>