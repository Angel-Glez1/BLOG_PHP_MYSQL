<?php 

// Guardar e comentario que haga hecho un usaurio
require_once '../setup/conexion.php';
    
    $comentario = escape($_POST['comentario']);
    $id = escape($_POST['id']);
    $user_id = escape($_SESSION['ID']);
    $estado = 1;
   
    $sql = "INSERT INTO comentarios(FKUSUARIO,FKPOSTEO,COMENTARIO,FECHA_ALTA,ESTADO) VALUES ( '$user_id', '$id', '$comentario', NOW() , '$estado');";
    

    $reusltado = mysqli_query($conexion, $sql);

    header("location: ../index.php?seccion=leer&id=$id ");



?>