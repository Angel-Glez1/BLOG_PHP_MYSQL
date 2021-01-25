<h1> Buscar Caracteres en un string con strpos </h1>

<form action="" method="get">
    <div>Email <input type="text" name="mail"></div>
    <div> <input type="submit" value="enviar"> </div>
</form>
<?php

/**
 * ------------------------------------------------------------------
 *              Buscar algo en un string
 * -----------------------------------------------------------------
 * 
 *  strpos() -> Busca un caracter o un string dentro de otro y devuelve.
 *              Un int haciendo referencia a la posicion donde encontro
 *              ese caracter. Ademas que que es sensible a Mayusculas &
 *              Minusculas 
 * 
 * 
 * stripos() -> Esta funcion hace los mismo busca el caracter y el string.
 *              Dentro de otra Solo que este no le importa si es Mayuscula
 *              O minuscula
 * 
 * 
 *  NOTAS    -> Si vamos a buscar Caracteres Como @, ?, ., o alguna paralabra 
 *              que sabemos que siempre va a tener ese formato por ejemplo
 *              .php .pdf .txt La mejor opcion seria usar strpos.
 *              
 *           -> Pero si vamos a buscar palabras que no importa si lo escribieron 
 *              con musyusculas o minusculas usamos stripos.
 * 
 * IMPORTANTE-> Siempre que uses esta funcion con if debes usar triple =, por que 
 *              si lo que estas buscando esta en la posicion 0 el if lo va a intepretar
 *              como falso, por que cero significa ausencia de valor y al usar tripe igual hacemos
 *              que sea igual y del mismo tipo de dato 
 * 
 */

    if(isset($_GET['mail'])) {

        $email =  $_GET['mail'];
        
        if(strpos($email, '@') === false){

            echo "El correo: $email No es valido";

        }else{

            echo "Correo valido";
        }

    } 

    echo '<hr>';
    echo "<h1>Buscar y remplazar en un String con str_replace() </h1>";

    /*
      |-------------------------------------------------------
      |   Buscar Y remplazar Un caracter en Un string
      |-------------------------------------------------------
      |
      | str_replace() -> Necesita 3 parametros 
      |                -> 1)- El caracter A buscar.
      |                -> 2)- El cracter Con el que vamos Remplazar.
      |                -> 3)- EL strin donde lo vamos a buscar  
      |                 str_replace("@", "arroba", $email);
      |
      | NOTA ->  Esta funcion tambien en sensible con las Mayusculas
      |             Y las minusculas Ala hora de buscar un palabrea
      |             para eso exite la funcion str_iplace



      
    
    
    
    
    
    
    
    */ 



?>