<?php

if($_FILES['image']['error'] != 0 ){

    header('location: ../index.php?message=Debes selecionar una imagen ');
    die();
}else{

    $size_esperado = 2 * 1204 * 1024;
    if($_FILES['image']['size'] <= $size_esperado ){

        $name = $_FILES['image']['name'];

        $patron = explode('.', $name);
        $patron = array_pop($patron);
        if($patron == 'png'|| $patron == 'jpg' || $patron == 'gifs'){

            $name_imge = time();

            $url = '../images/'.$name_imge.'.'.$patron;


            move_uploaded_file($_FILES['image']['tmp_name'], $url);
            header('location: ../index.php');

        }

    }





}







// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";












?>