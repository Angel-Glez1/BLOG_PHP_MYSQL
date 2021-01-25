<?php 
// HACER UN BORRADO PURO 
if(isset($_GET['id'])){
    require_once '../../../setup/conexion.php';
    if(!validate_segurity()){
        die('No lo haya compa');
    }

    $id = $_GET['id'];
    $sql =  "DELETE FROM categorias WHERE ID = $id";
    $query = mysqli_query($conexion, $sql);
    $reultado = ($query == true) ? 1 : 0;
}

header("location: ../../index.php?categoria=categoria");
