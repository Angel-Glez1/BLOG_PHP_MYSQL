<?php

/*
|------------------------------------------------------------------------------------------
|               Atajos de metacaracteres  & Patrones optativos
|--------------------------------------------------------------------------------------
|
|   Los atojos de meta caracteres no permite ahorrar tiempo ala hora de escribir expresiones reg.
|   
|   \d      => Hace referencia a los numeros del 0-9
|   \D      => Hace referencia a que no puede buscar numeros del 0-9
|   \w      => Hace referencia a los numeros alfanumeros a-z A-z 0-9 y el guion bajo_
|   \W      => Hace referencia a que no puede aver ningun numero alfanumerico
|   \s      => Hace referencia a que puede existir espacios(" ", \n, \r,  enter,  ).
|   \S      => Hace referencia a que no puede exitir espacios(" ", \n, \r,  enter,  ).
|   \b      => Nos sirve para que la busqueda sea mas precisa como buscar una palabra
|---------------------------------------------------------------------------------------------------
|                   PATRONES OPTATIVOS
|-------------------------------------------------------------------------------------
|   
|     Si queremos hacer un tipo de validacion con la expresion regular lo que podemos hacer es toda la
|     expresion encerrarla en parentesis y al final ponerle un signo de  ?
|
|     Ejemplo => /^([A-Z]{5})?$/  Los que estamos haciendo a que es typo de validacion donde si el usuario 
|                                   No ingresa nada no pasa da pero si el usuario si ingresa algo deve de respetar 
|                                   lo que se le pide.
|
*/
?>


<H1>Buscar ofencivas</H1>
<form action="" method="post">
    <textarea name="er"  cols="30" rows="10"></textarea><br>
    <input type="submit" value="Enviar" name="btn">
</form>

<?php 

    // Vamos a buscar palabras que vallan en contra de los terminos y condiciones
    if(isset($_POST['btn'])){

        $txt = $_POST['er'];
        $patron = "/\b(sexo|mota|cocaina|violacion|drogas)\b/i";

        // Busamos mas de una coincidencia
        $result = preg_match_all($patron ,$txt);

        if($result){

            echo "HEY :( no uses esas palabras";
        }
    }


?>