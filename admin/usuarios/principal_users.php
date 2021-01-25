<?php 

if (isset($_GET['accion'])) {
   include('formulario_editar.php');
}else {
    include('listado_usuarios.php');
}



?>