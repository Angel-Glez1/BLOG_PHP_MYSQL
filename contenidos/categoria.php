<?php
// Si el exite el id de la categoria y el numero de paginas donde estoy para el paginador.
$id = $_GET['idc'] ?? 1;
$paginaActial = isset($_GET['p']) ? escape($_GET['p']) : 1;

// Algoritmos del paginador.
$num_post_x_pag = 9; // Numero de resultados que quiero mostrar
// Query para saber el TOTAL de numeros que tengo de registros en una categoria en especial.
$numPosts = "SELECT COUNT(ID) as 'TOTAL' FROM listado_Posteos JOIN relacion ON ID = FKPOSTEO WHERE FKCATEGORIA = $id";
$rNumPost = mysqli_query($conexion, $numPosts);
$cantNumPost = mysqli_fetch_assoc($rNumPost);
$cantResult = $cantNumPost['TOTAL'];
$cantPaginas = ceil($cantResult / $num_post_x_pag);


// Verificar si el numero de pagina solicitada es mayor a la que tenemos o es un numero negativo
if ($paginaActial > $cantResult  ){   $paginaActial = $cantPaginas; }
if( $paginaActial <= 0 ) {  $paginaActial = 1; }

$dondeInicio = ($paginaActial - 1) * $num_post_x_pag; // Me trae los siguientes resultados dependiendo la pagina en donde este.

// Query que me trae solo los posteos relacionados con un categiria en especial
$getCategory = "SELECT categorias.CATEGORIA AS 'nameCategory',
				posteos.*, 
				usuarios.NOMBRE AS 'NOMBREU'
				FROM relacion 
				INNER JOIN categorias ON categorias.ID = relacion.FKCATEGORIA 
				INNER JOIN posteos ON posteos.ID = relacion.FKPOSTEO 
				INNER JOIN usuarios ON usuarios.ID = posteos.FKAUTOR
				WHERE FKCATEGORIA = $id
				LIMIT $dondeInicio, $num_post_x_pag";
$rGetCategoria = mysqli_query($conexion, $getCategory); // Resultado


// Query para poder mostar el nombre de la categoria.
$getNameCategory = "SELECT * FROM categorias WHERE ID = $id";
$rGetNameCategory = mysqli_query($conexion, $getNameCategory); // Resultado.
$nameCategoria = mysqli_fetch_assoc($rGetNameCategory);

?>
<h1><?= $nameCategoria['CATEGORIA'] ?></h1>

<!-- Mostramos posteos -->
<section id="posts">
	<?php
	// Cuando no se encontro ningun resultado ala busqueda del usaurio haces otra sentencia donde traiga posteos aleatoriamente.
	if ($cantResult == 0 ) {
		echo "<p class='error' >No Hay resultado para lo que buscas, quizás les interese las siguientes publicaciones</p>";
		$getPosts = "SELECT * FROM listado_posteos ORDER BY RAND() DESC LIMIT 9";
		$rGetCategoria = mysqli_query($conexion, $getPosts);
		$resultado = "Sin respuesta";
	}
	?>



	<h2><?= $nameCategoria['CATEGORIA'] ?></h2>
	<ul>
		<?php while ($post = mysqli_fetch_assoc($rGetCategoria)) : ?>
			<li>
				<!-- Titulo -->
				<h3><?= $post['TITULO']  ?></h3>
				<!-- Foto del post -->
				<img src="uploads/posts-thumbs/<?= $post['FOTO'] ?>" alt="foto">
				<!-- Contenido del post -->
				<p><?= substr($post['TEXTO'], 0, 90) ?>... <a href="index.php?seccion=leer&id=<?= $post['ID'] ?>">LeerMas</a> </p>
				<small>Fecha de publicacion <?= $post['FECHA_ALTA']  ?> Autor: <?= $post['NOMBREU'] ?> </small>
			</li>
		<?php endwhile; ?>
	</ul>
</section>
<!-- Fin de los posteos -->
<?php if ($cantPaginas > 1) : ?>
	<div class="paginador">
		<ul>
			<?php for ($i = 1; $i <= $cantPaginas; $i++) : ?>
				<li>
					<a class="<?= ($paginaActial == $i) ? 'actual' : '' ?>" href="index.php?seccion=categoria&idc=<?= $id ?>&p=<?= $i ?>"> pág. <?= $i ?> </a>
				</li>
			<?php endfor; ?>
		</ul>
	<?php endif; ?>
	</div>