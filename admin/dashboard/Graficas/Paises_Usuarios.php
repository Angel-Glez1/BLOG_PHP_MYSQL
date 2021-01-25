<h3>Paises con mas usurios</h3>
<?php

$urlApiGoogleChartPais  = "https://chart.apis.google.com/chart";
$urlApiGoogleChartPais .= "?chs=700x200";
$urlApiGoogleChartPais .= "&cht=map";
$urlApiGoogleChartPais .= "&chld=MX|AR|UY|BR";
$urlApiGoogleChartPais .= "&chdl=Mexico(100)|Argentina(99)|Uruguay(80)|Brasil(90)";
$urlApiGoogleChartPais .= "&chco=9b9b9b|e60000|7aabe7|8bbd6a|f39c12";



?>
<img src="<?= $urlApiGoogleChartPais ?>" >