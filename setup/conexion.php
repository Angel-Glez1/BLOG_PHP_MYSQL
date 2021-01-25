<?php

/**
 * Si estamos en local abre el archivo ini_local y si estamos
 * online abre el ini_online 
 * 
 * Para saber si estamos online usamos la varible $_SERVER[HTTP_HOST]
 * 
 */

//  Saber en que si estamos el online 
$host = $_SERVER['HTTP_HOST'];
$file_ini = preg_match("/localhost/i", $host) ? 'ini_local.ini' : 'ini_online.ini';

// Obtener datos de configuracion del archivo ini
$cfg = parse_ini_file($file_ini, true);

// Separar los array de mi matriz
$mysql = $cfg['MYSQL'];
$cWebSite = $cfg['WEBSITE'];
$cErrores = $cfg['ERRORES'];






// Conexion ala base de datos.
$conexion = @mysqli_connect($mysql['DB_HOST'], $mysql['DB_USER'], $mysql['DB_PASSWORD'], $mysql['DB_NAME']);
mysqli_set_charset($conexion, $mysql['DB_CHARSET']);



// Definir zona horaria. Con los datos del archivo ini
date_default_timezone_set($cWebSite['TIME_ZONE']);
$hora = date($cWebSite['FORMAT_DATE']);

// Inicio sesiones
session_start();


// Validae que el usurio este logueado o en defecto sea admin
function validate_segurity($nivel = 'administrador')
{
    return $_SESSION['NIVEL'] == $nivel;
}


// Debugear array
function debug($array){

    echo "<pre>";
    print_r($array);
    echo "</pre>";

}


// INYECCIONES SQL
function escape($valor){
    
    global $conexion;

    return mysqli_real_escape_string($conexion,$valor);

}


// URL BASE
// CONST URL_BASE = $cWebSite['URL_BASE'];
define('URL_BASE', $cWebSite['URL_BASE']);


