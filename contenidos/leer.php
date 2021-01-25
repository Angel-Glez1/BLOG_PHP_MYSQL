<?php
if (isset($_GET['id'])) {
	$id = escape( $_GET['id']);

	// Obtener un posteo por su ID
	$getPostunique = "SELECT * FROM posteos WHERE id =" . $id;
	$rpostuniqe = mysqli_query($conexion, $getPostunique);
	$post = mysqli_fetch_assoc($rpostuniqe);

	// Obtener los comentarios relacionados a ese posteo.
	$getComments = "SELECT * FROM comentarios AS c
	 				JOIN listado_usuarios AS u ON c .FKUSUARIO = u .ID 
					WHERE FKPOSTEO = '$id'
					ORDER BY c .FECHA_ALTA DESC ;";
	$rGetComments = mysqli_query($conexion, $getComments);

	// debug($post);

	// Transformar en un array los permisos que tiene para depues bucarlos
	$preferencias = explode(',', $post['PREFERENCIAS']);
	


}
?>

<?php
// Validar si existe un indice el al array del fetch..
if ($post) :
?>

	<!-- Codigo -->
	<article>
		<h1><?= $post['TITULO'] ?></h1>
		<img src="uploads/posts-large/<?= $post['FOTO'] ?>" alt="Imagen del Post" />
		<p><?= nl2br($post['TEXTO']) ?></p>

		<?php  
		// Ver si exite la opcion para descargar
		if (in_array('descargar', $preferencias)) {
			echo "<a href='Forms/descargar_word.php?id=$id'>Descargar Posteo en word</a>";
		}
		
		?>
	</article>

	<!-- Comentarios -->
	<section id="comments">
		<h2>Comentarios</h2>
		<ul class="row">
			<?php while ($comments = mysqli_fetch_assoc($rGetComments)) : ?>
				<li>
					<div>
						<h3><?= $comments['NOMBRE_USUARIO'] ?></h3>
						<small><?= $comments['FECHA_ESPANIOL']  ?></small>
					</div>
					<img src="uploads/avatar-thumbs/<?= $comments['AVATAR'] ?>" alt="Usuario" />
					<p> <?= nl2br($comments['COMENTARIO']) ?> </p>
				</li>
			<?php endwhile; ?>
		</ul>
		<!-- Formulario para hacer un comentario -->

		<h2>Deja tu comentario</h3>
		
		<?php if(!in_array('comentar', $preferencias)):  ?>

			<p class='error'>El Usuario Deshabilitó los comentarios...</p>

		<?php else: ?>

			<?php if (isset($_SESSION['NIVEL'])) { ?>
				<form action="Forms/comentar.php" method="POST">
					<input type="hidden" name="id" value="<?= $id ?>">
					<textarea name="comentario" rows="6" cols="70"></textarea>
					<input type="submit" value="Comentar" />
				</form>
			<?php } else { ?>
				<p class="error">Tienes que estas logueado para poder deja un comentario</p>
			<?php } ?>

		<?php endif; // Fin del if de prferencias ?>	
	</section>

<?php else :  // Si no exite un indice el al array del fetch mostramos este avisp 
?>
	<p class="error">La publicacion solicitada no exite</p>
<?php endif; ?>