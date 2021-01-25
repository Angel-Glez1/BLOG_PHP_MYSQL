<?php
if (isset($_POST)) :
    require_once '../../../setup/conexion.php';
    $post_id = $_POST['id']; 
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $autor = $_POST['FKAUTOR'];

    // Trasfromar el arrar de prederencias para poder hacer el UPDATE en la columna de tipo SET.
    $preferencias =  isset($_POST['pref']) ?  implode(',', $_POST['pref']) :   '';

    // Actualizar la tabla de posteo ya con el campo trasformado.
    $sql =  "UPDATE posteos  SET 
                    TITULO = '$titulo',
                    TEXTO = '$texto', 
                    FKAUTOR= '$autor', 
                    PREFERENCIAS = '$preferencias' 
                    WHERE ID = $post_id LIMIT 1;";
    $query = mysqli_query($conexion, $sql);
    $ultimo_id = mysqli_insert_id($conexion);

    /**
     * Actualizar una tabla con relacion muchos a muchos.
     * 
     * 
     * Cuando vamos a ACTUALIZAR un tabla que sea de muchos a muchos
     * realmente no actualizamos si borramos todos los registros que 
     * correspondan al registro que estamos Actulizando de la tabla correspondiente 
     * y despues insertamos todo lo que haga seleccinado el usuario
     * 
     * 
     * Lo que vamos hacer aqui primero es 
     * Elimanar todos los registro de la tabla relacion que correspondan
     * posteo y despues vamos a insertar todo lo que nos venga pos $_POST['categorias'];
     * 
     * NOTA: Esto de borrar y insertar otra vez los datos en la tabla de N-N solo lo
     * podemos hacer cuando las filas de esta tabla no se repiten 
     * Osea en nuestro caso nunca va a exitir la posivilidad que en nuestra tabla de relacion
     * se repita el posteo con la misma categoria...Por eso en en estos casos si podemos 
     * eliminar y insertar otra vez
     * 
     * 
     * En caso de que las filas si se repitan hacemos lo siguinte
     * 
     * ESTO LO HACEMOS EN SISTEMAS DE ALQUILER POR EJEMPLO QUE UN USUARIO 
     * RENTO UN PELICULA DOS VECES UNA SEMENA POR EJEMPLO...
     * 
     * °listado de checkbox para agregar opciones. Y al recibir estas opciones 
     *      se hace un foreach que inserta en la base de datos
     * 
     * °Otro listado de checkbox para borrar opciones . Y al recibir estas opciones
     *      se hace un foreach que borrar de la base de datos.
     * 
     * ° Y esta tabla tambien tendra un PRIMARY KEY 
     * 
     *
     * 
     */

    //  Elimina mos todos los registros que pertenezcas al posteo.
    $cDel = "DELETE FROM relacion WHERE FKPOSTEO = '$post_id'";
    mysqli_query($conexion, $cDel);


    // Recorremos el el array de categoria y por cada iteracion hacemos el insert
    if(isset($_POST['categoria'])){

      foreach ($_POST['categoria'] as $key){
        $cIns = "INSERT INTO relacion(FKPOSTEO,FKCATEGORIA) VALUES('$post_id', '$key')";
        mysqli_query($conexion,$cIns);
      }

    }
    
endif;

// Redirecionamos
header("location: ../../index.php?categoria=textos#t_$post_id");
