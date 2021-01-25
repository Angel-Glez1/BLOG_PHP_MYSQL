<?php

// Obtenemos el id del usurio.
$id = $_SESSION['ID'];

// Info de paises
$cPais = "SELECT * FROM paises";
$fPais = mysqli_query($conexion, $cPais);

// Info de genero
$cG = "SELECT * FROM generos";
$fG = mysqli_query($conexion, $cG);

// Obtener la info del usuario.
$infoUser = "SELECT *,
				-- Si el usuario no tiene un avatar definido le asignamos uno por defecto dependido su genero
				IFNULL(AVATAR , 
				 IF( FKGENERO = 1 ,'000_masculino.jpg',
				  IF(FKGENERO = 2 , '000_femenino.jpg' , '000_default.jpg' ) ) 
				) AS 'AVATAR'
				 FROM usuarios WHERE ID = '$id' LIMIT 1";
$filasUser = mysqli_query($conexion, $infoUser);
$aU = mysqli_fetch_assoc($filasUser);

?>


<h1>Modificar tus datos</h1>
<form action="Forms/editar_perfil.php" method="POST" enctype="multipart/form-data" id="datos">
	<div>
		<!-- Datos Generales -->
		<div>
			<span>Tu Nombre </span><input type="text" name="nombre" value="<?= $aU['NOMBRE'] ?>" />
		</div>
		<div>
			<span>Tu Apellido </span><input type="text" name="apellido" value="<?= $aU['APELLIDO'] ?>" />
		</div>
		<div>
			<span>Tu Email </span><input type="email" name="email" value="<?= $aU['EMAIL'] ?> " />
		</div>

		<!-- Fotodo de perfil -->
		<div class="profile">
			<span>Tu Avatar actual</span>
			<div><img src="uploads/avatar-thumbs/<?= $aU['AVATAR'] ?>"  alt="Avatar actual" /></div>
			<div class="image_actions">
				<input type="file" id="new_image" name="foto" />
				<label for="new_image">Usar imagen nueva</label>

				<input type="checkbox" id="del_image" name="foto_eliminar" />
				<label for="del_image">Eliminar actual</label>
			</div>
		</div>

		<!-- Datos generales -->
		<div>
			<span>Tu Género </span>
			<div class="option_group">
				<?php
				while ($g = mysqli_fetch_assoc($fG)) :
					$check = ($aU['FKGENERO'] == $g['IDGENERO']) ? 'checked' : '';
					echo "<label><input $check type='radio' name='genero'  value='$g[IDGENERO]'  />" . ucfirst($g['GENERO']) . "</label>";
				endwhile;
				?>

				<label><input <?php if (empty($aU['FKGENERO'])) echo 'checked'; ?> type="radio" name="genero" value="0" /> No especificar</label>
			</div>
		</div>
		<div>
			<span>Tu Nacionalidad </span><select name="pais">
				<?php
				while ($pais = mysqli_fetch_assoc($fPais)) :
					$selected = $aU['FKPAIS'] == $pais['ID'] ? 'selected' : '';
					echo "<option $selected value='$pais[ID]' >$pais[PAIS]</option>";
				endwhile;
				?>
			</select>
		</div>
		<div><span>Tu Clave </span><input type="password" name="clave"  /></div>
	</div>
	<div><input class="aligned" type="submit" value="Guardar cambios" /></div>
</form>