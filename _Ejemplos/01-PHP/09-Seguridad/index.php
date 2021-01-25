<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Manipular string </h1>
    <form action="" method="post">
        <textarea name="area" cols="30" rows="10"></textarea>
        <input type="submit" name="btn" value="Enivar">
    </form>
</body>
</html>

<?php 

    if(isset($_POST['btn']) ){
        // Para evitar inyecciones XXL osea codigo javacript usamos la funcion htmlspecialchars esta funcion la podemos ocupar tanto para guardar o mostrar informacion de preferencia ambas.
        $area = htmlspecialchars($_POST['area']);

        // La funcion nl2br me respeta todos los enter pero es importante que solo la ocupemos cuando vamos a mostrar algo no para guar y tambien que sea la ultima que funcion para manipualr strig
        $area = nl2br($area);
        echo $area;
        

      

        
        

    }







?>