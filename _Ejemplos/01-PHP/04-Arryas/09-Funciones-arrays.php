<?php 

// Array_push -> Me permite agregar uno o mas elemnetos aun array normal o bien me permite agregar un nuevo array(fila)  a una matriz.

echo "<h1>Array de pruba</h1>";
$colores = ['rojo' , 'amarillo' , 'verde'];
echo "<pre>";
print_r($colores);
echo "</pre>";

// Agregar nuevos elementos a mi array pero al final no puedo capturar el evento en una varible
echo '<p>Array push</p>';
array_push($colores, 'Nuevo elemto', ['tambien puedo agregar un nuevo array']);
echo "<pre>";
print_r($colores);
echo "</pre>";

// Me agrega elementos al principio del array.
array_unshift($colores, 'En primera posicion'); 
echo "<p>array_unshift('Me agrega un nuevo elemento pero al inicio de mi array')</p>";
echo "<pre>";
print_r($colores);
echo "</pre>";


// Elminar el ultimo el elemto del array y puedo guardar eso en una varible.
array_pop($colores);
echo "<p>Array_Pop -> Me elimina el ultimo INDECE de mi array  </p>";
echo "<pre>";
print_r($colores);
echo "</pre>";

// Elimonar el primer Indice de una array.
$valor = array_shift($colores);
echo "<p> array_shift -> Me elima el el ultimo indicie de mi array. </p>";
echo "<p> Valor del indice que eliminamos $valor </p>";
echo "<pre>";
print_r($colores);
echo "</pre>";

// Eliminar elemtos y agregar nuevos elementos ala vez en un array.
// array_splice('array-a-modificar', 'indice-de-inico', 'cantidad-de-elemtos-a-eliminar', 'elemtos a agregar' )
echo "<p>Array_splice -> Borra y agrega elemtos a su vez </p>";
array_splice($colores, 1 , 2 , 'Valor agregado desde un array splice' );









echo "<pre>";
print_r($colores);
echo "</pre>";




?>