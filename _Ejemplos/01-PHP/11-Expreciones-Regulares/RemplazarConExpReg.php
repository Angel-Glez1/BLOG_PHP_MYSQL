<?php  


/* BUSCAR cosas con preg_replace()

    Cuando usamos la funcion preg_replace es para buscar un string que cualpa con el patron y cambiarlo
    caracter o simbolo o lo que se nos pegue la gana
    Ejemplo => preg_replace("/^[A]/", "a" , $string) lo que va a buscar es cualquier palabra que empize por A mayuscula y la va a sustituir por una a minuscula 
    Tambien podemos usar array ejemplo
    preg_replace(["/\s/", "/\d/" ],[ "espacios", 'numero'], $strin) -> podemos usar array PERO aqui lo que pongas como indice 0 en la busqueda lo va a rempazar por el indice que 0 de otro array.

*/

//Hacer una busqueda con expresiones regulares y cambiar todos los signos que no sean alfanumerios por un -

?>

<form action="" method="get">

    <div><input type="text" name="er" placeholder="Ingresa tu tiyulos" ></div>
    <div><textarea name="txt" id="" cols="30" rows="10"></textarea></div>
    <div><input type="submit" name="" id=""></div>
</form>

<?php 

    if (isset($_GET['er'])) {
        

        $exprecion = $_GET['er'];

        // Buscamos cualquier valor que no sea un valor alfanumerico y lo remplazamos con el indice 0 del arrar de rempazlo.
        // Y tambien buscamos cualquier espacio y lo llenamos con uun *
        $tecto = preg_replace(array("/\W/", "/\s/" ) , array("-", "*"), $exprecion);

        // Podemos hacer mas de un preg_replace en un misma instrucion
        // La siguente busca que si exite mas de una - solo me ponga uno,
        $tecto = preg_replace("/-+/", "-" ,$tecto);


        // Y volvemos a hacer otra busqueda y remplazo para que si exite un - al final de la palabra no la muestre
        $tecto = preg_replace("/\-$/", "", $tecto);

        echo $tecto;
        // --------------------------------------------------
        // Guardar el valor de la coincidencia para manipular ese contedino encontrado ejemplo
        // Para guardar la infomacion que coincidio con nuestro patron debe de estar encerrada en () y cada parentesis va a representar un $1
        // Buscar un url y transformar esa url en u link
        $txt = $_GET['txt'];
        $patron = "/\b(https?\:\/\/[\d\w\.\-\_\/]+)\b/";

        $txt = preg_replace($patron , '<a href="$1">$1</a>', $txt);
        echo $txt;




    }

?>