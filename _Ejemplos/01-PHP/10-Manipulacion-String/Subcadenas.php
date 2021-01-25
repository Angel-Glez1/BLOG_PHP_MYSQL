<?php  
echo "<h1>Hacer Subcadenas</h1>";

$cadena_larga = "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore dignissimos sapiente aut voluptate nihil dolores quisquam alias ut quibusdam eos. Sapiente laboriosam enim perferendis distinctio cumque illo fugit provident minima. Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, molestiae facere accusamus maiores libero inventore asperiores laudantium corrupti autem totam quas deserunt! Ea debitis provident hic sint. Fuga, optio a. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor totam natus error obcaecati enim perspiciatis asperiores, dolore vel praesentium odit pariatur neque. Dolore voluptatum eos rem voluptas optio similique expedita  U</p>";


echo $cadena_larga;

echo "<br><h3>Vamos a tomar un fracmento del Parrofo anterior de con la funcion strsub()</h3>";

/*
|   El substr -> Pide ter parametros el 
|                1)-La cadena que va a recortar
|                2)-Desde que caracter va empezar
|                3)-El numero de caracteres que va a tomar   
|
|   Los ultmimos dos parametros tambien puede ser negativo
|
*/ 
$cadena_corta = substr(
                    $cadena_larga, /* Cadena que vamos a buscar */
                    0, /** La posicion desde donde vamos a empezar a tomar caractere */
                    100 /* Numero de caracteres que vamos tomar*/
                    );

echo $cadena_corta. "<a href=''> Leer Mas</a>";

/*
|
| Crear subcanenas de texto con valores negativos
| Al usar valores negativos es que si le decimos que inicie en 10 y tome -10,
|  tiene un comportamineto diferencte ya que va a eliminar los carcateres que especificamos y solo  |   me va a mostar lo demas que sobra
|
*/ 
echo "<h3>Ultimo valor de la cadena</h3>";

echo $texto = "Hola amigos mios" . '<br>';

$result = substr($texto, 0, 5);
echo $result;

echo "<hr>";
/*
    Si estamos trabajando con cadenas de texto que tengan codigo HTML y haces un substrg.
    Y al momento de generar la sub cadena rompemos una etiqueta html y nos rompe la estructura de nuestro web tenemos que usar la funcion tidy_paser_string(), el array de configuracion,
    ['show_body_only' => true] ya que si no podemos ese array de configuaracion lo que va hacer por si sola la funcion tidy_parse_string,  es generar una nueva estructura HTML, esta funcion se hace despues de el subtring

*/ 

$cdn_con_HTML= "<b>Hola mundo</b>";
$new_cdn = substr($cdn_con_HTML, 0, 5);
$new_cdn = tidy_parse_string($new_cdn, array('show-body-only' => true));
echo $new_cdn;
echo $cadena_corta;
?>