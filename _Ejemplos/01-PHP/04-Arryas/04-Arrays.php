<?php 

                                /*  ARRAY NORMALES INDEXADOS  */

// Se declarar de dos fromas
$primeraForma = array('PHP', 'JAVA', 'PYTHON');
$segundaForma = ['Laravel', 'ReactJS', 'NODE-JS'];

// Asignarle nuevos valores por el indice
$primeraForma[] = 'Javascript';


// Asignarle nuevos elementos al array por la funcion array_push
$nuevo = 'C';
array_push($primeraForma, 'C++', $nuevo);

// Mostarlos por pantalla.
for ($i = 0; $i < count($primeraForma); $i++) :
    echo '<li>' . $primeraForma[$i] . '</li>';
endfor;







?>




