<?php
// HACER UN BORRADO PURO 
if (isset($_POST)) {
    require_once '../../../setup/conexion.php';
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $autor = $_POST['FKAUTOR'];
    $categoria = $_POST['categoria'];
    $aciones = null;

    // Insetar opciones multiples  cuando usamos un columna se tipo SET
    if(isset($_POST['accion'])){
        // Trasformo mi array en string
        $aciones = implode(',', $_POST['accion']);
        
    }

    //La imagen la vamos a procesar con la libreria GD
    $archivo_type = $_FILES['foto']['type'];
    $img_post = time() . '.jpg';

    if( preg_match("/(png|jpe?g)$/i", $archivo_type )){  // Validar que sea jpeg o jpg
        
        $isJPEG = preg_match("/jpe?g$/i", $archivo_type );
        $original = $isJPEG ? imagecreatefromjpeg($_FILES['foto']['tmp_name']) : imagecreatefrompng($_FILES['foto']['tmp_name']);

        // Obtener el alto y el alcho del original
        $ancho_org = imagesx($original);
        $alto_org = imagesy($original);

        // Vamos a crear dos copias una para mostrar el la web y otra como miniatura y 
        // primero sacamos el alcho y alto de cada 
        // copia
        $ancho_large = 1024;
        $ancho_thumb = 300;
        $alto_large = round( $ancho_large * $alto_org /  $ancho_org );
        $alto_thumb = round($ancho_thumb * $alto_org /  $ancho_org  );

        // Esta funcion nos sirve para sacar las copias me las muestres bonito
        $large = imagecreatetruecolor($ancho_large ,$alto_large);
        $thumb = imagecreatetruecolor($ancho_thumb,$alto_thumb);

        // Que no me genere border negros
        imagesavealpha($large, true);
        imagealphablending($large, false);

        
        imagesavealpha($thumb, true);
        imagealphablending($thumb, false);

        // Crear las copias
        imagecopyresampled($large, $original, 0,0,0,0,$ancho_large,$alto_large,$ancho_org,$alto_org);
        imagecopyresampled($thumb, $original, 0,0,0,0,$ancho_thumb,$alto_thumb,$ancho_org,$alto_org);

        // Exporto mis copiar al servidor.
        imagejpeg($large, "../../../uploads/posts-large/$img_post", 100);
        imagejpeg($thumb, "../../../uploads/posts-thumbs/$img_post", 100);

    }


    
    // Insertar en la tabla de posteo
    $sql =  "INSERT INTO posteos(TITULO,TEXTO, FOTO, FECHA_ALTA,ESTADO,FKAUTOR,PREFERENCIAS) VALUES('$titulo', '$texto', '$img_post',  NOW() , 1 , '$autor', '$aciones')";
    $query = mysqli_query($conexion, $sql);
    $ultimo_id = mysqli_insert_id($conexion);

    
    // Insertar multiples registros ala vez en la vase de datos
    if(isset($_POST['categoria'])){

        foreach($_POST['categoria'] as $cat_id){
        // Insertat en la tabla de relacion
            $sql2 = "INSERT INTO relacion (FKPOSTEO, FKCATEGORIA) VALUES ( '$ultimo_id', '$cat_id')";
            $q = mysqli_query($conexion, $sql2);
        }

    }

    
}

echo mysqli_error($conexion);

header("location: ../../index.php?categoria=textos#t_$ultimo_id");