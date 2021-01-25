<?php

/** La siguiente conculta sql lo que va hacer es
 *  crear un tabla "falsa" donde vamos a FORMATIAR
 *  la informacion que estamos solicitando 
 *  para ya no tengamos que hacer lo que hicimos anteriormente con la 
 *  grafica de los POSTEOS MAS COMENTADOS  */
$c4 = <<<SQL
SELECT 
    -- Usamo el GROUP_CONCAT para que me traiga en una sola fila los resulados
	GROUP_CONCAT(TOTAL) AS 'VALORES', 
    GROUP_CONCAT(NOMBRE_USUARIO SEPARATOR '|')  AS 'NOMBRE_USUARIO'
    FROM(
          SELECT  COUNT(u.ID) AS TOTAL, NOMBRE_USUARIO 
              FROM comentarios AS c
              JOIN listado_usuarios AS u
              ON u.ID = c.FKUSUARIO
              GROUP BY  u.ID
              ORDER BY TOTAL DESC LIMIT 3
) AS tabla;
SQL;
$f4 = mysqli_query($conexion, $c4);
$a4 = mysqli_fetch_assoc($f4);

$urlApiGoogleChartUsuarios  = "https://chart.apis.google.com/chart";
$urlApiGoogleChartUsuarios .= "?chs=700x100";
$urlApiGoogleChartUsuarios .= "&chd=t:$a4[VALORES]";
$urlApiGoogleChartUsuarios .= "&chl=$a4[NOMBRE_USUARIO]";
$urlApiGoogleChartUsuarios .= "&chco=ff0000,00ff00,0000ff";
$urlApiGoogleChartUsuarios .= "&cht=p3";
?>
<h3>Usuarios con mas comentarios</h3>
<img src="<?= $urlApiGoogleChartUsuarios ?>">