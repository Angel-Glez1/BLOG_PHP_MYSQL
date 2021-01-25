<?php 

/*
|
|  Hacer que HTML use expresiones regulares en un input para que valide desdes html la infomacion de imput.
|
|   Para que html pueda entender una expresion regular usamos la funcion pattern que significa patron.
|   Tambien el usuario. No ocupa ni el inicio de la expresion regular ni el final
|   
|
|
|
|
|
|
|
*/ 
?>


<form action="" method="get">
    <div>Nombre: <input type="text" name="name"  pattern="[a-z]{4,10}" > </div>
    <div> <input type="submit" value="Enviar"> </div>
</form>