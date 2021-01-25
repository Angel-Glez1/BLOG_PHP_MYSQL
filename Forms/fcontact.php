<?php 
if(isset($_POST)){
    require_once '../setup/conexion.php';
    $name = escape($_POST['name']);
    $email = escape($_POST['email']);
    $motivo = escape($_POST['motivo']);
    escape($categorias = implode(',', $_POST['categorias']));
    $description = escape($_POST['desc']);
   
    

}
$corero = <<<EMIAL
        <H1>Mensaje de: $name</H1>
        <p>Correo : <b>$email</b></p>
        <p>Asunto : <b> $motivo </b></p>
        <p>Categorias <b>$categorias</b></p>
        <h4>Memsaje</h4>
        <p style="border:solid 1px black; max-width: 600px; min-height: 300px; ">$description</p>

EMIAL;

// echo $corero;
// email()

header('location: ../index.php?seccion=gracias');

?>

<style>


</style>