<?php 
require_once '../setup/conexion.php';
/* Primero... Vemos si exite el usuario relacionado al correo que nos llego por post
 * Si no exite el usario en la base de datos lo redireccionamos al formulario de recuparar
 * contraseña con un mensaje de error guadardo en una varible. */
$email = escape($_POST['email']);
$sql = "SELECT  ID, IFNULL(NOMBRE, 'usuario') AS 'nombre' FROM usuarios WHERE EMAIL = '$email' LIMIT 1";
$query = mysqli_query($conexion, $sql);
$fetch = mysqli_fetch_assoc($query);
if(!$fetch){
    $_SESSION['error'] = "No exite el usuario valida que tu email sea correcto";
    header("Location: ../index.php?seccion=recuperar");
    die();
}

/*---------------------------------------------------------------
|   Proceso de recuperacion de contraseña
|------------------------------------------------------------- */
//  Generamos token con el ID del usuario fecha altual y un numero aleatorio del 4 dijitos
$token = md5($fetch['ID'].time(). rand(1000,9999));

// le generamos una nueva contraseña al usiario 
$contrasena_nueva = rand(10000000, 99999999);


/** Vamos a insertar en la tabla de recuperar los datos para que despue los pueda confirmar y asu ve vamos a decir que si se repite el registro solo actualize la contraseña nueva y el token */
$sql2 = "INSERT INTO recuperar(EMAIL,CLAVE_NUEVA, TOKEN,FECHA_ALTA) VALUES ('$email','$contrasena_nueva','$token', NOW()) ON DUPLICATE KEY UPDATE TOKEN = '$token' , CLAVE_NUEVA = '$contrasena_nueva'";
mysqli_query($conexion,$sql2);
mysqli_error($conexion);


// este es el link que le va a llegar a su correo para que confrime su proceso
$link = "http://localhost/Blog-php/Forms/confirm_password.php?e=$email&t=$token";

// Mensaje que se mostraria en el emial
$mensaje = <<<HTML
<p>Hola $fetch[nombre] </p>
<p>Haz solicitado recuperar tu contraseñ a, el sistema te genero una nueva: 
<code style='background:lightyellow; color:darkred; padding: 1px 2px;'>
$contrasena_nueva
</code></p>
<p>Es importante qe para que puedas ingresar al sistema otra vez confirmes entrando al sigiente link: <a href='$link' target='_black'  >Recuperar contraseña</a> o bien copiando esta URL: <code style="rgba(0,0,255,.5)">$link</code>  en tu buscador de preferencia
</p>
HTML;

echo $mensaje;

/**
 * ----------------------------------------
 * Mandar correos con PHP
 * -------------------------------------
 * Para mandar correos con php 
 * Usamos la funcion mail() que resive 4 parametros
 * 1 => Quien manda el correo
 * 2 => Quien resive el correo
 * 3 => En mensaje a mandar 
 * 4 => Todos los encabezados de configuracion para que el mensaje se muestre correctamente. */

// Encabezados

// Version
$headers = "MINE-Version: 1.0 ". "\r\n";
// Soporte de etiquetas HTML 
$headers .= "Content-type: text/html;  charset = UTF-8" . "\r\n";

// Quen lo manda
$headers .= "From: angel.edotensei@gmail.com" . "\r\n";

// El que lo resive 
$headers .= "To: usuario_de_la_plataforma@gmail.com " . "\r\n";

// mail('angel.edotensie@gmail.com', 'usuario@gmail.com', $mensaje , $headers);

?>