<?php 
require_once '../setup/conexion.php';
$usuario = escape($_POST['usuario']);
$clave = escape($_POST['clave']);
// Sentencia con sha1
$sql = "SELECT 
            -- Campos que vamos guardar en la sencion
            ID,
            NOMBRE_USUARIO,
            ESTADO,
            NOMBRE,
            EMAIL,
            APELLIDO,
            AVATAR,
            NIVEL
            FROM listado_usuarios -- Esta tabla es una vista
            WHERE EMAIL = '$usuario' AND CLAVE = SHA1('$clave')
            LIMIT 1";
$query = mysqli_query($conexion,$sql);
$fetch = mysqli_fetch_assoc($query);

$url_anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../index.php';
// Recurda cuando usamos el fetc si nos trae algo de la base de datos nos da true y si no false

// la credenciales no coinciden.
if(!$fetch){
    $_SESSION['login'] = 'error';
}else {
    // Ver si la cuenta del usaurio no esta baneana
    if($fetch['ESTADO'] == 'Inactivo'){
        $_SESSION['login'] = 'banneado';

    }else{
        $_SESSION = $fetch;
    }
    
}

header("location: $url_anterior");

?>