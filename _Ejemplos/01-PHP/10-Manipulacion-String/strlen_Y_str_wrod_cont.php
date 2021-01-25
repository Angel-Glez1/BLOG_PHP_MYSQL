<?php 

/***
 * -------------------------------------------------------------------
 *          Saber la longitud de un String
 * -------------------------------------------------------------------
 * 
 *  strlen() -> Me saca la cantidad de CARACTERES  con todo y espacios
 *                  que hay en un string.
 * 
 * srt_word_count() -> Me cuenta la cantidad de PALABRAS en un strng.
 * 
 * 
 *  
 * 
 */

print "<h1>Saber Longitud y Num de Palabras que contide un string</h1>" ;

// Funcion str_word_count().
$string = "Soy una cadena de texto y tengo 8 palabras";
echo "El string: <b>$string</b>.  tiene una cantidad de palabras de: ". str_word_count($string);

echo '<hr>';

// Funcion strlen();
$string = "Soy una cadena de texto y tengo 8 palabras";
echo "El string: <b>$string</b>.  tiene un total de caracteres de : ". strlen($string);

echo '<hr>';


?>