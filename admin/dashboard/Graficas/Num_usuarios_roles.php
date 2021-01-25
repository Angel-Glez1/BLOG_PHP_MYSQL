<!-- Mostrar solomente en texto pano los cantidad de usurios agrupados por su NIVEL -->
<h3>Num. Usuarios y sus Roles</h3>
<ul>
    <?php
    // Sabar la cantidad de usurios agrupados por su nivel
    $c1 = "SELECT NIVEL, COUNT(ID) AS 'TOTAL' FROM usuarios GROUP BY NIVEL ORDER BY TOTAL DESC ";
    $r1 = mysqli_query($conexion, $c1);
    while ($f1 = mysqli_fetch_assoc($r1)) :
        echo "<li>$f1[NIVEL] - $f1[TOTAL] </li>";
    endwhile;
    ?>
</ul>