<?php 

$message = isset($_GET['message']) ? $_GET['message'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {

        border: 1px solid black;
        max-width: 40%;
    }

    form div {
        margin: 5px;
        border: 1px solid rgba(0, 0, 200, .8);
    }

    p{
        color:red;
    }
</style>

<body>
    <!-- Formulario para subir imagen -->
    <!-- action="actions/upload_img.php" -->
    <form action="actions/upload_img.php" method="post" enctype="multipart/form-data">
        <div>
            Imagen:
            <input type="file" name="image">
            <p><?= $message ?></p>
        </div>
        <div>
            <input type="submit" value="Subir Imagen">
        </div>
    </form>
</body>

</html>