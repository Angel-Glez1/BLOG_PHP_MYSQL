<?php 
// a ESTO SE LE LLAMA borrado puro 
if(isset($_GET['id'])){
    require_once '../../../setup/conexion.php';
    
    $id = $_GET['id'];
    $sql =  "DELETE FROM posteos WHERE ID = $id";
    $query = mysqli_query($conexion, $sql);
    $reultado = ($query == true) ? 1 : 0;
}



// header("location: $_SERVER[REQUEST_URI]&r=$reultado");
header("location: ../../index.php?categoria=textos");

?>