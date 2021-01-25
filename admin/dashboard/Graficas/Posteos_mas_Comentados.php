<?php
$c3 = "SELECT COUNT(p.ID) AS 'TOTAL', TITULO FROM posteos AS p JOIN comentarios AS c ON c.FKPOSTEO = p.ID GROUP BY TITULO ORDER BY TOTAL DESC LIMIT 3";
$r3 = mysqli_query($conexion, $c3);
$arrayValues = [];
$arrayLabel = [];
// Guadar en array aparte el Titulo y el otro el Numero de comentarios que tiene.
while ($f3 = mysqli_fetch_assoc($r3)) {
    $arrayValues[] = $f3['TITULO'];
    $arrayLabel[] = $f3['TOTAL'];
}
// Trasformar esos array en String para poder mardar se los a la api de google
$strValores = implode('|', $arrayValues);
$strLabel = implode(',', $arrayLabel);

/* Creamos una url mas amigable mejor dicho mas entedible
https://chart.apis.google.com/chart
        ?chs=600x300                    <- Tamaño de la Grafica
        &chd=t:50,30,20                 <- Los procentajes de la grafica
        &chl=PHP|Javascript|NodeJs      <- Los valores de la grafica
        &chco=ff0000,00ff00,0000ff      <- Lo colores
        &cht=p3                         <-  Tipo de grafica   */

$urlApiGoogleChartPosteos  = "https://chart.apis.google.com/chart";
$urlApiGoogleChartPosteos .= "?chs=700x100";
$urlApiGoogleChartPosteos .= "&chd=t:$strLabel";
$urlApiGoogleChartPosteos .= "&chl=$strValores";
$urlApiGoogleChartPosteos .= "&chco=ff0000,00ff00,0000ff";
$urlApiGoogleChartPosteos .= "&cht=p3";

?>
<h3>Textos mas comentados (3) </h3>
<img src="<?= $urlApiGoogleChartPosteos ?>">