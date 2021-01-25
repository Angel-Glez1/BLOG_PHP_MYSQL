<?php 
/**
 * -----------------------------------------------
 *      Cookies
 * ----------------------------------------------
 *  
 *  Para crear un cookie se ocupa la funcion
 * setCookie(Resive 3 parametros)
 * 
 * Como sabes php maneja mucho los array asociativos
 * entonces las coockies tambien con array asociativos
 * 
 * 1 parametro => Nombre de la coockie
 * 2 parametro => El valor que almacena
 * 3 parametro => el tiempo que va a durar
 * 
 * 
 * Para ELIMINAR UNA cookie tambien ocupamos con que vamos a usar
 * otra vez en la funcion setCookie y el nombre dela coockie que 
 * queremos borrar y lo importante en la duracion una fecha que ya 
 * paso 
 * 
 */

$idiomas = ['español','ingles','frances'];

// Crear una cookie
setcookie('Idioma', $idiomas[0], 5*60);;

// Ver el valor de cookie
echo $_COOKIE['Idioma'];

// Eliminar una  cokkie
setcookie('Idioma', '', -1);




?>