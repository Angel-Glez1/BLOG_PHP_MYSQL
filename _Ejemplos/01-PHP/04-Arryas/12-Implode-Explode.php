<?php 
/**
 * -----------------------------------------------------
 * |     Transformar de Arryas a un string
 * -----------------------------------------------------
 * |
 * |    implode() -> Transforma un array en un string pero
 * |                 se le tiene que indicar con que caracter 
 * |                 vamos a remplazar las comas del array.
 * |
 */


$url_Cusos = ['www.mipaginaweb.com', 'cursos'];
$url_amigables = implode('/', $url_Cusos);
echo "<a href= '.$url_amigables;.'> Cursos </a>";


/**
 * -----------------------------------------------------
 * |     Transformar de string a un array
 * -----------------------------------------------------
 * |
 * |    explode() -> Transforma un string en un arrays resive
 * |                 como primer argumento el delemitador que 
 * |                 va a buscar en el string para separar los
 * |                 elemtos del array.
 * |
 */

$user_premiun = "@angel01 @angel01 @angel01 @angel01 @angel01";
$pagos = explode(' ', $user_premiun);
var_dump($pagos);



/**
 * ------------------------------------------------------------
 *       Array_rand => saca un elemento aleatorio del array
 * ------------------------------------------------------------
 */

$ganadore = [1,2,3,4,5,6,3,23,5,65,4,756,4,34,4,7,568,7,654,3,2,2];
$ganador = array_rand($ganadore);
print_r($ganador);
?>