<?php
require_once '../setup/conexion.php';

$email = escape($_POST['email']);

$c = "SELECT EMAIL FROM usuarios WHERE EMAIL = '$email' limit 1";
$r = mysqli_query($conexion, $c);
$a = mysqli_fetch_assoc($r);

if(  !$a ){

    echo 'ok'; // NO exite el usurio
}else{

    echo 'not'; // exite el usurio.

}


