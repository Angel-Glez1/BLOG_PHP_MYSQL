<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Expresiónes Regulares</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET" >
        <br>
        <div> <input type="text" name="er" placeholder="Matricula..."  autocomplete="off" > </div><br>
        <div> <input type="submit" value="Enivar"> </div>
    </form>
    <?php  
        if(isset($_GET['er'])){
            // Aihoihoh_asdasudi-uausgduiasgd009709707-A
            // $patron = "/^([A-Z])([a-zA-Z0-9\-\_])+([A-Z])$/";
            $patron = "/^[a-z0-9\.\-\_\ ]+\.jpg|png|gif$/i";
            $er = $_GET['er'];

            $result = preg_match($patron, $er , $array);
            if($result){

                echo "La foto $er <br> Es <b>VALIDA</b> Por que cumple con el patron $patron";
                echo '<pre>';
                print_r($array);
                echo '</pre>';

            }else{

                echo "Formato de foto no permitido";
            }

        }
    
    
    ?>
</body>
</html>