<?php

$fotos = [
    ['foto1.jpg', 'Viaje A leon', 'Amo a mi famila'],
    ['foto2.jpg', 'Viaje A leon en Explora', 'Me encatan'],
    ['foto3.jpg', 'Viaje A leon cuando llegue', 'Me encanto león']

];

/**
 *      Otra forma de recorrer la matriz, es solo recorriendo los array que tenemos y nosotros
 *      manual mente le indicamos el elemnto que necesitamos.
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
        li{
            list-style: none;
         }
        h4{
            /* text-align: center; */
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        img{
            width: 30%;
           
        }


</style>

<body>
    <ul>
        <li>
            <?php for ($i = 0; $i < sizeof($fotos); $i++) : ?>
                <h4><?= $fotos[$i][1] ?></h4>
                <img src="../fotos/<?= $fotos[$i][0] ?>" alt="">
                <p><?= $fotos[$i][2]; ?></p>
            <?php endfor; ?>
        </li>
    </ul>
</body>

</html>