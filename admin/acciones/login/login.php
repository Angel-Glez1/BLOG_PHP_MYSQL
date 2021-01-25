<?php

require_once '../../../setup/conexion.php';
$usuario = $_POST['email'];
$clave = $_POST['clave'];
$login_success = false;

// Sentencia con sha1
$sql = "SELECT 
            -- Campos que vamos guardar en la sencion
            ID,
            NOMBRE_USUARIO,
            NOMBRE,
            EMIAL,
            APELLIDO,
            AVATAR,
            NIVEL
            FROM listado_usuarios -- Esta tabla es una vista
            WHERE EMAIL = '$usuario' AND CLAVE = SHA1('$clave') 
            LIMIT 1";
$query = mysqli_query($conexion,$sql);
$fetch = mysqli_fetch_assoc($query);

// Recurda cuando usamos el fetc si nos trae algo de la base de datos nos da true y si no false
if($fetch){
    $login_success = true;
    $_SESSION = $fetch;
}else{

    $_SESSION['error'] = "Usuario o password Incorrectos";
}

if($login_success){
    header("location: ../../index.php?categoria=textos");
}else{
    header("location: ../../index.php");
}

?>



