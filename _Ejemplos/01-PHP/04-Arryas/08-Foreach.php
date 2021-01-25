<?php 

$redes = 
        [
            'facebook' => 'https://www.facebook.com/Angel-Armando', 
            'Instagram' => 'https://www.Instagram.com/Angel-Armando', 
            'twitter' => 'https://www.twitter.com/Angel-Armando', 
        
        ];

?>

<?php foreach($redes as $indice): ?>

    <p> Mis redes Sociales <?= $indice ?>  </p>
    
<?php endforeach; ?>



