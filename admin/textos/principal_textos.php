<?php

$accion = isset($_GET['view']) ? $_GET['view'] : 'listado';

switch ($accion) {
    case 'alta':
        require_once 'alta_textos.php';
    break;
    case 'listado':
        require_once 'listado_textos.php';
    break;
    case 'editar':
        require_once 'formulario_edit.php';
    break;
}
