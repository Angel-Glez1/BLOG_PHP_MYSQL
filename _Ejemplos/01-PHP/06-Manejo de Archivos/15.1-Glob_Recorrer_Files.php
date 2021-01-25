<?php
date_default_timezone_set('America/Mexico_city');
/**
 * ---------------------------------------------------------------------------
 *            Recorrer archivos con glob()
 * ---------------------------------------------------------------------------
 *   glob()-> Me habre el directorio pero es importante que al final
 *            le ponga la extencion de los archivos que quiero abrir
 *            pueden ser (*.pdf, *.docs, *.php *.js *.java ) y tenemos
 *            que guardar lo que nos retorna en una varible.
 *            Una vez que ya tengam
 * 
 *   filesize()-> Me da el tamaño de los archivos pero necesita un parametro
 *                la ruta de la carpeta que abrimos     
 * 
 *   filemtime() -> me dice el tiempo en segundo de cuando fue creada
 * 
 *   pathinfo()-> Esta funcion es la mas importante resive un parametro el cual es
 *                 la variable en donde tengo guardada la carpeta que abrimos
 *                   ya que va permitir mostrar un array asociativo
 *                 .
 *  OJOOOOO -> Para que todo esto funcione no se te olvide guardar la ruta dela carptea      
 *             en una varible ESA VARIBLE REPRESENTA LOS ARCHIVOS QUE TIENE EL directorio 
 *             que abrimos con el glob().
 *              Tambien tines que Iterar los archivos en un foreach.
 * 
 *  
 * 
 */




// Abrimos direcctorio.
$carpeta = glob("../extras/textos/institucional/*.txt");

// Iterar los archivos
foreach($carpeta as $file){

    // 1)- Asignamos el valor de los archivos en una varible.
    $sizeFile = filesize($file);
    echo "<p><b>Tamaño del archivo</b> $sizeFile bits</p>";

    // 2)-  Asignamos el tiempo de que se creo el archivo
    $fecha_de_creacion = date( 'd-m-Y H:i'  ,filemtime($file));
    echo "<p><b>Fecha que se creo </b>$fecha_de_creacion</p>";

    // 3)- Info del archivo 
    $info_file = pathinfo($file);
    echo "<b>Array sobre la Informacion del archivo</b>";
    echo "<pre>";
    print_r($info_file);
    echo "</pre>";
    
    // 4)-  Si queremos acceder ala infomacion del array para mostrar lo que nos interece 
    echo "<b>Accediendo a un indice del array en este caso el nombre del archivo:</b> <i>". $info_file['filename'].'</i>';

    // 5)-  Otra forma de acceder a la info del file es asignardo ese valor a una varible para usarlo donde sea.
    $file_name = $info_file['filename'];
    echo "<br>Guardar en una varible una indice en especial dela funcion pathinfo(): <a href=''>$file_name</a>";


    // 6)-  Podemos guardar la informacion del archivo de otra forma
    $extension_the_file = pathinfo($file, PATHINFO_EXTENSION);
    echo "<p>Tipo de extension del archivo: <b>$extension_the_file</b></p>";
    echo '<hr>';

}







?>