<?php

$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'blog';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
</head>

<body>
    <h1>Panel de control</h1>
    <nav>
        <li><a href="index.php?seccion=estaticos">Textos estaticos</a></li>
        <li><a href="index.php?seccion=blog">Textos del blog</a></li>
    </nav>
    <main>
        <?php
        // Controlador frontal 
        switch ($seccion) {
            case 'estaticos':
                include("recursos/estaticos.php");
                break;
            case 'blog':
                include("recursos/blog.php");
                break;
            default:
                # code...
                break;
        }
        ?>
    </main>


</body>

</html>