<?php

$nombre = "Angel";
$email = "angel@angel.com";
$edad = 12;

// Hacer una funcion normal.
function saludar()
{
    echo "Hola Pepe";
}


// Acceder a una varible fuera de mi function para interar con ella Varibles scope
function email()
{
    global $email;
    global $nombre;
    echo "Hola $nombre tu correo es $email";
}


// Paso de Argumentos optativos y Parametros 
function Mostar_producto( $condicion = null , $nombre)
{

    if ($condicion == null) 
    {
        echo " SELECT * FROM usuarios ";

    } else {

        echo "SELECT * FROM usuarios WHERE nombre = '$condicion';";

    }
}

// Retorno de datos
function clearForm(){

   return  "<input type='text' name='' >";
}



