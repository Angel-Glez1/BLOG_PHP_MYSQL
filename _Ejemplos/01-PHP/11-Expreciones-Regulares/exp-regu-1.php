<?php 

/*
|-------------------------------------------------------------------------------------
|       Expresiones Regulares
|-------------------------------------------------------------------------------------
|
|   Una exprexión regular sirve para buscar un cierto patron en una cadena de texto.
|   En PHP las forma para crear un expresion regular de ser de esta forma.
|   $patron = "/aqui-va-el-patron-que-deseas-buscar/i"
|   Para que php procese la espresion regular se ocupa la libreria.
|              
|   preg_match($patron, $string_avaluar, $arrayDeCoincidencias); -> Lo que retorna esta
|                funcion es un valor numerico siendo 0 que no se encontro nada y siendo
|                mayor 0 que si encontro algo . esta funcion caundo encuentra una
|                coincidencias ahi se detiene si queres que busque ,as de una se oucpa
|
|   preg_match_all('Los mismos parametros') -> Me trae todas las coincidencias
|
|    BANDERAS:
|   i  -> La i al final de la expresion regular significa que no distinga entre Minusculas & Mayusculas.
|   .  -> Reprecenta Cualquier caracter Numeros, Letras , Simbolos(. # " $ % & ect)
|   [] -> Me permire en Encapsular Los caractres que espero 
*/ 


$string = "Hola soy un estudiante de desarrollo Web por que me gusta el desarrallo Web xD";

$patron = "/web/i";

$array = array();

$result = preg_match_all($patron, $string, $array);
var_dump($result);

if($result > 0){

    echo "Se encontro $result cohicidencias";
    print_r($array);
}else{

    echo 'No hubieron cohicidencias';

}


// var_dump($result);

?>