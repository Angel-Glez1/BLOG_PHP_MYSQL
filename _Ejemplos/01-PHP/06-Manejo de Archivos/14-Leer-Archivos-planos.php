<?php

/**
 * |--------------------------------------------------------------------------
 * |             Leer Archivos Planos
 * |--------------------------------------------------------------------------
 * | 
 * |    file_get_contents() -> Me sirve para traer el contenido de un archivo plano,
 * |                           y resive un parametro, la url de donde esta el documento,
 * |                           file_get_contents('https:/blog-angel/extras/textos/terminos y    
 * |                           condiciones.txt')
 * |
 * |    file_exits() -> comprueba si exite un archivo, tambien resive un parametro, la url de donde 
 * |                    esta el archivo
 * |                    file_exits("https/Blog-angel/extras/texto/terminos y condiciones.txt");
 * |
 * |    file_put_contents(); -> Puedo modificar o crecar un archivo plano resive dos parametros,
 * |                            la url del archivo a editar , segundo el contedido que vamos a 
 * |                            agregar
 */

$ruta = '../extras/texto/institucional/terminos y condiciones.txt';


if( file_exists($ruta)){

 $contefido = file_get_contents($ruta);

}else{

    $contefido = 'El archivo no exite';
}






?>