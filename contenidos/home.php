<?php
$getPosts = "SELECT * FROM posteos ORDER BY FECHA_ALTA DESC LIMIT 6";
$rposts = mysqli_query($conexion, $getPosts);
?>
<h1>Homepage</h1>
<section id="posts">
	<h2>Últimos Posts</h2>
	<ul style="background-color: lightyellow;">
		<?php while ($post = mysqli_fetch_assoc($rposts)) : ?>
			<li>
				<h3><?= $post['TITULO']  ?></h3>
				<img src="uploads/posts-thumbs/<?= $post['FOTO'] ?>" alt="foto">
				<p><?= substr($post['TEXTO'], 0, 90) ?>...
					<a href="index.php?seccion=leer&id=<?= $post['ID'] ?>">LeerMas</a>
				</p>
				<small>Fecha de publicacion <?= $post['FECHA_ALTA']  ?> </small>
			</li>
		<?php endwhile; ?>
	</ul>

</section>


<!-- Zona de comentarios -->
<section id="comments">
	<h2>Últimos comentarios</h2>
	<?php
	$sql = "SELECT 
		c.COMENTARIO,
		u.NOMBRE_USUARIO,
		u.AVATAR,
		c.FKPOSTEO
		FROM 
		comentarios AS c 
		JOIN listado_usuarios AS u ON u.ID = c.FKUSUARIO
		ORDER BY
		c.FECHA_ALTA DESC LIMIT 3";

	$relComentarios = mysqli_query($conexion, $sql);

	echo mysqli_error($conexion);
	?>
	<ul>

		<?php while ($comentarios = mysqli_fetch_assoc($relComentarios)) : ?>
			<li>
				<h3><?= $comentarios['NOMBRE_USUARIO']  ?></h3>
				<img src="uploads/avatar-thumbs/<?=  $comentarios['AVATAR'] ?>" alt="Usuario" />
				<p>
				<?=  substr($comentarios['COMENTARIO'], 0 , 50 )  ?>...
				 <a href="index.php?seccion=leer&id=<?= $comentarios['FKPOSTEO'] ?> ">Leer completo</a>
				</p>
			</li>
		<?php endwhile; ?>
	</ul>
</section>