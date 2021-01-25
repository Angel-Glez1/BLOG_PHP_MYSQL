<?php  

/* 
|---------------------------------------------------------------------------------------------------------------------
|                                      Metacaracteres de CANTIDAD
|---------------------------------------------------------------------------------------------------------------------
|   Los Metacatacteres de cantidad van afectar alos que esta antes de lo que queremos afectar [0-4]cantidad   
|
|   +   => Debe aparecer al menos UNA vez y puede repetirse muchas veces 
|   *   => Puede aparecer una, infinita O ninguna vez
|   ?   => Puede o no exitir 
|   {3}  => cantidad exacta   
|   {2,5} => Cantidad minima Y maxima.
|   {2, } => Un minimo sin limite
|
|   .+?  => El signo de pregunta tambien sirve para indicarle que quiero Las MINIMAS COINCIDENCIAS o que sea en bloques
|
|----------------------------------------------------------------------------------------------------------------------
|                                               Ejemplos 
|----------------------------------------------------------------------------------------------------------------------
|
|   "/[0-9]+/" => Este patron lo que nos dice es que puede exitir mas de una vez hasta el infinito numeros del 0-9
|   
|   "/[a-z]*" => Este patron le estamos indicandando que van hacer todo el macht.
|
|   (jpg)?    => Aqui el simbolo de pregunta nos sirve para indicar que puede o no exitir la palabra jpg 
|
|   [0-5]{3}  => Este patron al solo ponerle un unico numero como delimitador le estamos indicando que solo pueden
|                 repetirse 3 veces un numero del 0-5 
|                  Ejm: 000 esto nos dria true por que estamos repitiendo 3 numeros del 0-3
|                       01  esto nos daria false por que solo estamos repitiendo dos veces un numero
|                       0022 Esto nos daria falso por que estamos ecediendo las cantidad de repetisiones
|
|   [A-Z]{2,10} => aqui le estamos diciendo que como minimo debe de aver 2 letras y como maximo 10 
|
|   [a-Z0-4]{2, } => Aqui le estamos indicando que como minimo debe de aver 2 letras o numeros pero de ahi para delante puede 
|                      repetirse infinita mente.
|
|   .*?          => Aqui el simbolo de pregunta nos sirve para indicar que queremos las minimas catidan machets posible
|
*/

// Ejemplo de buscar los machts por minimos
// VAMOS ABUSCAR TODOS LAS ETIQUETAS HTML QUE EXITAN EN UN STRING 
$string = "hola soy angel <b>Armando</b> y me gusta mucho la <i>programacion</i>";
$patron = "/ <.+?> /";

$resultado = preg_match_all($patron, $string, $arrCon);
if($resultado){

    var_dump( "$resultado\n");

    
    echo '<pre>';
    print_r($arrCon);
    echo '</pre>';
}
















?>