<?php
// Incluir la conexion a la DDBB.
require_once '../setup/conexion.php';

// Resivir el valor de GET para mostras el contenido correspondiente.
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'dashboard';

// Mostar nombre de categorias poir defecto
if(!isset($_SESSION['NIVEL'])) { $categoria = 'login';}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recursos/estilos.css">
    <title>Panel de control</title>
    <script src="recursos/Js/main.js"></script>

</head>

<body>
    <header>
        <h1>Panel de control</h1>
        <?php if(isset($_SESSION['NIVEL']) && $_SESSION['NIVEL'] == 'administrador'  ):  // Bloquear el nav si no estoy logeado  ?>
        <nav>
            <ul id="menu">
                <li><a href="index.php"> Dashboard </a></li>
                <li><a href="index.php?categoria=categoria">Categorias </a></li>
                <li><a href="index.php?categoria=textos"> Textos </a></li>
                <li><a href="index.php?categoria=usuarios"> Usuarios </a></li>
                <li><a href="acciones/login/cerrarsession.php">
                Salir(<?= ($_SESSION['NOMBRE']) ?? 'Iniciar session' ?>)
                </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </header>
    <main>
        <h2><?= $categoria ?></h2>
        <?php

        // Bloquear URL si no estamos logueados.
        if(isset($_SESSION['NIVEL']) ):
            if($_SESSION['NIVEL'] == 'administrador'):
        switch ($categoria) {
            case 'categoria':
                include('categorias/principal_category.php');
                break;
            case 'textos':
                include('textos/principal_textos.php');
                break;
            case 'usuarios':
                include('usuarios/principal_users.php');
                break;
            default:
                include('dashboard/principal_dashboard.php');
                break;

        }
    else:
        echo "<p  class='error'>No tiene los permisos necesarios para estar en esta seccion</p>";
    endif;
        else :
             include ('login/principal.php');
        endif;
        ?>
    </main>

</body>

</html>