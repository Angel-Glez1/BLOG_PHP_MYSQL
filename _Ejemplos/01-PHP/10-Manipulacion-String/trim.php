<?php 

/**
 * -----------------------------------------------------------------------------
 *          Eliminar espacios de Un String Inecesario.
 * -----------------------------------------------------------------------------
 * 
 *  trim()  -> Me elimina los espacios que estan antes y despues de la cadena de texto
 *              pero no me elimina los espacio de enmedio.
 * 
 *  ltrim() -> Solo me elimina los espacios que esten al princio del strin solo al principio
 * 
 *  rtrim() -> Solo me elimna los espacios que esten al final de string
 * 
 */

$string = "Hola te    muchos    espacios            ";
var_dump($string);

$string = trim($string);
var_dump($string);





?>