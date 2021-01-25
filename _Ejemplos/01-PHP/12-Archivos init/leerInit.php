<?php 

/*------------------------------------------------
|    Archivos .ini
|-------------------------------------------------
|
|   Los archivos .ini nos sirven para configurar
|   datos generales de nuestra web
|   °Base de datos .
|   °Proveedor de correos.
|   °Muestra de errores
|   esto se ocupa en frameworks como laravel 
|   Hasta este momento se crean dos archivos 
|   init uno cuando estamos trabajando en 
|   local y otro cuando trabajamos en linea
|   
|   Para que PHP leea archivos de tipo
|   init usamos la funcion parse_ini_file
|   el cual resive la ruta de nuestros 
|   si le ponemos un segundo parametro 
|   le estamos indicando que nos regrese una matriz
|
*/

$datosConf = parse_ini_file('conf.ini' , TRUE);
$datosMYSQL = (object)$datosConf['MYSQL'];

// $mbd = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $contraseña);

try {
    $conexion = new PDO("mysql:host={$datosMYSQL->DB_HOST};dbname={$datosMYSQL->DB_NAME},{$datosMYSQL->DB_USER}, {$datosMYSQL->DB_PASSWORD}");
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}





?>