<?php

/**
 *     Matricez INDEXADAS
 * 
 *   
 *   array => [1][1][1]   
 *   array => [2][2][2]
 * 
 * $matriz[fila(arrays)][columna(elementoDelArray)]
 * 
 * 
 */

$fotos = [ 
         ['foto.pnj', 'Mi foto de perfil'],
         ['foto 2',  'Mi segunda foto de perfil'],
         ['foto3 .pnj', 'Mi tercera foto de perfil']];


// Como iterar una matriz .Para iterar una matriz solo necesito anidar dos for
// El Primer 'for' recorre todos los array que tenga la matriz
// Y el segundo 'for' recorre todos los elementos que tiene eso array

for ($i=0; $i < sizeof($fotos); $i++): // 1° for -> Recorre todos los array que tenga la matriz
    for ($j=0; $j < sizeof($fotos[$i]); $j++): // 2° for -> Recorre todos los elemtos del los arrays.
            echo '<li>'. $fotos[$i][$j]. '</li>';
    endfor;
endfor;



?>

