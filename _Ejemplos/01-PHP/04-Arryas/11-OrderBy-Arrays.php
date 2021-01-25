<?php 
/**
 * ------------------------------------------------------
 *                      Ordenar Arrays 
 * ------------------------------------------------------
 *   sort() -> Ordena de menor a mayor en case de numeros oseá (0-Num.Max).
 *          -> Y en caso de ser letras las orderna de la (a-z).
 *          -> OJO sort() solo sirve para arrays INDEXADOS.
 * 
 * 
 *   rsort() -> Hace todo lo contrario orderna del mayor al menor en numeros.
 *           -> Y ordena de la z-a en letras (strings). 
 * 
 * 
 *   ksort() -> orderna arrays asociativos por el indixe del a-z
 * 
 *   krsort() -> lo opuesto de ksort().
 */


$numeros = [9,4,0,10,2,34,5];

// Del menor al mayor
sort($numeros);
print_r($numeros);

// Del mayor al menor
rsort($numeros);
print_r($numeros);

$letras = ['z', 'a', 's', 'a', 'f', 'j', 'k', 'p',];

// De la a-z
sort($letras);
print_r($letras);

// De la z-a
rsort($letras);
print_r($letras);



$paises = ['in' => 'inglaterra', 'po' => 'polonia' ,'a' => 'america'];
ksort($paises);
print_r($paises);
// Al revez
krsort($paises);
print_r($paises);



?>