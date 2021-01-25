<?php 
$url = "../../extras/blog/";

// Le asigno un valor por defecto si los campos vienen vacios.
$titulo    = !empty($_POST['titulo']) ? $_POST['titulo'] : 'Sin titulo :C';
$preview   = !empty($_POST['preview']) ? $_POST['preview'] : 'Sin preview :C';
$contenido = !empty($_POST['contenido']) ? $_POST['contenido'] : 'Sin contenido :C';

// Creo un nombre unico para la carpeta y para el nombre de la imagen.
$carpeta   = time();
$nombre_img = time();


// Extraemos la matriz del $_FILES para poder acceder a sus indices sin tanto problema.
$imagen = $_FILES['fname'];

// Con pathinfo obtengo la extencion que trae mi foto
$patron = pathinfo($imagen['name'], PATHINFO_EXTENSION);





//  Creo la carpeta donde donde voy a almacenar los post de mi blog.
mkdir("$url/$carpeta");
file_put_contents("$url/$carpeta/titulo.txt" , $titulo);
file_put_contents("$url/$carpeta/preview.txt" , $preview);
file_put_contents("$url/$carpeta/contenido.txt" , $contenido);

// Si el indice error el igual a 0 quiere decir que el user si subio un archivo
if ($imagen['error'] === 0) {
    //1- Primero abrimos la imagen con la fucion correspondiente. 
    switch ($patron) {
        case 'jpg':
            $original = imagecreatefromjpeg($imagen['tmp_name']);
            break;
        case 'png':
            $original = imagecreatefrompng($imagen['tmp_name']);
            break;
        case 'gif':
            $original = imagecreatefromgif($imagen['tmp_name']);
            break;
    }

    // 2-Sacamos el ancho de de la imagen original y el alto.
    $ancho_org = imagesx($original);
    $alto_org  = imagesy($original);

    /**
     * Establecemos el ancho de nuestra copia y el alto de nuestra copia.
     * 
     * Para en alto de nuestra copia tenemos que hacer una regla de tres 
     */
    $ancho = 900;
    $alto = round($ancho * $alto_org / $ancho_org);

    // Ahora si hacemos nuestra copia que nos pide el ancho y el alto que sacamos anteriormente
    $copia = imagecreatetruecolor($ancho, $alto);

    // Siempre debes de trabajar con formato png para que asi la imagen si biene editada con algun fondo o recorte o cualquer otra cosa, php no la distorcione
    imagesavealpha($copia,true);
    imagealphablending($copia , false); //que no genere el fondo en negro 


    // Esta funcion gerena como tal la copia.
    imagecopyresampled(
        $copia,
        /** Recursos del GDlybrary osea en lienzo vacio */
        $original,
        /** La imagen que pienso que voy a copiar */
        0,
        0,
        /** Eje X|Y donde vamos a empezar a pegar infomacion en la copia */
        0,
        0,
        /** Eje x|y donde vamos a empezar a copiar la original */
        $ancho,
        /** El ancho de la copia */
        $alto,
        /** El alto de la copia */
        $ancho_org,
        /** Ancho  de la img original */
        $alto_org,
        /** Alto de la img original */
    );
    // Implementacion de marca de agua

    if(isset($_POST['marca'])):
    $url_logo = "../../fotos/marca-agua.png";
    $marcar = imagecreatefrompng($url_logo);
    imagecopymerge(
        $copia,
        $marcar,
        0,
        0,
        0,
        0,
        imagesx($marcar),
        imagesy($marcar),
        60
    );
    endif;




    // Ya tanemos los datos que van agcer que nuestra copia sea creada ahora vien solotenemos que moverla a un lugar en especial. con la misma funcion donde la vamos a importar
    $img_name = "../../extras/blog/$carpeta/imagen.jpg";
    // Siempre exporta tus images como png para que asi no haga problemas.
    imagepng($copia, $img_name, 9 );
    imagedestroy($original);
    imagedestroy($copia);

} 


header("location: ../index.php?seccion=blog");

