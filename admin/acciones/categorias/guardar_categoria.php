<?php
if (isset($_POST)) {
    require_once '../../../setup/conexion.php';
    $name_categoria = $_POST['categoria'];

    // Como el nombre de la categoria es Obligatoria al hacerlo null cuando nos llege algo vacion no va hacer el insert y nos 
    // a retornar un error lo que vamos hacer es aprovechar ese error para deciler al usuario que paso.
    $sql =  "INSERT INTO categorias SET  CATEGORIA = NULLIF('$name_categoria', '')";
    $query = mysqli_query($conexion, $sql);
   
    /*
    Otra forma de saber si un sentencia sql fue realizada con exito es sabiendo 
    el numero de filas que fueron afectadas. mediante ala funcion mysqli_affected_ro
    ($conexion). Que en el caso del INSERT cuando se realizo con exito la sentecia
    devuelve 1 o mas y en su inversa devulve un -1 */

    $filas_afectadas = mysqli_affected_rows($conexion);
    $motivo = "";

    $estado = ($filas_afectadas >= 1) ? 'ok' : 'error';
    // Si las filas afectadas son -1 significa que no se puedo hacer el insert u vamos a buscar cual fue el motivo
    if( $filas_afectadas == -1  ){

        // Primer motivo : El campo viene vacio
        if(preg_match("/Column '([a-z]+)' cannot be null/i", mysqli_error($conexion), $nulos))
        {
            // Si el motivo es uno significa que el campo llego vacio.
            $motivo = 1;    

        }

        // Segundo motivo: El nombre de categoria ya existe la tabla.
        if(preg_match("/Duplicate entry '(.*)' for key '([a-z]+)'/i", mysqli_error($conexion), $nulos) ){

            // Si el motivo significa que el campo ya exite,
            // $motivo = 2;

            $motivo = "La categoria $nulos[1] ya exite";
            
        }
    }
 
    $mesaje = ($motivo != '') ? "&m=$motivo" : '';
}



header("location: ../../index.php?categoria=categoria&rta=$estado".$mesaje);


?>