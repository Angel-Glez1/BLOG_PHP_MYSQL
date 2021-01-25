<?php

/**
 * |--------------------------------------------------------------------------
 * |   Procesar un check-box  
 * |--------------------------------------------------------------------------
 * |
 * |    1)-En el atributo name de tu formulario agrega le unos corchetes
 * |       name="cursos[]", esto hara que cuando llegue al archivo que,
 * |       especificates en el action="",  PHP lo inteprete como un array 
 * |       y todos los checkbox que hayas seleccionado los guarde en un Array Indexado. 
 * |
 * |    2)-Si solo  vamos a mostrar los valores del check-box .
 * |      hacemos un implode(), para que me transforme mi array en un string
 * |      y lo pueda mostrar con un simple echo 
 * |      
 * |    3)-Si si vamos hacer algo con los valores que me llegan por el check-box
 * |        entoces, ahi si los recoremos y hacemos las validaciones correspondientes.
 * |
 * |
 */

$cursos_seleccionados = implode('/', $_POST['categorias']);
echo $cursos_seleccionados;



echo '<pre>';
print_r($_POST);
echo '</pre>';


?>