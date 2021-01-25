<?php 

echo "<p>Datos mandados por GET</p>";

echo '<pre>';
print_r($_GET);
echo '</pre>';

echo "<p>Datos mandados por POST</p>";

echo '<pre>';
print_r($_POST);
echo '</pre>';

echo $_POST['curso'];





?>