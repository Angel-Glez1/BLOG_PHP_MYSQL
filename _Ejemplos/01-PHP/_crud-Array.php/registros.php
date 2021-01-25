<?php 

if(isset($_POST)):
   session_start();
    $name = $_POST['name'];
        if(isset($_SESSION['name'])){

            // Extraemos el array que tiene la sesion para poder manipularlo mejor.
            $obtenerArray = $_SESSION['name'];

            // Verificamos si Ya existe ese nombre el el array
            $match = array_search($name, $obtenerArray);
            if($match == true ){
                $_SESSION['name'] = $obtenerArray;
                $_SESSION['error'] = "El nombre ya exite";
                header('location:index.php');
                die();


            }else {
                array_push($obtenerArray, $name);
                $_SESSION['name'] = $obtenerArray;
            }
            // header('location:index.php');

        }else{
            $_SESSION['name'] = [$name];
            // header('location:index.php');
        }
    header('location:index.php');


endif;
