<h3>Posteos Por categorias</h3>
<ul class="barras">
    <?php
    $c2 = "SELECT COUNT(ID) AS 'CANTIDAD', CATEGORIA 
       FROM  relacion AS r
       JOIN categorias AS c
       ON c.ID  =  r.FKCATEGORIA 
       GROUP BY CATEGORIA 
       ORDER BY CANTIDAD DESC";
    $r2 = mysqli_query($conexion, $c2);
    $resultados = [];
    $total = 0;
    while ($f2 = mysqli_fetch_assoc($r2)) :
        $resultados[] = $f2;
        $total += $f2['CANTIDAD'];
    endwhile;

    foreach ($resultados as $datos) :
        $porcentaje = round($datos['CANTIDAD'] * 100 / $total, 2);
        echo "<li><span style='width: $porcentaje%'  >$datos[CATEGORIA]($datos[CANTIDAD])</span> </li>";
    endforeach;
    ?>
</ul>