<?php 
/*
|--------------------------------------------------------------------------------------
|    Borrado logico..
|--------------------------------------------------------------------------------------
|    Cuando hacemos un borrado logico, lo que realmente sucede es que no borramos
|    nada en la base de datos si no mas bien lo que hacemos es que por medio de un
|    columna en la tabla que queremos modificar es modificar los permisos
|     Ejemplo
|    En lugar de borrar un usuario lo que hacemos es que es la columna estado 
|    lo seteamos a 0 que significa baneado y eso hara que el usuario no pueda entrar al
|    sistema.
*/

if(isset($_GET['id'])){
    require_once '../../../setup/conexion.php';


    /**
     * Nota: Como estas haciendo un borrado logico 
     * Lo que tenemos que hacer si el usario da click
     * en el boton de borrar si esta Activo lo pase a inactivo 
     * y visersa si esta inactivo lo pase a activo
     * 
     * Para hace esto vamos a usar un formula que modifique el
     * valor de la columna ESTADO (ya que es un numero numerico)
     * FORMULA
     * (ESTADO_ACTUAL -1 ) * -1;
     * 
     * LO VISTE EN EL CURSO DE BLOOMITEAM  U3.32 EN EL MINUTO 30
     *  POR SI QUIERES COMO FUCIONA
     * Esto solo funcion cuando la columna que vamos a actualizar 
     * en TINYINT y que no sea UNSIGNED
     */

    $id = $_GET['id'];
    $sql =  "UPDATE usuarios SET ESTADO = (ESTADO -1) * -1 WHERE ID = $id";
    $query = mysqli_query($conexion, $sql);


    // $reultado = ($query == true) ? 1 : 0;
}

header("location: ../../index.php?categoria=usuarios");
