<?php
if (isset($_POST)) {
    require_once '../../../setup/conexion.php';
    $name_categoria = $_POST['categoria'];
    $categoria_id = $_POST['categoria_id'];


    $sql =  "UPDATE categorias SET CATEGORIA ='$name_categoria' WHERE ID = '$categoria_id'";
    $query = mysqli_query($conexion, $sql);

    /**
     * Cuando hacemos un UPDATE a la base de datos, a la hora de comprobar errores pueden
     * pasar varias cosas una de ellas que el dato no se haga modificado osea que se quedo igual
     * y eso no es un error.
     * 
     * 
     * Ahora bien para validar si el UPDATE fue correcto vamos a usar la funcion MYSQLI_INFO
     * junto con la funcion mysqli_affected_rows() para saber cuantas filas fueron afectadas.
     * Lo que va a retornar la funcion mysqli_info es lo siguiente:
     *   matched: 1 Changed: 0 Warnings: 0 -- Esto puede variar
     * 
     *  °Si el matched es 1 y el affected es 0, es que no hubo cambios
     *  °Si el matched es 0, significa que el id en el filtro where no exite en la tabla 
     * 
     * Para saber el valor de matched usamos una expresion regular y guardamos los numeros que
     * nos retorno el el array de coincidencias
     * 
     * Lo que vamos hacer que el numero de filas afectadas obtenidas por el mysqli_affected_rows sea 0 y
     * que el matched de mysqli_info sea 1, para que asi php sepa que no hubo un error, si no , que simplemente
     * el usario no modifico el registro
     * 
     * 
     * NOTA: Lo que se hizo en este caso fue lo contraio osea buscar primero el error y si no dio error pues madar que no hubo 
     * error JAJAJAJAA
     * 
     */

    // Obtener el numero de filas afectadas por el UPDATE.
    $filas_afectadas = mysqli_affected_rows($conexion);

    // Agregar un valor por defecto ala variable estado.
    $estado = ($filas_afectadas >= 1) ? 'ok' : 'error';

    // Validar si el dato no fue modificado
    if($filas_afectadas == 0){
        // Obtener el matched para poder buscarlo en una expresion regular.
        $info_del_uptade = mysqli_info($conexion);

        // Obtener los Valores que nos arrogo el mysqli_info
        preg_match("/matched:\s+(\d+)\s+changed:\s+(\d+)/i", $info_del_uptade, $coincidencias);
        $matched = $coincidencias[1];
        $changed = $coincidencias[2];

        // Si el $matched es 1 significa que no se modifico el valor del dato osea dejo igual
        if($matched == 1 ){
            $estado = 'ok';
        }else{
            $estado = 'error';
        }
    }

}



header("location: ../../index.php?categoria=categoria&rta=$estado");
