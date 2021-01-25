<?php 
/**
 * ---------------------------------------------------------------------------
 *            Recorrer archivos planos con opendir() & readdir();
 * ---------------------------------------------------------------------------
 *   Para recorrer un archivo de texto plano (.pdf, .txt, .docs etc ) ponemos 
 *   ocupar dos funciones la primera
 *   1°- Opendir() &  readfir() => esta dos funciones la tenemos que ocupar juntas.
 *                                 
 *   Y la segunda forma es con la funcion glob().
 * 
 *  A quie vamos a ver la primera
 * 
 */

// 1)- Tienes que abrir y cerrar la carpeta que vamos a recorrer
$carpeta = opendir('../extras/textos/institucional');

    // 2)- La funcion readdir nos sirve para poder mostrar los archivos que tenga la carpeta que abrimos
    while($file = readdir($carpeta)){

        // 3) - Esto sirve para que no nos imprima el '.' y '..' que por defecto se traen. 
        if($file == '.' || $file == '..'){

            // Continue nos sirve para que cuando se cumplan la condicion no muestre por pantalla.
            continue;
        }

        // Para que no salga el archivo asi Terminos y Condiciones.txt podemos usar la funcion pahtinfo que resive un parametro el cual es archivo
        $nombre_archivo = pathinfo($file);



        // Imprimimos los archivos
        echo $nombre_archivo['filename'] . '<br>';
    }


closedir($carpeta); //Cerramos carpeta





?>