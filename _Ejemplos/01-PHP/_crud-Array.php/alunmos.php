<?php

/**
 * Estructura de una matriz:
 * $Array_Bidimencional = [indice-del-subarray][indice-de-los-elemento-del-subarrray]
 * $Array_Bidimencional = [filas - ][columnas | ]
 * 
 * ASI ES LA ESTRUCTURA DE UNA ARRAY BIDIMENCIONAL (MATRIZ)
 * Array => Array padre
 * (
 *    [0] => array (Array Hijos1)
 *       (
 *         ['Nombre'] => 'Angel',
 *         ['Calif-final'] => 10
 *       ),
 * 
 *    [1] => array (Array Hijos2)
 *       (
 *         ['Nombre'] => 'Angel',
 *         ['Calif-final'] => 10
 *       )
 * )
 * 
 */

//Asi se delara una matriz 
// Corchetes amarillos son el array papa
// Corchetes morados son los hij@s.
$escuela =
    [
        //Primer array
        ['id' => '', 'Nombre' => 'Angel',  'Calf-Final' => 10],
        ['id' => '', 'Nombre' => 'Armando',  'Calf-Final' => 8],


    ];

/**
 *  Agregar Un Nuevo Array ala matriz.
 * 
 * Tip : Para que puedas agregar un nuevo array ala matriz, primero tienes que definir el array,
 *         Aqui pueden ser elementos asociados o indexados.actual
 *         (Osea puedes crearlos asi 'nombre' =>  angel ó solamente el varlor, 'ANGEL).
 *          Una vez que ya tienes tu array creado lo guardamos en una varible y los empujamos a la  
 *          matriz con el el array nombre 
 *          $nuevoArray = [ 'Nombre' => 'Caro', 'Calf-Final' => 10  ];
 *           array_push($arrayAempujar, $nuevoArray);
 * 
 * */
$newAlumno  = [ 'Nombre' => 'Caro', 'Calf-Final' => 10];
$newAlumno1  = ['Caro', 'Calf-Final' => 10];
array_push($escuela, $newAlumno, $newAlumno1);



//Agregar Un nuevo indice y su valor a un array ya exitente en la matriz
$escuela[0]['Status'] = 'Aprovado';

// Imprimir un valor en especial.
/* echo */ $escuela[1]['Calf-Final'];


// Modificar y eliminar un valor
$escuela[0]['Nombre'] = 'Cambiamos el valor de angel a PEPE';



echo '<pre>';
print_r($escuela);
echo '</pre>';
