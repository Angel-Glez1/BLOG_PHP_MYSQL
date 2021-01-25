<?php

// Dependiendo lo que me llege por GET muestro la vista correspondiente (FromEdit, Listado .etc)
$accion = isset($_GET['view']) ? $_GET['view'] : 'listado';

// Controlador frontal
switch ($accion) {
    case 'alta': require_once 'alta_category.php'; break;
    case 'listado': require_once 'listado_category.php'; break;
    case 'editar' : require_once 'formulario_update.php'; break;
}
?>

