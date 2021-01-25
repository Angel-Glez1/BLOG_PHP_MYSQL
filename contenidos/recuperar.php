<?php
if(isset($_SESSION['error'])){

	$class = "error";
	$menseje = $_SESSION['error'];

}elseif(isset($_SESSION['rta'])){

	$class = 'ok';
	$menseje = $_SESSION['rta'];

}else{
	$class = "info";
	$menseje = "Ingresa tu correo y te haremos recuperar la clave de acceso al blog";
}
unset($_SESSION['error']);



?>
<h1>Registrate</h1>
<p class="<?= $class ?>"><?= $menseje ?></p>
<form action="Forms/recupar_clave.php" method="POST"   >
	<div><span>Tu Email </span><input name="email" type="email" ></div>
	<div><input class="aligned" type="submit" value="Recuperar" /></div>
</form>
