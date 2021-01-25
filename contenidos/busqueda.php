<?php
// Validar si el usuario hizo click en un link del paginador y sino mostrar le la pagina numero uno.
$pagina_actual =  isset($_GET['p']) ? escape($_GET['p']) : 1;
$cantidad = 9; //La cantidad de publicaciones que vamos a mostrar por pagina

// La varible filtroWhere sirve como pibote en la busqueda de alguna publicacion en especial.
$filtroWhere = '';

// Validar buscador podiendo un minimo de caracteres y eliminando espacios en blanco.
if (isset($_GET['buscar'])) {
    $item = $_GET['buscar'];
    $item = trim($item);
    if (strlen($item) <= 2) {
        echo "<p class='error'>La cantidad minima para buscar es de 3 caracteres</p>";
    } else {
        $resultado =  "Resultados para $item ";
        $filtroWhere = "WHERE TITULO LIKE '%$item%' OR TEXTO LIKE '%$item%'";
    }
}

/* SEGUNDA PARTE DEL PAGINADOR
Query para saber cuantos registros coinciden en la base de datos con la busqueda. Y tambien sirve para retornar un valor numerico que nos va a servir para que el ciclo for mueste los link correspondientes */
$cCant = "SELECT COUNT(ID) AS 'CANTIDAD' FROM listado_posteos $filtroWhere ";
$rCant = mysqli_query($conexion, $cCant);
$aCant = mysqli_fetch_assoc($rCant);
$cant_registros = $aCant['CANTIDAD'];

// Algoritmo para saber cuantos links me tiene que hacer...
$cant_paginas = ceil($cant_registros / $cantidad);

// Validar si la pagina solicitada por get es mayor ala cantidad que tenemos para mostrar le mostramos el ultimo
if($pagina_actual > $cant_registros ) $pagina_actual=  $cant_paginas; 


// Validar que la pagina solicitada por get no sea un numero negativo , y si lo es le mostramos los primeros valores de la pagina
if($pagina_actual <= 0 ) $pagina_actual = 1;



$inicio = ($pagina_actual - 1) * $cantidad;
// QUERY para mostrar los primeros 9 resultados de la busqueda
$getPosts = "SELECT * FROM posteos $filtroWhere ORDER BY FECHA_ALTA DESC LIMIT $inicio, $cantidad";
$rposts = mysqli_query($conexion, $getPosts);

?>
<h1>Homepage</h1>
<!-- Zona de POSTEOS -->
<section id="posts">
    <?php
    // Cuando no se encontro ningun resultado ala busqueda del usaurio haces otra sentencia donde traiga posteos aleatoriamente.
    if ($cant_registros == 0) {
        echo "<p class='error' >No Hay resultado para lo que buscas, quizás les interese las siguientes publicaciones</p>";
        $getPosts = "SELECT * FROM posteos ORDER BY RAND() DESC LIMIT 9";
        $rposts = mysqli_query($conexion, $getPosts);
        $resultado = "Sin respuesta";
    }
    ?>
    <h2><?= $resultado ?></h2>
    <ul style="background-color: lightyellow;">
    
        <?php while ($post = mysqli_fetch_assoc($rposts)) : ?>
            <li>
                <h3><?= $post['TITULO']  ?></h3>
                <img src="" alt="foto">
                <p><?= substr($post['TEXTO'], 0, 90) ?>...
                    <a href="index.php?seccion=leer&id=<?= $post['ID'] ?>">LeerMas</a>
                </p>
                <small>Fecha de publicacion <?= $post['FECHA_ALTA']  ?> </small>
            </li>
        <?php endwhile; ?>
    </ul>

    
    <?php  if($cant_paginas > 1):  // Solo mostramos el paginador si el numero de paginas a mostrar en mayor a 1 pag. ?>
    <div class="paginador">
        <ul>
        <!--                           3  -->
        <?php for ($i = 1; $i <= $cant_paginas; $i++) : ?>

            <li>
                <a class="<?= ($pagina_actual == $i ) ? 'actual' :'' ?>"  href="index.php?buscar=<?=$item?>&p=<?=$i?>">
                    pág. <?= $i ?>
                </a>
            </li>

        <?php endfor; ?>
        </ul>
    </div>
    <?php endif; ?>
</section>