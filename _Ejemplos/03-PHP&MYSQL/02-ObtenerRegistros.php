<?php 

include_once '01-CrearConexion.php';

// Para ejecuatar consultas usamos la funcion mysqli_query pide dos parametros 1-La varibles que tiene la conexion 2-La sentencia
$sentencia = "SELECT * FROM categorias";
$resulto = mysqli_query($conexion,$sentencia);
var_dump($resulto);

/*
|
|   Exiten 4 formas obtener una consulta 
|   1) Como un array numerico:    Por medio de la funcion -> mysqli_fetch_row() 
|   2) Como un array asociativio: Por medio de la funcion -> mysqli_fetch_assoc() 
|   4) Como una array mixto       Por medio de la funcion -> myqli_fecth_array() Esta no la uses
|   3) Como un objeto :           Por medio de la funcion -> mysqli_fetch_object() 
|
|   Como en los 3 casos tengo que recorrer mas de un resultado. Tienes que usar un while, hasta horita lo unico que vas hacer
|   es en la condicion de while poner el fecht que deseas traer. 
*/ 

// Hacer el fetch(osea obtener) Por medio de una array numerico
echo "Por un array Indexado";
$datos = mysqli_fetch_row($resulto);
print_r($datos);

// Obtener datos en un array asociativo 
echo "Obtener por un array asociativo";
$datos = mysqli_fetch_assoc($resulto);
print_r($datos);

// Obtener datos en un array mixto
echo "Obtener por un array Mixto";
$datos = mysqli_fetch_array($resulto);
print_r($datos);

// Obtener datos en un objeto
echo "Obtener Por un objeto";
$datos = mysqli_fetch_object($resulto);
var_dump($datos);



?>