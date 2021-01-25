<?php  

/* 
|-----------------------------------------------------------------------------------------------------------------
|               DELIMITAR PATRONES
|-----------------------------------------------------------------------------------------------------------------
|
|  De limitar patrones, basicamente nos sirve para que la busqueda de coincidencias se mas espesifica un ejemplo
|       Quiero que me busque solamente las palabras que tengan 5 letras mayusculas.
|
|   ^ => El gorrito nos va a indicar donde va empezar 
|   
|   [^0-9] => Si Le ponemos el gorrito adentron de los corchetes le estamos diciendo dicendo que no puede existir eso
|
|    $ => Donde va a terminar 
|
|   el patron seri = /^[A-Z]{5}$/
*/


$nombre = "4BCD4ASDASD ANGEL ASDASDA ASDAS ASDASD ANGEL";
$patron = "/^[A-Z]{5}$/";

$resultado = preg_match_all($patron, $nombre);
if($resultado){
    echo "El nombre $nombre cumple";
}else{
    echo "No se cumple";
}



?>