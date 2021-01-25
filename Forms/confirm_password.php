<?php 
// Ultimo proceso para el recuperamineto de contraseña

    require_once '../setup/conexion.php';
    $email = escape($_GET['e']);
    $token = escape($_GET['t']);

    $sql = "SELECT CLAVE_NUEVA FROM recuperar WHERE EMAIL = '$email' AND TOKEN= '$token' LIMIT 1;";
    $rquery = mysqli_query($conexion,$sql);
    $fetch = mysqli_fetch_assoc($rquery);   
    if(!$fetch){
        $_SESSION['error'] = "No se pudo completar tu proceso.";
        header("Location: ../index.php?seccion=recuperar");
        die();
    }

    // Actualizamos la nueva contraseña y borramos el registro de la tabla
    $nueva_clave = $fetch['CLAVE_NUEVA'];

    

    // Actualozar la nueva contrasela
    $c2 = "UPDATE usuarios SET CLAVE = sha1('$nueva_clave') WHERE EMAIL = '$email' LIMIT 1";
    mysqli_query($conexion,$c2);
 
 
    // elimiar el registro
    $c3 = "DELETE FROM recuperar WHERE EMAIL = '$email' LIMIT 1 ";
    mysqli_query($conexion,$c3);

    $_SESSION['rta'] = "Contraseña actualizada ya puede loguear";



header("location: ../index.php?seccion=recuperar");


?>