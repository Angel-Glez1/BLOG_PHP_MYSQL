<?php

/**
 * -------------------------------------------------------------------------------
 * |            Subir Imagenes Al Servidor
 * -------------------------------------------------------------------------------
 * |
 * |    1)-Para poder subir images, videos, docmento al servidor es necesario
 * |         que en el form. Tenga el atributo ectype = "multipart/form-data"
 * |    
 * |    2)-Los archivos que se envien por un form tienen que ser enviados por
 * |        post Y resividos por la varible global $_FILES que en si es una matriz,
 * |        que contine todas las propiedades que tiene ese archivo
 * |                          "PROPIEDADAS"
 * |        Array
 * |             (
 * |               [image] => Array
 * |                  (
 * |                     [name] => php.jpg -> Nombre de la imagen
 * |                     [type] => image/jpeg -> Tipo de la imagen
 * |                     [tmp_name] => C:\xampp\tmp\php3497.tmp -> Directorio donde se guardo temporal mente.
 * |                     [error] => 0
 * |                     [size] => 45269 -> Tamaño del documento. 
 * |                  )
 * |              )
 * |
 * |    3)-Todas estas propiedades son importantes ya que nos van a servir para poder hacer validaciones y todo lo necesario
 * |
 */

// Muestra por pantalla el $_FILES para que veas todas las propiedades que nos llegan
echo "<pre>";
print_r($_FILES);
echo "</pre>";

// Guardar la matriz en una varible para que sea mas facil acceder a sus indices
$imagen = $_FILES['image'];


/*
 * -----------------------------------------------------------------------------
 *          Validar tamaño del archivo.
 * -----------------------------------------------------------------------------
 * |    Para validar El tamaño del archivo, exiten varias fomas
 * |    La primera seria, en una varible guardar el tamaño que deseamos
 * |    sean megas megabits etc. Y que un if determine que archivo que
 * |    se envio por post sea menor a tamaño que tenemos en nuestra varible  
 * 
 */
$size_esperado = 2 * 1024 * 1024;
if($imagen['size'] > $size_esperado){ //Si el archivo es mayor al size esperado cortamos ejecucion
    header('location: indes.php');
    die();
}



/*
 * -----------------------------------------------------------------------------
 *          Validar El tipo de archivo que nos llega.
 * -----------------------------------------------------------------------------
 * |
 * |    Para validar que el tipo de archivo que nos llega sea el correcto.
 * |    Ya sea imagen , pdf , docs , text . De igual manera tenemos que validar
 * |    
 * |    La primera forma de validar que tipo de documento nos llega seria por
 * |       la extension ya sea el .pdf .txt .loquesea, Para aceder a esa info
 * |       podemos usar pathinfo() y ha dentro usamos el indice 'name' del archivo
 * |       que nos llego para asi saber optener la extencion
 * |    
 * |   Segunda forma hacer 
 * |
 */

$patron = explode('.', $imagen['name']);
$patron = array_pop($patron);

if($patron == 'jpg' || $patron == 'pnj' ){

    
    
}

/*
 * -----------------------------------------------------------------------------
 *         Poderle un nombre al archivo
 * -----------------------------------------------------------------------------
 * |
 * |    podermos usar la function time para que asi no me se repita los nombre
 * 
 */

$nombre = time();


/*
 * -----------------------------------------------------------------------------
 *         Validar si el el usuario no selecciono la imagen 
 * -----------------------------------------------------------------------------
 * |
 * |    Para verificar que el $_FILES no esta vacia podemos hacer la validacion
 * |    de que si el el el error el diferen a 0 entoces redirencione a otro lado.
 * |
 * |
 * |
 * |
 */


