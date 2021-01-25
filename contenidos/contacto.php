<?php $categorias = ['Backend', 'Front-end', 'Mobile', 'Javascript']; ?>
<h1>Contáctanos</h1>
<p class="info">Para hacernos llegar tus mensajes, completa el siguiente formulario</p>
<form action="Forms/fcontact.php" method="POST">
	<!-- Nombre -->
	<div><span>Tu nombre </span><input type="text" name="name" /></div>
	<!-- Email -->
	<div><span>Tu Email </span><input type="email" name="email"></div>
	<!-- Select -->
	<div><span>Motivo </span><select name="motivo">
			<option value="Mensaje">Mensaje</option>
			<option value="Reclamo">Reclamo</option>
			<option value="Información">Información</option>
		</select></div>

	<!-- Checkbox -->
	<div><span>Recibir novedades </span>
		<div class="option_group inline">
			<?php for ($i = 0; $i < sizeof($categorias); $i++) : ?>
				<label>
					<input type="checkbox" name="categorias[]" value="<?= $categorias[$i] ?>" />
					<?= $categorias[$i] ?> </label>
			<?php endfor; ?>
		</div>
	</div>
	<div><span>Mensaje </span><textarea name="desc" rows="6" cols="70"></textarea></div>
	<div><input class="aligned" type="submit" value="Enviar" /></div>
</form>