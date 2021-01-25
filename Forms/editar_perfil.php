<?php
require_once '../setup/conexion.php';

$id = $_SESSION['ID'];
$nombre = escape($_POST['nombre']);
$apellido = escape($_POST['apellido']);
$emial = escape($_POST['email'] );
$genero = escape($_POST['genero']);
$pais = escape($_POST['pais']);
$clave = escape($_POST['clave']);
$str_foto = '';

// Si se da click en eliminar foto forzamos su valor a null.
if(isset($_POST['foto_eliminar'])){

    $str_foto = "AVATAR = NULL,";
}



// si el usuario no cambio su contraseña no actualizamos
$str_clave = !empty($_POST['clave']) ? "CLAVE = SHA1('$clave')," : '';

// Si se subio foto de perfil la actualizamos.
if( $_FILES['foto']['size'] > 0  ){

    // Nombre de mi archivo
    $str_foto = $id .'_'. time() . '.jpg';
    $tipo = $_FILES['foto']['type'];

    // Ver que tenga la extension .jpeg ó png .
    if(preg_match("/(jpe?g|png)/i", $tipo ,$maches)): 

        // Abro la foto al formato que les correspone
        $original = $maches[1] == 'png' 
        ? imagecreatefrompng( $_FILES['foto']['tmp_name'])
        : imagecreatefromjpeg($_FILES['foto']['tmp_name']);
    
        // Sacamos el ancho y el alto de la imagen original
        $ancho_org = imagesx($original);
        $alto_org = imagesy($original);

        // Tamaño de la foto miniatura
        $ancho_min = 100;
        $alto_min = ($ancho_min * $alto_org) / $ancho_org;

        // Tamaño de la foto grande
        $ancho_big = 280;
        $alto_big = ($ancho_big * $alto_org) / $ancho_org;
        
        
        // Crear los lienzo para los dos tamaños de foto
        $foto_m = imagecreatetruecolor($ancho_min,  $alto_min);
        $foto_g = imagecreatetruecolor($ancho_big , $alto_big);


        // Superponer los datos
        imagecopyresampled($foto_m, $original,0,0,0,0,$ancho_min,$alto_min,$ancho_org,$alto_org);
        imagecopyresampled($foto_g, $original,0,0,0,0,$ancho_big,$alto_big,$ancho_org,$alto_org);


        // Exportar ambos archivos
        imagejpeg($foto_m,"../uploads/avatar-thumbs/$str_foto");
        imagejpeg($foto_g, "../uploads/avatar-large/$str_foto");

        // Eliminar los recursos de la memoria
        imagedestroy($foto_m);
        imagedestroy($foto_g);
        imagedestroy($original);

        //Definir para la consulta sql como se comporta  
        $str_foto = "AVATAR = '$str_foto', ";

    endif;



}


$c = <<<SQL
    UPDATE 
        usuarios
    SET 
        NOMBRE = NULLIF('$nombre', ''),
        APELLIDO = NULLIF('$apellido', ''),
        EMAIL = '$emial',
        $str_clave
        $str_foto
        FKGENERO = NULLIF('$genero' , 0), 
        FKPAIS = '$pais'
    WHERE
        ID = '$id' 
    LIMIT 1;   
SQL;
mysqli_query($conexion, $c);



// Actualizar la varible de SESSION trayecdo los datos actualizados.
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
            WHERE ID = '$id'
            LIMIT 1";
$query = mysqli_query($conexion, $sql);
$fetch = mysqli_fetch_assoc($query);
$_SESSION = $fetch;

header("Location: ../index.php?seccion=perfil"); 

?>